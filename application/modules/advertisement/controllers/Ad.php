<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Ad Controller
 * 
 * @author BDTASK <bdtask@gmail.com>
 * 
 * @link http://www.bdtask.com
 */

class Ad extends MX_Controller {

    public function __construct() {
        parent::__construct();
        if (! $this->session->userdata('isLogIn'))
            redirect('login');

        $this->load->model('ad_s');
        $this->load->model('backend/view_setting_model');
    }
    
    
    #---------------------------------
    #    add a new ad
    #---------------------------------    
    public function index() {

        $this->permission->check_label('new_advertise')->create()->redirect();

 

        $theme_dir = 'application/views/themes/';
        $dir_folders = scandir($theme_dir);
        $themes = array();
        foreach ($dir_folders as $key => $value) {
            if ($value === '.' or $value === '..')
                continue;
            $themes[] = $value;
        }

        

        $data['themes'] = $themes; 
        $data['active'] = 1;

        $data['active_theme'] = json_decode($this->view_setting_model->get_previous_settings('settings', 16));

        
        $data['title'] = display('add_new_ad');
        $data['module'] = "advertisement"; 
        $data['page']   = "ad/view_new_ad"; 
        echo Modules::run('template/layout', $data);   

    }

    #----------------------------------
    #      To add http dynamically
    #----------------------------------
    function addhttp($url) {

        if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
            $url = "http://" . $url;
        }
        return $url;
    }

    #---------------------------------------
    #     to save new add
    #---------------------------------------    
    public function save() {

        $this->permission->check_label('new_advertise')->create()->redirect();

        $data['theme'] = trim($this->input->post('theme',TRUE));
        $data['page'] = trim($this->input->post('page',TRUE));
        $data['ad_position'] = trim($this->input->post('ad_position',TRUE));

        $ad_type = trim($this->input->post('ad_type',TRUE));

        if ($ad_type == 1) {
            $google_ad_client = '<script><script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client='. trim($this->input->post('embed_code',FALSE)).'" crossorigin="anonymous"></script> <ins class="adsbygoogle"   style="display:block" data-ad-client="'. trim($this->input->post('embed_code',FALSE)).'" data-ad-slot="8352319773" data-ad-format="auto" data-full-width-responsive="true"></ins></script>';
            $data['embed_code'] = $google_ad_client;
        } elseif ($ad_type == 2) {
            // if ad type is image
            $ad_image = $_FILES['ad_image']['name'];
            $image = explode(".",$ad_image);
            $extent = end($image);

            if($extent=="jpg" || $extent=="png" || $extent=="jpeg" || $extent=="gif" || $extent=="webp"){
                $ad_img_url = $this->addhttp(trim(@$this->input->post('ad_url')));            
                if ($ad_image != '' && $ad_img_url != '') {
                    $key = md5(microtime() . rand());
                    copy($_FILES['ad_image']['tmp_name'], 'uploads/Advertizement/' . $key . '.png');
                    $data['embed_code'] = '<a href="' . $ad_img_url . '"><img width="100%" src="' . base_url() . 'uploads/Advertizement/' . $key . '.png" alt=""></a>';
                } else {
                    $this->session->set_flashdata('exception', display('url_requerd'));
                }

            } else{
                $this->session->set_flashdata('exception','This File Is Not allowed!');
                redirect('advertisement/ad');
            }
        }
        
        $count = $this->db->select("*")->from('ad_s')->where('theme',$this->input->post('theme',TRUE))->where('ad_position',@$data['ad_position'])->get()->num_rows();
        
        if ($data['page'] == '' || $data['ad_position'] == '' || $data['embed_code'] == '') {
            $sdata['exception'] = 'Please enter ad inforamation.';
        } elseif ($count > 0) {
            $sdata['exception'] = display('ad_exist_msg');
        } else {
            $this->ad_s->save_ad_info($data);
            $sdata['message'] = display('ad_save_message');
        }

        $this->session->set_flashdata($sdata);
        redirect('advertisement/ad');

    }



    #-------------------------------------------
    #      viewing all ads
    #------------------------------------------
    public function view_ads() {

        $this->permission->check_label('update_advertise')->read()->redirect();


        $ac = json_decode($this->view_setting_model->get_previous_settings('settings', 16));
        $data['ads'] = $this->ad_s->get_all_ads($ac->default_theme);

        $data['title'] = display('view_ads');
        $data['module'] = "advertisement"; 
        $data['page']   = "ad/view_ad_update"; 
        echo Modules::run('template/layout', $data);   



    }

    #---------------------------------------------
    #      viewing individual ad to update
    #---------------------------------------------
    public function edit_view($ad_id) {

        $this->permission->check_label('update_advertise')->update()->redirect();

        $data['ads'] = $this->ad_s->get_ad_by_id($ad_id);

        $data['title'] = display('view_ads');
        $data['module'] = "advertisement"; 
        $data['page']   = "ad/edit_view"; 
        echo Modules::run('template/layout', $data);   


    }

    #---------------------------------------
    # To delete individual ad
    #---------------------------------------    
    public function delete($ad_id) {
        $this->permission->check_label('update_advertise')->delete()->redirect();
        $query = $this->db->where('id',$ad_id)->delete('ad_s');
        $this->session->set_flashdata('message',display('delete_message'));
        redirect('advertisement/ad/view_ads');

    }


    #----------------------------------------
    #      To update individual ad by AD ID
    #-----------------------------------------    
    function update() {

        $this->permission->check_label('update_advertise')->update()->redirect();

        $ad_id = $this->input->post('id',TRUE);
        $data['page'] = trim(@$this->input->post('page',TRUE));
        $data['ad_position'] = trim(@$this->input->post('ad_position',TRUE));


        $ad_type = trim($this->input->post('ad_type',TRUE));
        $embed_code = trim($this->input->post('embed_code',FALSE));

        if ($ad_type == 1) {
            if(!empty($embed_code)){
                $google_ad_client = '<script>
                                      (adsbygoogle = window.adsbygoogle || []).push({
                                        google_ad_client: "'. $embed_code.'",
                                        enable_page_level_ads: true
                                      });
                                    </script>';
                $data['embed_code'] = $google_ad_client;
            }

        } elseif ($ad_type == 2) {

            $ad_image = $_FILES['ad_image']['name'];
            if(!empty( $ad_image)){
                // if ad type is image
                $image = explode(".",$ad_image);
                $extent = end($image);

                if($extent=="jpg" || $extent=="png" || $extent=="jpeg" || $extent=="gif" || $extent=="webp"){
                    $ad_img_url = $this->addhttp(trim(@$this->input->post('ad_url')));            
                    if ($ad_image != '' && $ad_img_url != '') {
                        $key = md5(microtime() . rand());
                        copy($_FILES['ad_image']['tmp_name'], 'uploads/Advertizement/' . $key . '.png');
                        $data['embed_code'] = '<a href="' . $ad_img_url . '"><img width="100%" src="' . base_url() . 'uploads/Advertizement/' . $key . '.png" alt=""></a>';
                    } else {
                        $this->session->set_flashdata('exception', display('url_requerd'));
                    }

                } else{
                    $this->session->set_flashdata('exception','This File Is Not allowed!');
                    redirect('advertisement/ad/edit_view/'.$ad_id);
                }
            }
        }
        


        if ($data['page'] == '' || $data['ad_position'] == '') {
            $this->session->set_flashdata('message','Please enter ad inforamation');
        } else {
            $this->ad_s->update($ad_id, $data);
            $this->session->set_flashdata('message', display('update_message'));
        }
        redirect('advertisement/ad/edit_view/'.$ad_id);;
    }


    public function update_lg_status($id, $status){

        $this->permission->check_label('update_advertise')->update()->redirect();
        
        $new_status = ($status==1?0:1);
        $this->db->set('large_status',$new_status)->where('id',$id)->update('ad_s');
        $this->session->set_flashdata('message',display('update_message'));
        redirect('advertisement/ad/view_ads');
    }

    public function update_sm_status($id, $status){
        $this->permission->check_label('update_advertise')->update()->redirect();
        
        $new_status = ($status==1?0:1);
        $this->db->set('mobile_status',$new_status)->where('id',$id)->update('ad_s');
        $this->session->set_flashdata('message',display('update_message'));
        redirect('advertisement/ad/view_ads');
    }


}

