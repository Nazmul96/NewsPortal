<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Rss_import_setup extends MX_Controller {

 	
 	public function __construct(){
 		parent::__construct();
        if (! $this->session->userdata('isLogIn'))
            redirect('login');
        $this->load->model(['rss']);
 	}



    public function setup(){

        $data['links'] = $this->rss->get_settings();

        $data['categories'] = $this->rss->get_categories();

        $data['title'] = display('meta_setting');
        $data['module'] = "RSS_Feed"; 
        $data['page']   = "settings/__add_rss_url";
        echo Modules::run('template/layout', $data); 

    }


    public function save_rss_link() {

        $post ['feed_name']         = $this->input->post("feed_name",TRUE);
        $post ['rss_link']          = $this->input->post("rss_link",TRUE);
        $post ['category_slug']     = $this->input->post("category_slug",TRUE);
        $post ['post_number']       = $this->input->post("post_number",TRUE);
        $post ['status']            = $this->input->post("status",TRUE);
        

        $check_settings_exist       = $this->rss->check_settings($post ['rss_link']);

        if ($check_settings_exist) {
            echo json_encode(array("status" => 2));
        } else{

            $this->rss->save_settings($post);
            echo json_encode(array("status" => 1));

        }

    }



    public function get_edit_info($id) {
        $data = $this->rss->get_info($id);
        echo json_encode($data);
        
    }



    public function delete_link($id) {

        if($this->rss->delete_link($id)){
            echo json_encode(array("status" => 1));
        }else{
            echo json_encode(array("status" => 2));
        }
        
    }


    public function update_link(){

        $post ['feed_name']     = $this->input->post("feed_name",TRUE);
        $post ['rss_link']     = $this->input->post("rss_link",TRUE);
        $post ['category_slug']  = $this->input->post("category_slug",TRUE);
        $post ['post_number']  = $this->input->post("post_number",TRUE);
        $post ['status']  = $this->input->post("status",TRUE);
        $post ['id']  = $this->input->post("id",TRUE);


        if ($this->rss->update_settings($post)) {
            echo json_encode(array("status" => 1));
        } else{
            echo json_encode(array("status" => 2));
        }


    }



    
    public function rss_sitemap(){

        $this->permission->check_label('rss_&_sitemap_link')->read()->redirect();

        $data['title'] = display('rss_sitemap');
        $data['module'] = "RSS_Feed"; 
        $data['page']   = "settings/__rss_sitemap";
        echo Modules::run('template/layout', $data); 

    }




}
