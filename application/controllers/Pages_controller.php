<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Page Controller
 * 
 * @author BDTASK <bdtask@gmail.com>
 * 
 * @link http://www.bdtask.com
 */



class Pages_controller extends CI_Controller {

   
    public function __construct() {
        parent::__construct();
        // loading model
        $this->load->model('ads');
        $this->load->model("settings");
        $this->load->model("page");
        $this->load->model('Pb_function', 'pb');
        $this->load->model('Page_model', 'ps');
        $this->load->model('Home_model', 'hm');
        $this->load->model('Common_model', 'cm');
        $this->load->library('pagination');
        $this->load->model('Write_setting_model', 'wsm');
        $this->load->model('new_page');
    }


    #---------------------------------    
    # view categroy page
    #--------------------------------- 
    public function category() {
        
            // slug Name from URL
            $limit = 8;
            $start = ($this->uri->segment(3)?$this->uri->segment(3):0);
            $page_name = $this->uri->segment(2); 

            //pagination configuration        
            $config = $this->get_pagination_config($page_name,$limit);
            //pagination initialization
            $this->pagination->initialize($config);
            //getting catagory page data
            $data = $this->ps->page_data($page_name,$limit,$start);

            // if (empty($data['pn'])) {
            //     redirect('error_404_not_found');
            // }

            $data['setting']                = $this->db->get('app_settings')->row();
            $data['meta']                   = json_decode($this->settings->get_previous_settings('settings', 5));
            $data['social_link']            = json_decode($this->settings->get_previous_settings('settings', 111));
            $data['social_page']            = json_decode($this->settings->get_previous_settings('settings', 6));
            
            $data['default_theme'] = $this->wsm->theme_data();
            $data['lan'] = $this->wsm->lan_data();
            $default_theme = $data['default_theme'];

            $data['cat_imgae'] = $this->db->where('slug',$page_name)->where('img_status',0)->get('categories')->row();
            //editorial gategory news get
            $data['Editor'] = $this->hm->home_data('Editor-Choice');
            
            $data['ln'] = $this->cm->latest_news();
            $data['bn'] = $this->cm->breaking_news();
            $data['mr'] = $this->cm->most_read_dbse();
            $data['cat']    = $this->settings->count_post_by_cat();

            $data['login_url'] = $this->googleplus->loginURL();

            //Page view settings
            $data['ads'] = $this->ads->SelectAds();
            $data['main_menu']      = $this->settings->main_menu();
            $data['cat_menus']          = $this->settings->footer_menu();
            $data['footer_menu']    = $this->settings->menu_position_3();

            $this->load->view('themes/' . $default_theme . '/header', $data);
            $this->load->view('themes/' . $default_theme . '/breaking');
            $this->load->view('themes/' . $default_theme . '/menu');
            $this->load->view('themes/' . $default_theme . '/page_view');
            $this->load->view('themes/' . $default_theme . '/footer');
            $this->output->cache(30);
    }



    #---------------------------------    
    #   get pagination configaretion
    #--------------------------------- 
    public function get_pagination_config($category_slug,$limit) {

        $config['total_rows'] = $this->ps->count_total_news_by_category($category_slug);
        $config['per_page'] = $limit;
        $config['base_url'] = base_url('category/') .$category_slug;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['last_tag_open'] = '<li>';
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


    #---------------------------------    
    #   page
    #--------------------------------- 
    public function page() {


        $page_name = $this->uri->segment(2); 
        $data = $this->new_page->page_data($page_name);
        
        $data['mr'] = $this->cm->most_read_dbse();
        //breaking news
        $data['bn'] = $this->cm->breaking_news();
        //latest news
        $data['ln'] = $this->cm->latest_news();
        $data['cat'] = $this->settings->count_post_by_cat();

        $data['setting']                = $this->db->get('app_settings')->row();
        $data['meta']                   = json_decode($this->settings->get_previous_settings('settings', 5));
        $data['social_link']            = json_decode($this->settings->get_previous_settings('settings', 111));
        $data['social_page']            = json_decode($this->settings->get_previous_settings('settings', 6));
        
        $data['default_theme'] = $this->wsm->theme_data();
        $default_theme = $data['default_theme'];

        $data['login_url'] = $this->googleplus->loginURL();
        
        #----------------------
        $data['ads'] = $this->ads->SelectAds();
        $data['main_menu']      = $this->settings->main_menu();
        $data['cat_menus']          = $this->settings->footer_menu();
        $data['footer_menu']    = $this->settings->menu_position_3();
       
        $this->load->view('themes/' . $default_theme . '/header', $data);
        $this->load->view('themes/' . $default_theme . '/breaking');
        $this->load->view('themes/' . $default_theme . '/menu');
        $this->load->view('themes/' . $default_theme . '/Page');
        $this->load->view('themes/' . $default_theme . '/footer');
        $this->output->cache(10);

    }


}
