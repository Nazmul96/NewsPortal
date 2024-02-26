<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Author Controller
 * 
 * @author BDTASK <bdtask@gmail.com>
 * 
 * @link http://www.bdtask.com
 */



class Author extends CI_Controller {
    // construction function
    public function __construct() {
        parent::__construct();

        $this->load->model('ads');
        $this->load->model("settings");
        $this->load->model('home_model', 'hm');
        $this->load->model('Pb_function', 'pb');
        $this->load->model('All_cata', 'cata');
        $this->load->model('Common_model', 'cm');
        $this->load->model('Write_setting_model', 'wsm');
    }





    /**
     * -------------------------------------
     * view author profile
     * @access public 
     * @return author  data array
     * -------------------------------------
     */

    public function profile($user_id) {

        $data['author_post'] = $this->author_post($user_id);

        $data['number_of_post'] = $this->db->where('post_by',$user_id)->get('news_mst')->num_rows();

        # website setting data        
        $data['setting']                = $this->db->get('app_settings')->row();
        $data['meta']                   = json_decode($this->settings->get_previous_settings('settings', 5));
        $data['social_link']            = json_decode($this->settings->get_previous_settings('settings', 111));
        $data['social_page']            = json_decode($this->settings->get_previous_settings('settings', 6));
        $data['page404']            = json_decode($this->settings->get_previous_settings('settings', 114));

        $data['user_info'] = $this->db->select('*')->where('id',$user_id)->get('user_info')->row();
 
        $data['lan'] = $this->wsm->lan_data();
        $data['default_theme'] = $this->wsm->theme_data();
        $default_theme = $data['default_theme'];

        $data['ln'] = $this->cm->latest_news();
        $data['bn'] = $this->cm->breaking_news();
        $data['mr'] = $this->cm->most_read_dbse();
        $data['pull'] = $this->cm->pulling();

        $data['ads']            = $this->ads->SelectAds();
        $data['Editor']         = $this->hm->home_data('Editor-Choice');

        $data['main_menu']      = $this->settings->main_menu();
        $data['cat_menus']      = $this->settings->footer_menu();
        $data['footer_menu']    = $this->settings->menu_position_3();


        $this->load->view('themes/' . $default_theme . '/header', $data);
        $this->load->view('themes/' . $default_theme . '/breaking');
        $this->load->view('themes/' . $default_theme . '/menu');
        $this->load->view('themes/' . $default_theme . '/profile');
        $this->load->view('themes/' . $default_theme . '/footer');
    }




    #------------------------------------
    #     getting latest news
    #------------------------------------ 
    function author_post($author) {

        $todate = date('Y-m-d');

        $bu = base_url();
        $LN = array();

        $this->db->select('news_mst.news_id,news_mst.encode_title,news_mst.title,news_mst.image,
            news_mst.videos,news_mst.page,news_mst.time_stamp,
            news_mst.post_date,news_mst.news,news_mst.post_by,news_mst.image_title,news_mst.image_alt,
            user_info.id,user_info.photo,user_info.name,user_info.id as user_id ,categories.category_name');
        $this->db->from('news_mst');
        $this->db->join('user_info', 'user_info.id=news_mst.post_by');
         $this->db->join('categories', 'categories.slug=news_mst.page');
        $this->db->where('news_mst.publish_date <=',date("Y-m-d"));
        $this->db->where('news_mst.is_latest', 1);
        $this->db->where('news_mst.status', 0);
        $this->db->where('news_mst.post_by', $author);
        $this->db->order_by('news_mst.id', 'desc');
        $this->db->limit(20);
        $result = $this->db->get()->result();

        $i = 1;
        foreach ($result as $key => $data){

            $splited_TITLE = $this->string_clean($this->explodedtitle($data->title));

            @$page = $data->page;
            @$news_id = $data->news_id;
            @$title = $data->title;
            @$image = $data->image;
            @$ptime = $data->time_stamp;
            @$post_date = $data->post_date;
            @$news = $data->news;
            @$post_by = $data->name;
            @$post_by_img = $data->photo;
            @$videos = $data->videos;
            @$encode_title = $data->encode_title;
            @$encode_title = $data->encode_title;
            
            // video
            $LN['video_'.$i] = $videos;
            // news title
            $LN['news_title_'.$i]           = strip_tags(htmlspecialchars($title)); 
            // post time
            $LN['ptime_' . $i]              = date('l, d M, Y', $ptime);
            // post date
            $LN['post_date_' . $i]          = @$post_date;
            // news
            $LN['news_' . $i]               = strip_tags(htmlspecialchars($news),'<p><a>');
           
            $LN['category_' . $i]            = html_escape(strip_tags($data->category_name));
            $LN['category_name_' . $i]       = html_escape(strip_tags($data->category_name));

            // category link         
            $LN['post_by_id_' . $i]         = $data->user_id;
            $LN['author_profile_' . $i]     = base_url('author/profile/').$data->user_id;

            // category link         
            $LN['category_link_' . $i]       = base_url('categroy/').$page;

            // editor image      
            $LN['post_by_image_' . $i]       =  base_url() . $post_by_img ;
            // editor name
            $LN['post_by_name_' . $i]       = html_escape(strip_tags(@$post_by));
            //news link
            $LN['news_link_' . $i]          = $bu . @$encode_title;
            //Image 
            $LN['image_alt_' . $i]        = $data->image_alt;
            $LN['image_title_' . $i]        = $data->image_title;

            $LN['image_check_' . $i]        = $image;
            // image thumb
            $LN['image_thumb_' . $i]        = base_url() . 'uploads/thumb/' . $image;
            //Large Image 
            $LN['image_large_' . $i]        = base_url() . 'uploads/' . $image;
            $i++;
        }
        return $LN;
    }


        
    #-----------------------------------
    #     explode Title
    #----------------------------------- 
    function explodedtitle($title) {
        return @trim(@implode('-', @preg_split("/[\s,-\:,()]+/", @$title)), '-');
    }
    #------------------------------------
    #     string_clean
    #------------------------------------ 
    function string_clean($string) {
       $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        return $text = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }


}
