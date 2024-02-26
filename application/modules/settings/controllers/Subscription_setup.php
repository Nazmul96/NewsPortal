<?php defined('BASEPATH') or exit('No direct script access allowed');


class Subscription_setup extends MX_Controller {


    public function __construct() {
        parent::__construct();
        if (! $this->session->userdata('isLogIn'))
            redirect('login');

        $this->load->model(['backend/view_setting_model','category_model']);
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


}