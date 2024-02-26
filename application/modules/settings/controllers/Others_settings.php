<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * @System  : setting controller
 * @author  : BDTASK <bdtask@gmail.com>
 * @link    : http://www.bdtask.com
 */
class Others_settings extends MX_Controller {


    public function __construct() {
        parent::__construct();
        if (! $this->session->userdata('isLogIn'))
            redirect('login');
        $this->load->model('backend/view_setting_model');
    }



    public function setting(){

        $data['ot'] = json_decode($this->view_setting_model->get_previous_settings('settings', 115));
        $data['dif'] = json_decode($this->view_setting_model->get_previous_settings('settings', 118));

        $data['title'] = display('setting');
        $data['module'] = "settings"; 
        $data['page']   = "settings/__others_settings"; 
        echo Modules::run('template/layout', $data); 
    }



    public function save_setting() {
    
        $S_data ['id'] = 115;
        $S_data ['event'] = 'others_settings';

        if($this->input->post('reg_status',TRUE)!=NULL){
          $post['reg_status']    = 1;  
        }else{
            $post['reg_status']    = 0;
        }

        if($this->input->post('reg_mail_status',TRUE)!=NULL){
            $post['reg_mail_status']    = 1;  
        }else{
            $post['reg_mail_status']    = 0;
        }


        if($this->input->post('contact_status',TRUE)!=NULL){
            $post['contact_status']    = 1;  
        }else{
            $post['contact_status']    = 0;
        }


        if($this->input->post('contact_mail_status',TRUE)!=NULL){
            $post['contact_mail_status']    = 1;  
        }else{
            $post['contact_mail_status']    = 0;
        }

        if($this->input->post('comments_status',TRUE)!=NULL){
            $post['comments_status']    = 1;  
        }else{
            $post['comments_status']    = 0;
        }

        $S_data ['details'] = json_encode($post);

        $check_settings_exist = $this->view_setting_model->check_settings_exist('settings', 115);
        
        if ($check_settings_exist == 0) {
            $this->view_setting_model->save_contact_page('settings', $S_data);
            echo json_encode(array("status" => 1));
            
        } else {
            $this->view_setting_model->update_contact_page('settings', $S_data, 115); 
            echo json_encode(array("status" => 1));
        }

    }



    public function dateconverter(){

        $data['cdate'] = json_decode($this->view_setting_model->get_previous_settings('settings', 116));


        $data['title'] = display('setting');
        $data['module'] = "settings"; 
        $data['page']   = "settings/__dateconverter"; 
        echo Modules::run('template/layout', $data); 
        
    }


    public function dateconverter_save(){


        $S_data ['id'] = 116;
        $S_data ['event'] = 'dateconvert';

        $post['zero'] = $this->input->post('zero',TRUE);
        $post['one'] = $this->input->post('one',TRUE);
        $post['two'] = $this->input->post('two',TRUE);
        $post['three'] = $this->input->post('three',TRUE);
        $post['four'] = $this->input->post('four',TRUE);
        $post['five'] = $this->input->post('five',TRUE);
        $post['six'] = $this->input->post('six',TRUE);
        $post['seven'] = $this->input->post('seven',TRUE);
        $post['eight'] = $this->input->post('eight',TRUE);
        $post['nine'] = $this->input->post('nine',TRUE);

        $post['sat'] = $this->input->post('sat',TRUE);
        $post['sun'] = $this->input->post('sun',TRUE);
        $post['mon'] = $this->input->post('mon',TRUE);
        $post['tue'] = $this->input->post('tue',TRUE);
        $post['wed'] = $this->input->post('wed',TRUE);
        $post['thu'] = $this->input->post('thu',TRUE);
        $post['fri'] = $this->input->post('fri',TRUE);

        $post['jan'] = $this->input->post('jan',TRUE);
        $post['feb'] = $this->input->post('feb',TRUE);
        $post['mar'] = $this->input->post('mar',TRUE);
        $post['app'] = $this->input->post('app',TRUE);
        $post['mar'] = $this->input->post('mar',TRUE);
        $post['may'] = $this->input->post('thu',TRUE);
        $post['june'] = $this->input->post('june',TRUE);
        $post['july'] = $this->input->post('july',TRUE);
        $post['aug'] = $this->input->post('aug',TRUE);
        $post['sep'] = $this->input->post('sep',TRUE);
        $post['oct'] = $this->input->post('oct',TRUE);
        $post['nov'] = $this->input->post('nov',TRUE);
        $post['dec'] = $this->input->post('dec',TRUE);
        $post['status'] = $this->input->post('status',TRUE);


        $S_data ['details'] = json_encode($post);
        $check_settings_exist = $this->view_setting_model->check_settings_exist('settings', 116);
        
        if ($check_settings_exist == 0) {
            $this->view_setting_model->save_contact_page('settings', $S_data);
             $this->session->set_flashdata('message',display('update_message'));
            redirect("settings/others_settings/dateconverter");
        } else {
            $this->view_setting_model->update_contact_page('settings', $S_data, 116);
            $this->session->set_flashdata('message',display('update_message'));
            redirect("settings/others_settings/dateconverter");
        }

    }


    public function defaultimag_set(){

        $defaultimg = $this->fileupload->do_upload(
            'uploads/images/',
            'defaultimg'
        );
        if ($defaultimg === false) {
            $this->session->set_flashdata('exception', 'Invalid image');
        }
        if ($defaultimg !== false && $defaultimg != null) {
            $this->fileupload->do_resize(
                $defaultimg, 
                643,
                451
            );
        }else{
            $defaultimg = $this->input->post('defaultimg_old',TRUE);
        }
        $post['img'] = $defaultimg;

        $settingData ['id']             =   118;
        $settingData ['event']          =   'post_default_img';
        $settingData['details']             =   json_encode($post);


        $check_settings_exist = $this->view_setting_model->check_settings_exist('settings', 118);

        if ($check_settings_exist == 0) {
            $this->view_setting_model->save_contact_page('settings', $settingData);
            $this->session->set_flashdata('message',display('update_message'));
            redirect("settings/others_settings/setting");
        } else {
            $this->view_setting_model->update_contact_page('settings', $settingData, 118);
            $this->session->set_flashdata('message',display('update_message'));
            redirect("settings/others_settings/setting");
        }

    }







}