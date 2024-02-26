<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * View setup controller
 * 
 * @author BDTASK <bdtask@gmail.com>
 * 
 * @link http://www.bdtask.com
 */

class View_setup extends MX_Controller {


    public function __construct() {
        parent::__construct();
        if (! $this->session->userdata('isLogIn'))
            redirect('login');

        $this->load->model(['backend/view_setting_model','category_model']);
    }

    public function app_setting(){
        $this->permission->check_label('app_setting')->read()->redirect(); 
        $data['settings'] = $this->db->get('app_settings')->row();
        $data['title'] = display('app_settings');
        $data['module'] = "settings"; 
        $data['page']   = "settings/__app_setting"; 
        echo Modules::run('template/layout', $data); 
    }


    public function app_settings_save(){

        $this->permission->check_label('app_setting')->update()->redirect(); 

        //logo upload
        $logo = $this->fileupload->do_upload(
            'uploads/images/',
            'website_logo'
        );

        //if logo is not uploaded
        if ($logo === false) {
            $this->session->set_flashdata('exception', 'Invalid logo');
        }

        if ($logo !== false && $logo != null) {
            $logo = $logo;
        }else{
            $logo = $this->input->post('website_logo_old',TRUE);
        }


        //footer_logo upload
        $footer_logo = $this->fileupload->do_upload(
            'uploads/images/',
            'footer_logo'
        );

        //if logo is not uploaded
        if ($footer_logo === false) {
            $this->session->set_flashdata('exception', 'Invalid footer logo');
        }

        if ($footer_logo !== false && $footer_logo != null) {
            $footer_logo = $footer_logo;
        }else{
            $footer_logo = $this->input->post('footer_logo_old',TRUE);
        }


        //favicon upload
        $favicon = $this->fileupload->do_upload(
            'uploads/images/',
            'favicon'
        );

        //if logo is not uploaded
        if ($favicon === false) {
            $this->session->set_flashdata('exception', 'Invalid favicon');
        }

        // if favicon is uploaded then resize the favicon
        if ($favicon !== false && $favicon != null) {
            $this->fileupload->do_resize(
                $favicon, 
                32,
                32
            );
        }else{
            $favicon = $this->input->post('favicon_old',TRUE);
        }
        

        $app_logo = $this->fileupload->do_upload(
            'uploads/images/',
            'app_logo'
        );

        //if app_logo is not uploaded
        if ($app_logo === false) {
            $this->session->set_flashdata('exception', 'Invalid app logo');
        }

        if ($app_logo !== false && $app_logo != null) {
            $this->fileupload->do_resize(
                $app_logo, 
                210,
                52
            );
        }else{
            $app_logo = $this->input->post('app_logo_old',TRUE);
        }

        $mobile_menu_image = $this->fileupload->do_upload(
            'uploads/images/',
            'mobile_menu_image'
        );

        //if app_logo is not uploaded
        if ($mobile_menu_image === false) {
            $this->session->set_flashdata('exception', 'Invalid mobile menu image');
        }

        if ($mobile_menu_image !== false && $mobile_menu_image != null) {
            $this->fileupload->do_resize(
                $mobile_menu_image, 
                845,
                1334
            );
        }else{
            $mobile_menu_image = $this->input->post('mobile_menu_image_old',TRUE);
        }


        $settingData = array(
            'website_title'     => $this->input->post('website_title',TRUE),
            'footer_text'       => $this->input->post('footer_text',TRUE),
            'copy_right'        => $this->input->post('copy_right',TRUE),
            'logo'              => @$logo,
            'footer_logo'       => $footer_logo,
            'favicon'           => @$favicon,
            'app_logo'          => @$app_logo,
            'mobile_menu_image' => @$mobile_menu_image,
            'time_zone'         => $this->input->post('time_zone',TRUE),
            'ltl_rtl'           => $this->input->post('ltl_rtl',TRUE),
            'newstriker_status' => $this->input->post('newstriker_status',TRUE),
            'preloader_status'  => $this->input->post('preloader_status',TRUE),
            'share_status'  => $this->input->post('share_status',TRUE),
            'speed_optimization'  => $this->input->post('speed_optimization',TRUE),
            'captcha'  => $this->input->post('captcha',TRUE)
        );

        $id = $this->input->post('id');

        if(!empty($id)){
            $this->db->where('id',$id)->update('app_settings',$settingData);
            $this->session->set_flashdata('message', display('update_message'));
        }else{
            $this->db->insert('app_settings',$settingData);
            $this->session->set_flashdata('message', display('save_message'));
        }
        redirect('settings/view_setup/app_setting');

    }



