<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Tag Post View Controller
 * 
 * @author BDTASK <bdtask@gmail.com>
 * 
 * @link http://www.bdtask.com
 */


class Tag_controller extends CI_Controller {

   
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
        $this->load->model('tag_model');
    }


    #---------------------------------    
    # view categroy page
    #--------------------------------- 
    public function tag() {
        
    
                // slug Name from URL
                $tag = $this->uri->segment(2); 
                $tags = $this->db->where('tag',$tag)->group_by('news_id')->get('post_tag_tbl')->result();
                $news_ids = array();

                foreach ($tags as $key => $value) {
                   $news_ids[] = $value->news_id;
                }


                //getting catagory page data
                $data = $this->tag_model->tag_data($news_ids);

                if ($data == false) {
                    redirect('error_404_not_found');
                }



                $data['setting']                = $this->db->select('*')->get('app_settings')->row();
                $data['meta']                   = json_decode($this->settings->get_previous_settings('settings', 5));
                $data['social_link']            = json_decode($this->settings->get_previous_settings('settings', 111));
                $data['social_page']            = json_decode($this->settings->get_previous_settings('settings', 6));
                
                $data['default_theme'] = $this->wsm->theme_data();
                $data['lan'] = $this->wsm->lan_data();
                $default_theme = $data['default_theme'];
   
                //editorial gategory news get
                $data['Editor'] = $this->hm->home_data('Editor-Choice');
                
                $data['ln'] = $this->cm->latest_news();
                $data['bn'] = $this->cm->breaking_news();
                $data['mr'] = $this->cm->most_read_dbse();

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





}
