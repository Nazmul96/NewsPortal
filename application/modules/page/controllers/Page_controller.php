<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * @System  : Page controller
 * @author  : BDTASK <bdtask@gmail.com>
 * @link    : http://www.bdtask.com
 */
class Page_controller extends MX_Controller {

    public function __construct() {
        parent::__construct();
        if (! $this->session->userdata('isLogIn'))
            redirect('login');
        $this->load->model('page_model');
    }


    #----------------------------
    #  Pages list
    #----------------------------    
    public function Pages() {

        $this->permission->check_label('page_list')->read()->redirect(); 

        $data['page_info'] = $this->page_model->page_list(); 

        $data['title'] = display('add_new_page');
        $data['module'] = "page"; 
        $data['page']   = "pages/view_page_list"; 
        echo Modules::run('template/layout', $data);   
    }


    #----------------------------
    #  Create New Page
    #---------------------------- 
    public function Create_new_page() {
         $this->permission->check_label('add_new_page')->create()->redirect(); 

        $data['title'] = display('add_new_page');
        $data['module'] = "page"; 
        $data['page']   = "pages/view_create_new_page"; 
        echo Modules::run('template/layout',$data);  


    }

    #----------------------------
    #  Get youtube id for url
    #---------------------------- 
    public function get_youtube_id_from_url($url) {
        if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[\w\-?&!#=,;]+/[\w\-?&!#=/,;]+/|(?:v|e(?:mbed)?)/|[\w\-?&!#=,;]*[?&]v=)|youtu\.be/)([\w-]{11})(?:[^\w-]|\Z)%i', $url, $match)) {
        return $match['1']; 
        }else{
            return $url;
        }
    }

    #------------------------------------
    #   Save Page
    #------------------------------------    
    public function save_page() {

        $this->permission->check_label('add_new_page')->create()->redirect(); 

        // get picture data
        if (@$_FILES['image']['name']){
            $config['upload_path']   = './uploads/page_img/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['overwrite']     = false;
            $config['max_size']      = 1024;
            $config['remove_spaces'] = true;
            $config['max_filename']   = 10;
            $config['file_ext_tolower'] = true;
          
          $this->load->library('upload', $config);
          $this->upload->initialize($config);

          if (!$this->upload->do_upload('image')){

              $this->session->set_flashdata('error','File format not allowed!');
              redirect("page/page_controller/create_new_page");
          } else {

            $data = $this->upload->data();
            $image = $config['upload_path'].$data['file_name'];

            #------------resize image------------#
            $this->load->library('image_lib');
            $config['image_library'] = 'gd2';
            $config['source_image'] = $config['upload_path'].$data['file_name'];
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = FALSE;
            $config['width']    = 685;
            $config['height']   = 385;

            $this->image_lib->clear();
            $this->image_lib->initialize($config);
            $this->image_lib->resize();
            #-------------resize image----------#

          }
        } else {
          $image = "";
        }


        // Checking that slug is formatted or not
        if($this->input->post('slug')!=NULL){
            $page_slug = $this->input->post('slug',TRUE);
        }else{
            $title =  explode(' ',$this->input->post('title',TRUE));
            $page_slug = @$title[0].' '.@$title[1];
        }

        $space_exist = preg_match('/\s/', $page_slug);
        if ($space_exist > 0) {
            $slug = str_replace(' ', '-', $page_slug);
        }
        else{
            $slug = $page_slug;
        }
        
        $data = array(
            'title'         => $this->input->post('title',TRUE),
            'page_slug'     => $slug,
            'description'   => $this->input->post('details_news',TRUE),
            'image_id'      => $image,
            'video_url'     => $this->get_youtube_id_from_url($this->input->post('videos',TRUE)),
            'publishar_id'  => $this->session->userdata('id'),
            'seo_keyword'   => trim($this->input->post('meta_keyword',TRUE)),
            'seo_description' => trim($this->input->post('meta_description',TRUE)),
            'publish_date'  => date("Y-m-d h:m:s")
        );

        $this->db->insert('pages',$data);
        $this->session->set_flashdata('message', display('page_add_msg'));
        redirect("page/page_controller/create_new_page");
    }


    public function Edit_page($id) {

        $this->permission->check_label('add_new_page')->create()->redirect(); 
        $data['pageinfo'] = $this->page_model->page_by_id($id);

        $data['title'] = display('edit_page');
        $data['module'] = "page"; 
        $data['page']   = "pages/view_edit_page"; 
        echo Modules::run('template/layout',$data);  
    }


    public function Update_page() {

        $this->permission->check_label('page_list')->update()->redirect(); 

        $id = $this->input->post('id');
        if (@$_FILES['image']['name']!=NULL){
            
            $config['upload_path']   = './uploads/page_img/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['overwrite']     = false;
            $config['max_size']      = 1024;
            $config['remove_spaces'] = true;
            $config['max_filename']   = 10;
            $config['file_ext_tolower'] = true;
          
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('image')){
                $this->session->set_flashdata('exception','File format not allowed!');
                redirect("admin/page_controller/create_new_page/".$id);
            } else {
                $data = $this->upload->data();
                $image = $config['upload_path'].$data['file_name'];

            #------------resize image------------#
                    $this->load->library('image_lib');
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = $config['upload_path'].$data['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['width']    = 685;
                    $config['height']   = 385;

                    $this->image_lib->clear();
                    $this->image_lib->initialize($config);
                    $this->image_lib->resize();
            #-------------resize image----------#
            }

        } else {
            $image = $this->input->post('pic',TRUE);
        }

        // Checking that slug is formatted or not
        if($this->input->post('slug')!=NULL){
            $page_slug = $this->input->post('slug',TRUE);
        }else{
            $title =  explode(' ',$this->input->post('title',TRUE));
            $page_slug = @$title[0].' '.@$title[1];
        }

       
        $data = array(
            'title'         => $this->input->post('title',TRUE),
            'page_slug'     => $page_slug,
            'description'   => htmlspecialchars_decode($this->input->post('details_news',TRUE)),
            'image_id'      => $image,
            'video_url'     => $this->input->post('videos',TRUE),
            'publishar_id'  => $this->session->userdata('id'),
            'seo_keyword'   => trim($this->input->post('meta_keyword',TRUE)),
            'seo_description' => trim($this->input->post('meta_description',TRUE)),
            'publish_date' => date("Y-m-d h:m:s")
        );
        
        $this->db->where('page_id',$id)->update('pages',$data);
        $this->session->set_flashdata('message', display('update_message'));
        redirect("page/page_controller/pages");

    }

    public function Delete_page($id){

        $this->permission->check_label('page_list')->delete()->redirect(); 

        $this->db->where('page_id',$id)->delete('pages');
        $this->session->set_flashdata('message', display('delete_message'));
        redirect("page/page_controller/pages");
    }



    public function unpublishd($id){

        $this->permission->check_label('page_list')->update()->redirect(); 

        $this->db->set('status',0)->where('page_id',$id)->update('pages');
        $this->session->set_flashdata('message', display('delete_message'));
        redirect("page/page_controller/pages");

    }

    public function publishd($id){

        $this->permission->check_label('page_list')->update()->redirect(); 

        $this->db->set('status',1)->where('page_id',$id)->update('pages');
        $this->session->set_flashdata('message', display('delete_message'));
        redirect("page/page_controller/pages");
        
    }


}