    public function home_view_settings() {

        $this->permission->check_label('home_page')->read()->redirect(); 
      
        $data['categories'] = $this->view_setting_model->get_all_categories();
        $data['home_page_settings'] = json_decode($this->view_setting_model->get_previous_settings('settings', 4));  


        $data['title'] = display('home_page');
        $data['module'] = "settings"; 
        $data['page']   = "settings/__home_page_settings";
        echo Modules::run('template/layout', $data); 

    }


    public function save_home_page_settings() {

        $this->permission->check_label('home_page')->create()->redirect(); 
        
        $data['position_no'] = $this->input->post('position_no',TRUE);
        $data['category_id'] = $this->input->post('category_name',TRUE);
        $data['max_news'] = $this->input->post('max_news',TRUE);

        if ($data['position_no'] == '' || $data['category_id'] == '' ) {
            $this->session->set_flashdata('exception','Please enter missing fields.');
            redirect('settings/view_setup/home_view_settings');
        }else {

            $hpData['id'] = 4;
            $hpData['event'] = 'home_page_cat_style';
            $cat_info = $this->category_model->get_category_info($data['category_id']);
            $position_wise_data = array();

            $position_wise_data[$data['position_no']] = array(
                'slug' => $cat_info->slug,
                'cat_name' => $cat_info->category_name,
                'category_id' => $data['category_id'],
                'status' => 0,
            );

            //JSON FORMAT 
            $JSON_DATA = json_encode($position_wise_data);
            $hpData['details'] = $JSON_DATA;
            // check settings exist
            $settings_count = $this->view_setting_model->check_settings_exist('settings', 4);
            
            if ($settings_count == 0) {

                $this->view_setting_model->save_settings('settings', $hpData, 4);
                $this->session->set_flashdata('exception',display('setting_message'));
                redirect('settings/view_setup/home_view_settings');

            } else {
                
                $previous_data = json_decode('[' . $this->view_setting_model->get_previous_settings('settings', 4) . ']');
                
                if (count($previous_data) != 0) {

                    if (property_exists($previous_data[0], $data['position_no'])) {
                        
                        $this->session->set_flashdata("exception","Category already exist in position - <b>" . $data['position_no'] . "</b>");
                        redirect('settings/view_setup/home_view_settings');

                    } else {

                        function objectToArray($object) {
                            if (!is_object($object) && !is_array($object))
                            return $object;
                            return array_map('objectToArray', (array) $object);
                        }

                        $new_data = objectToArray($previous_data[0]);
                        $new_data[$data['position_no']] = array(
                            'slug' => $cat_info->slug,
                            'cat_name' => $cat_info->category_name,
                            'max_news' => $data['max_news'],
                            'category_id' => $data['category_id'],
                            'status' => 0,
                        );

                        $JSON_DATA = json_encode($new_data);
                        $hpData['details'] = $JSON_DATA;

                        $this->view_setting_model->update_table_by_data('settings', $hpData, 4);
                        
                        $this->session->set_flashdata('message',display('setting_message'));

                        redirect('settings/view_setup/home_view_settings');
                        
                    }

                }else {

                    $this->view_setting_model->update_table_by_data('settings', $hpData, 4);
                    $this->session->set_flashdata('message',display('setting_message'));

                    redirect('settings/view_setup/home_view_settings');
                }
            }

        }
    }



