<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @System  : Seo controller
 * @author  : BDTASK <bdtask@gmail.com>
 * @link    : http://www.bdtask.com
 */
class Seo_controller extends MX_Controller {

 	
 	public function __construct(){
 		parent::__construct();
        if (! $this->session->userdata('isLogIn'))
            redirect('login');

        $this->load->model(['backend/view_setting_model','seo_model']);
 	}
 


    public function meta_setting(){

        $this->permission->check_label('meta_setting')->read()->redirect();

        $data['meta'] = json_decode($this->view_setting_model->get_previous_settings('settings', 5));

        $data['title'] = display('meta_setting');
        $data['module'] = "seo"; 
        $data['page']   = "settings/__meta_setting";
        echo Modules::run('template/layout', $data); 

    }


    public function meta_update() {

        $this->permission->check_label('meta_setting')->update()->redirect();

        $SEO_data ['id']            = 5;
        $SEO_data ['event']         = 'meta';
        $post ['meta_tag']          = $this->input->post("meta_tag",TRUE);
        $post ['meta_description']  = $this->input->post("meta_description",TRUE);
        $post ['google_analytics']  = $this->input->post("google_analytics",TRUE);
    
        $SEO_data ['details'] = json_encode($post);

        
        $check_settings_exist = $this->view_setting_model->Check_settings_exist('settings', 5);

        if ($check_settings_exist == 0) {
            $this->seo_model->save_settings('settings', $SEO_data);
            $this->session->set_flashdata('message', display('update_message'));
        } else {
            $this->seo_model->update_settings('settings', $SEO_data, 5);
            $this->session->set_flashdata('message', display('save_message'));
        }

        redirect('seo/seo_controller/meta_setting');
    }



    public function social_sites(){
        $this->permission->check_label('social_sites')->read()->redirect();

        $data['social_page'] = json_decode($this->view_setting_model->get_previous_settings('settings', 6));

        $data['title'] = display('social_sites');
        $data['module'] = "seo"; 
        $data['page']   = "settings/__social_page";
        echo Modules::run('template/layout', $data); 


    }


    public function update_social_pages() {

        $this->permission->check_label('social_sites')->update()->redirect();

        $SEO_data ['id'] = 6;
        $SEO_data ['event'] = 'social_page';

        $post ['fb'] = $this->input->post("fb",TRUE);
        $post ['tw'] = $this->input->post("tw",TRUE);
        $post ['status'] = $this->input->post("status",TRUE);
        $post ['mobile_status'] = $this->input->post("mobile_status",TRUE);
        $SEO_data ['details'] = json_encode($post);

        $check_settings_exist = $this->view_setting_model->Check_settings_exist('settings', 6);

        if ($check_settings_exist == 0) {
            $this->seo_model->save_settings('settings', $SEO_data);
            $this->session->set_flashdata('message', display('save_message'));
        } else {
            $this->seo_model->update_settings('settings', $SEO_data, 6);
            $this->session->set_flashdata('message', display('update_message'));
        }

       redirect('seo/seo_controller/social_sites');

    }



    public function social_link(){

        $this->permission->check_label('social_link')->read()->redirect();

        $data['s_link'] = json_decode($this->view_setting_model->get_previous_settings('settings', 111));

        $data['title'] = display('social_link');
        $data['module'] = "seo"; 
        $data['page']   = "settings/__social_link";
        echo Modules::run('template/layout', $data); 

    }


    public function social_link_save() {

        $this->permission->check_label('social_link')->update()->redirect();

        $S_data ['id'] = 111;
        $S_data ['event'] = 'social_link';
        

        $post['fb'] = $this->input->post('fb',TRUE);
        $post['tw'] = $this->input->post('tw',TRUE);
        $post['linkd'] = $this->input->post('linkd',TRUE);
        $post['google'] = $this->input->post('google',TRUE);
        $post['pin'] = $this->input->post('pin',TRUE);
        $post['vimo'] = $this->input->post('vimo',TRUE);
        $post['youtube'] = $this->input->post('youtube',TRUE);
        $post['flickr'] = $this->input->post('flickr',TRUE);
        $post['vk'] = $this->input->post('vk',TRUE);

        $S_data ['details'] = json_encode($post);
        

        $check_settings_exist = $this->view_setting_model->Check_settings_exist('settings', 111);

        if ($check_settings_exist == 0) {
            $this->db->insert('settings', $S_data);
            $this->session->set_flashdata('message','Save Successfully');
            redirect("seo/seo_controller/social_link");
        } else {
            $this->db->where('id',111);
            $this->db->update('settings', $S_data);

            $this->session->set_flashdata('message','Updated Successfully');
            redirect("seo/seo_controller/social_link");
        }
        
    }




}