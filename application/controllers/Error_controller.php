<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Error Controller
 * 
 * @author BDTASK <bdtask@gmail.com>
 * 
 * @link http://www.bdtask.com
 */

class Error_controller extends CI_Controller {
    // construction function
    public function __construct() {
        parent::__construct();
        // loading model
        $this->load->model('Ads');
        $this->load->model('Pb_function', 'pb');
        $this->load->model('settings');
        $this->load->model('Article_model', 'article_model');
        $this->load->model('Page_model', 'ps');
        $this->load->model('Home_model', 'hm');
        $this->load->model('Write_setting_model', 'wsm');
        $this->load->model('Common_model', 'cm');
    }

    public function error_404_not_found() {


        # website setting data        
        $data['setting']                = $this->db->get('app_settings')->row();
        $data['meta']                   = json_decode($this->settings->get_previous_settings('settings', 5));
        $data['social_link']            = json_decode($this->settings->get_previous_settings('settings', 111));
        $data['social_page']            = json_decode($this->settings->get_previous_settings('settings', 6));
        $data['page404']                = json_decode($this->settings->get_previous_settings('settings', 114));
 
        $data['default_theme'] = $this->wsm->theme_data();
        $default_theme = $data['default_theme'];

        $data['mr'] = $this->cm->most_read_dbse();
        $data['ln'] = $this->cm->latest_news();
        $data['bn'] = $this->cm->breaking_news();

        //Page view settings
        $data['main_menu']      = $this->settings->main_menu();
        $data['cat_menus']      = $this->settings->footer_menu();

        $data['footer_menu']    = $this->settings->menu_position_3();

        $this->load->view('themes/' . $default_theme . '/header', $data);
        $this->load->view('themes/' . $default_theme . '/breaking');
        $this->load->view('themes/' . $default_theme . '/menu');
        $this->load->view('themes/' . $default_theme . '/404error');
        $this->load->view('themes/' . $default_theme . '/footer');
        
    }


}