    public function update_home_page_settings() {

        $this->permission->check_label('home_page')->update()->redirect();
       
        $position_no    = $this->input->post('position_no',TRUE);
        $category_id    = $this->input->post('category_id',TRUE);
        $max_news       = $this->input->post('max_news',TRUE);
        $status         = $this->input->post('status',TRUE);
        $hpData['id']   =  4;
        $hpData['event'] = 'home_page_cat_style';

        foreach ($position_no as $key => $value) {

            $cat_info = $this->category_model->get_category_info($category_id[$value]);

            if (!isset($status[$value])) {
                $new_status = 0;
            } else {
                $new_status = $status[$value];
            }
            $new_data[$value] = array(
                'cat_name'      => $cat_info->category_name,
                'slug'          => $cat_info->slug,
                'max_news'      => @$max_news,
                'category_id'   => $category_id[$value],
                'status'        => $new_status,
            );
        }

        $details = json_encode($new_data);

        $hpData['details'] = $details;

        $this->view_setting_model->update_table_by_data('settings', $hpData, 4);

        $this->session->set_flashdata('message',display('update_message'));
        redirect("settings/view_setup/home_view_settings");

    }



    public function contact_page_setup(){

        $this->permission->check_label('contact_page_setup')->read()->redirect();

        $data['contact_setting'] = json_decode($this->view_setting_model->get_previous_settings('settings', 113));

        $data['title'] = display('contact_page_setup');
        $data['module'] = "settings"; 
        $data['page']   = "settings/__contact_page";
        echo Modules::run('template/layout', $data); 

    }


    public function save_contact_page() {

        $this->permission->check_label('contact_page_setup')->update()->redirect();
    
        $S_data ['id'] = 113;
        $S_data ['event'] = 'contact_page_setup';

        $post['content'] = $this->input->post('content',TRUE);
        $post['address'] = $this->input->post('address',TRUE);
        $post['phone'] = $this->input->post('phone',TRUE);
        $post['phone_two'] = $this->input->post('phone_two',TRUE);
        $post['email'] = $this->input->post('email',TRUE);
        $post['website'] = $this->input->post('website',TRUE);

        $post['latitude'] = $this->input->post('latitude',TRUE);
        $post['longitude'] = $this->input->post('longitude',TRUE);

        $S_data ['details'] = json_encode($post);
        $check_settings_exist = $this->view_setting_model->check_settings_exist('settings', 113);
        
        if ($check_settings_exist == 0) {
            $this->view_setting_model->save_contact_page('settings', $S_data);
             $this->session->set_flashdata('message',display('update_message'));
            redirect("settings/view_setup/contact_page_setup");
        } else {
            $this->view_setting_model->update_contact_page('settings', $S_data, 113);
            $this->session->set_flashdata('message',display('update_message'));
            redirect("settings/view_setup/contact_page_setup");
        }

    }



    public function date_setup(){

        $this->permission->check_label('contact_page_setup')->read()->redirect();

        $data['dateconvert'] = json_decode($this->view_setting_model->get_previous_settings('settings', 116));


        $data['title'] = display('contact_page_setup');
        $data['module'] = "settings"; 
        $data['page']   = "settings/__date_page";
        echo Modules::run('template/layout', $data); 

    }


