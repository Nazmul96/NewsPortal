<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Article Controller
 * 
 * @author BDTASK <bdtask@gmail.com>
 * 
 * @link http://www.bdtask.com
 */


class Article_controller extends CI_Controller {

 
    public function __construct() {
        parent::__construct();
        // loading model
        $this->load->model('Ads');
        $this->load->model('Pb_function', 'pb');
        $this->load->model('settings');
        $this->load->model('Article_model', 'article_model');
        $this->load->model('Page_model', 'ps');
        $this->load->model('Home_model', 'hm');
        $this->load->model('common_model');
        $this->load->model('Write_setting_model', 'wsm');
        $this->load->model('comments_model');
    }



    /**
     * -------------------------------------
     * Geting news details
     * @access public 
     * @return news detail view
     * -------------------------------------
     */
    public function details() {

        $curr_page = $this->uri->segment(1);

        $rurl = $this->db->where('from_title',$curr_page)->get('redirection_tbl')->row();
        if(!empty($rurl)){
            redirect($rurl->to_title);  
        }

        $data = $this->article_model->article_select($this->uri->segment(3));

        # website setting data        
        $data['setting']                = $this->db->get('app_settings')->row();
        $data['meta']                   = json_decode($this->settings->get_previous_settings('settings', 5));
        $data['social_page']            = json_decode($this->settings->get_previous_settings('settings', 6));
        $data['social_link']            = json_decode($this->settings->get_previous_settings('settings', 111));
        
        

        $data['lan'] = $this->wsm->lan_data();
        $data['default_theme'] = $this->wsm->theme_data();
        $default_theme = $data['default_theme'];

        $data['mr'] = $this->common_model->most_read_dbse();
        $data['ln'] = $this->common_model->latest_news();
        $data['bn'] = $this->common_model->breaking_news();
        $data['cat']    = $this->settings->count_post_by_cat();


        $data['Editor']         = $this->hm->home_data('Editor-Choice');
        $data['sn']             = $this->hm->home_data($curr_page);
        $data['total_comments'] = $this->comments_model->total_comments($this->uri->segment(3));
        $data["comments"]       = $this->comments_model->view_data_comments($this->uri->segment(3));

        $data['login_url'] = $this->googleplus->loginURL();

        $data['ads']            = $this->Ads->SelectAds();

        $data['main_menu']      = $this->settings->main_menu();
        $data['cat_menus']          = $this->settings->footer_menu();
        $data['footer_menu']    = $this->settings->menu_position_3();
        
        $this->load->view('themes/' . $default_theme . '/header', $data);
        $this->load->view('themes/' . $default_theme . '/breaking');
        $this->load->view('themes/' . $default_theme . '/menu');
        $this->load->view('themes/' . $default_theme . '/article_view');
        $this->load->view('themes/' . $default_theme . '/footer');        
        $this->output->cache(30);

    }


    /**
     * -------------------------------------
     * Geting news details
     * @access public 
     * @return news detail view
     * -------------------------------------
     */

    public function news_details($url) {

        $url = urldecode($this->uri->segment(1)); 
        $rurl = $this->db->where('from_title',$url)->get('redirection_tbl')->row();
        if(!empty($rurl)){
            redirect($rurl->to_title);  
        }

        $news = $this->db->where('encode_title',$url)->get('news_mst')->row();
        if(!empty($news)){
            $curr_page = $news->page;
            $data = $this->article_model->article_select($news->news_id);
        }else{
            redirect('error_404_not_found');  
        }


        // reader_hit count ;
        $data_arr = array('reader_hit' => $data['reader_hit'] + 1);
        $this->db->where('news_id', $data['news_id']);
        $this->db->update('news_mst', $data_arr);
        // reader_hit count ;
        $data['tags'] = $this->db->where('news_id',$data['news_id'])->get('post_tag_tbl')->result();

        # website setting data        
        $data['setting']                = $this->db->get('app_settings')->row();
        $data['meta']                   = json_decode($this->settings->get_previous_settings('settings', 5));
        $data['social_link']            = json_decode($this->settings->get_previous_settings('settings', 111));
        $data['social_page']            = json_decode($this->settings->get_previous_settings('settings', 6));

        $data['schema'] = $this->db->where('news_id',$news->news_id)->where('active_status',1)->get('schema_post')->row();
        
        $data['post_table_of_content'] = $this->db->where('news_id',$news->news_id)->get('post_table_of_content')->result();

        $data['cschema'] = $this->db->where('news_id',$news->news_id)->get('custom_schema')->result();

        $data['lan'] = $this->wsm->lan_data();
        $data['default_theme'] = $this->wsm->theme_data();
        $default_theme = $data['default_theme'];

        $data['mr'] = $this->common_model->most_read_dbse();
        $data['ln'] = $this->common_model->latest_news();
        $data['bn'] = $this->common_model->breaking_news();
        $data['cat']    = $this->settings->count_post_by_cat();

        $data['login_url'] = $this->googleplus->loginURL();


        $data['Editor']         = $this->hm->home_data('Editor-Choice');
        $data['sn']             = $this->hm->home_data($curr_page);
        $data['total_comments'] = $this->comments_model->total_comments(@$news->news_id);
        $data["comments"]       = $this->comments_model->view_data_comments(@$news->news_id);


        $data['ads']            = $this->Ads->SelectAds();
        $data['main_menu']      = $this->settings->main_menu();
        $data['cat_menus']      = $this->settings->footer_menu();
        $data['footer_menu']    = $this->settings->menu_position_3();
        $data['postmeta'] = $this->db->where('news_id',@$news->news_id)->get('post_seo_onpage')->row();

        
        $this->load->view('themes/' . $default_theme . '/header', $data);
        $this->load->view('themes/' . $default_theme . '/breaking');
        $this->load->view('themes/' . $default_theme . '/menu');
        $this->load->view('themes/' . $default_theme . '/article_view');
        $this->load->view('themes/' . $default_theme . '/footer');        
        $this->output->cache(30);

    }
    
    
}

?>