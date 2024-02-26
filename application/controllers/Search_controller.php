<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Search  Controller
 * 
 * @author BDTASK <bdtask@gmail.com>
 * 
 * @link http://www.bdtask.com
 */
class Search_controller extends CI_Controller {

    /*******************************
    * Construct function
    ******************************/

    public function __construct() {
        parent::__construct();
        // loading model
        $this->load->model("settings");
        $this->load->model("search_model");
        $this->load->model('Common_model', 'cm');
        $this->load->model('Write_setting_model', 'wsm');
    }


    public function search(){

        $q = $this->input->get('q',TRUE);
        if(@$q!=NULL){
            $keyword = $this->input->get('q',TRUE);
            $keyword = strip_tags($keyword);
            $keyword = htmlspecialchars($keyword);
            $keyword = htmlentities($keyword); 
            $keyword = explode(' ', $keyword);
            $keyword = array_unique($keyword); 
            $keyword = implode(' ', $keyword); 
        }else{
            $keyword = '';
        }


        $limit = 8;
        $start = $this->uri->segment(3);
        $config =$this->get_pagination_config($keyword);

        //pagination initialization
        $this->pagination->initialize($config);
        $data = $this->search_model->get_search_data($keyword,$limit,$start);



        $data["links"] = $this->pagination->create_links();        
        $data['setting']                = $this->db->get('app_settings')->row();

        $data['meta']                   = json_decode($this->settings->get_previous_settings('settings', 5));
        $data['social_link']            = json_decode($this->settings->get_previous_settings('settings', 111));
        $data['social_page']            = json_decode($this->settings->get_previous_settings('settings', 6));

        $data['lan']                    = $this->wsm->lan_data();
        $data['default_theme']          = $this->wsm->theme_data();
        $default_theme = $data['default_theme'];
       
        // breaking news
        $data['bn'] =  $this->cm->breaking_news();
        $data['mr'] =  $this->cm->most_read_dbse();
        $data['ln'] =  $this->cm->latest_news();
        
        //editorial gategory news get
        $data['main_menu']      = $this->settings->main_menu();
        $data['cat_menus']      = $this->settings->footer_menu();
        $data['footer_menu']    = $this->settings->menu_position_3();
        $data['cat']    = $this->settings->count_post_by_cat();

        $data['login_url'] = $this->googleplus->loginURL();

        $data['keyword'] = @$keyword;
        
        $this->load->view("themes/" . $default_theme . "/header", $data);
        $this->load->view("themes/" . $default_theme . "/breaking");
        $this->load->view("themes/" . $default_theme . "/menu");
        $this->load->view("themes/" . $default_theme . "/view_search");
        $this->load->view('themes/' . $default_theme . '/footer');
    }




    #---------------------------------    
    #   get pagination configaretion
    #--------------------------------- 
    public function get_pagination_config($arc_date) {
        $limit = 8;   
        $total_rows = $this->search_model->get_search_data_row($arc_date);
        $config["base_url"] = base_url("Search_controller/search");
        $config['suffix'] = '?'.http_build_query($_GET, '', "&");
        $config['first_url'] = $config['base_url'].$config['suffix'];

        $config["total_rows"] = $total_rows;
        $config["per_page"] = $limit;
        // integrate bootstrap pagination
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a class="active">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = ' </li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        return $config;
    }


}