    public function save_date_setup() {

    
        $S_data ['id'] = 116;
        $S_data ['event'] = 'contact_page_setup';

        $post['content'] = $this->input->post('content',TRUE);
        $post['address'] = $this->input->post('address',TRUE);
        $post['phone'] = $this->input->post('phone',TRUE);
        $post['phone_two'] = $this->input->post('phone_two',TRUE);
        $post['email'] = $this->input->post('email',TRUE);
        $post['website'] = $this->input->post('website',TRUE);
        $post['latitude'] = $this->input->post('latitude',TRUE);
        $post['longitude'] = $this->input->post('longitude',TRUE);

        $S_data ['details'] = json_encode($post);
        $check_settings_exist = $this->view_setting_model->check_settings_exist('settings', 116);
        
        if ($check_settings_exist == 0) {
            $this->view_setting_model->save_contact_page('settings', $S_data);
             $this->session->set_flashdata('message',display('update_message'));
            redirect("settings/view_setup/contact_page_setup");
        } else {
            $this->view_setting_model->update_contact_page('settings', $S_data, 116);
            $this->session->set_flashdata('message',display('update_message'));
            redirect("settings/view_setup/contact_page_setup");
        }

    }


    public function email_setting(){

        $this->permission->check_label('email_setting')->read()->redirect();

        $data['email_config'] = $this->db->select('*')->get('email_config')->row();

        $data['title'] = display('email_setting');
        $data['module'] = "settings"; 
        $data['page']   = "settings/__email_config";
        echo Modules::run('template/layout', $data); 


    }



    public function email_config() {

        $this->permission->check_label('email_setting')->update()->redirect();

            $data = array (
                'smtp_protocol' => $this->input->post('protocol',TRUE),
                'smtp_host' => $this->input->post('host',TRUE),
                'smtp_port' => $this->input->post('port',TRUE),
                'smtp_username' => $this->input->post('username',TRUE),
                'smtp_password' => $this->input->post('password',TRUE),
                'smtp_mailtype' => $this->input->post('mailtype',TRUE),
                'smtp_charset' => $this->input->post('charset',TRUE),
                'status' => ($this->input->post('status')?'1':0)
            );

            $id = $this->input->post('id');
            $this->db->where('id',$id)->update('email_config',$data);

        $this->session->set_flashdata('message','Updated Successfully');
        redirect("settings/view_setup/email_setting");
    }





    public function social_auth_setting(){

        $this->permission->check_label('social_auth_setting')->read()->redirect();

        $data['facebook'] = $this->db->select('*')->from('social_auth')->where('id=',1)->get()->row();
        $data['google'] = $this->db->select('*')->from('social_auth')->where('id=',2)->get()->row();

        $data['title'] = display('social_auth_setting');
        $data['module'] = "settings"; 
        $data['page']   = "settings/__social_auth_setting";
        echo Modules::run('template/layout', $data); 

    }




    public function social_auth_update(){

        $this->permission->check_label('social_auth_setting')->update()->redirect();

        $id         = $this->input->post('id',TRUE);
        $app_id     = $this->input->post('app_id',TRUE);
        $app_secret = $this->input->post('app_secret',TRUE);
        $api_key    = $this->input->post('api_key',TRUE);
        $status    = $this->input->post('status',TRUE);

        $data = array(
            'app_id'        => $app_id,
            'app_secret'    => $app_secret,
            'api_key'       => $api_key,
            'status'       => $status
        );
        
        $this->db->where('id',$id)->update('social_auth',$data);

        $this->session->set_flashdata('message',display('update_message'));
        redirect("settings/view_setup/social_auth_setting");

        
    }
    

    public function update_status($id){

        $this->permission->check_label('social_auth_setting')->read()->redirect();

        $data = $this->db->select('status')->where('id',$id)->get('social_auth')->row();

        $new_status = ($data->status==1?'0':'1');

        $this->db->set('status',$new_status)->where('id',$id)->update('social_auth');

        $this->session->set_flashdata('message',display('update_message'));
        redirect("settings/view_setup/social_auth_setting");
    }





    public function page_setup_404(){

        $this->permission->check_label('404_page_setting')->read()->redirect();

        $data['setting404'] = json_decode($this->view_setting_model->get_previous_settings('settings', 114));

        $data['title'] = display('404_page_setting');
        $data['module'] = "settings"; 
        $data['page']   = "settings/__404_page";
        echo Modules::run('template/layout', $data); 

    }


    public function save_page_setup_404() {

        $this->permission->check_label('404_page_setting')->update()->redirect();

    
        $S_data ['id'] = 114;
        $S_data ['event'] = '404_page_setup';

        $post['heading'] = $this->input->post('heading',TRUE);
        $post['details'] = $this->input->post('details',TRUE);
        

        $img404 = $this->fileupload->do_upload(
            'uploads/images/',
            'upimg'
        );

        //if app_logo is not uploaded
        if ($img404 === false) {
            $this->session->set_flashdata('exception', 'Invalid image');
        }

        if ($img404 !== false && $img404 != null) {
            $this->fileupload->do_resize(
                $img404, 
                845,
                550
            );
        }else{
            $img404 = $this->input->post('img404_old',TRUE);
        }

        $post['img404'] = $img404;

        $S_data ['details'] = json_encode($post);

        $check_settings_exist = $this->view_setting_model->check_settings_exist('settings', 114);
        
        if ($check_settings_exist == 0) {
            $this->view_setting_model->save_contact_page('settings', $S_data);
             $this->session->set_flashdata('message',display('update_message'));
            redirect("settings/view_setup/page_setup_404");
        } else {
            $this->view_setting_model->update_contact_page('settings', $S_data, 114);

            $this->session->set_flashdata('message',display('update_message'));
            redirect("settings/view_setup/page_setup_404");

        }

    }


    public function panel_face(){

        $this->permission->check_label('panel_face')->read()->redirect();

        $data['setting'] = json_decode($this->view_setting_model->get_previous_settings('settings', 117));

        $data['title'] = display('panel_face');
        $data['module'] = "settings"; 
        $data['page']   = "settings/__panel_face";
        echo Modules::run('template/layout', $data); 

    }


    public function save_panel_face() {

        $this->permission->check_label('panel_face')->update()->redirect();


        $S_data ['id'] = 117;
        $S_data ['event'] = 'panel_face';

        $post['fontone'] = $this->input->post('fontone',TRUE);
        $post['fonttwo'] = $this->input->post('fonttwo',TRUE);
        $post['color_code'] = $this->input->post('color_code',TRUE);
        $post['body_font_size'] = $this->input->post('body_font_size',TRUE);
        $post['body_line_hight'] = $this->input->post('body_line_hight',TRUE);
        $post['content_text_color'] = $this->input->post('content_text_color',TRUE);
        $post['logo_text_color'] = $this->input->post('logo_text_color',TRUE);
        $post['menubg_color'] = $this->input->post('menubg_color',TRUE);
        $post['menu_hover_color'] = $this->input->post('menu_hover_color',TRUE);
        $post['menu_font_color'] = $this->input->post('menu_font_color',TRUE);
        $post['menu_font_size'] = $this->input->post('menu_font_size',TRUE);
        $post['active_menu_color'] = $this->input->post('active_menu_color',TRUE);
        $post['active_menu_bgcolor'] = $this->input->post('active_menu_bgcolor',TRUE);
        $post['active_status'] = $this->input->post('active_status',TRUE);
        

        $S_data ['details'] = json_encode($post);

        $check_settings_exist = $this->view_setting_model->check_settings_exist('settings', 117);

        if ($check_settings_exist == 0) {
            $this->view_setting_model->save_contact_page('settings', $S_data);
            $this->session->set_flashdata('message',display('update_message'));
            redirect("settings/view_setup/panel_face");
        } else {
            $this->view_setting_model->update_contact_page('settings', $S_data, 117);
            $this->session->set_flashdata('message',display('update_message'));
            redirect("settings/view_setup/panel_face");
        }

    }


    public function languageList(){ 

        if ($this->db->table_exists("language")) { 

                $fields = $this->db->field_data("language");

                $i = 1;
                foreach ($fields as $field)
                {  
                    if ($i++ > 2)
                    $result[$field->name] = ucfirst($field->name);
                }

                if (!empty($result)) return $result;
 
        } else {

            return false; 
            
        }
    }


}

