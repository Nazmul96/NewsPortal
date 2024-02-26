<?php  defined('BASEPATH') OR exit('No direct script access allowed');

class Page_model extends CI_Model {
  
    function __construct() {
        parent::__construct();
    }

    #-------------------------------
    # explode Title
    #-------------------------------
    function explodedtitle($title) {
        return @trim(@implode('-', @preg_split("/[\s,-\:,()]+/", @$title)), '');
    }
    #-------------------------------
    # string_clean
    #-------------------------------
    function string_clean($string) {
        $string = str_replace(' ', '', $string); 
        return $text = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
    }
    #-------------------------------
    # page_data
    #-------------------------------
    public function page_data($page=NULL,$limit=null,$start=null) { 

        $PN = array();
        $bu = base_url();
        $i = 1;
        
       $newses = $this->db->select('news_position.*,news_mst.*,user_info.id as user_id,user_info.name,user_info.photo,categories.category_name,t5.file_name,t5.file_ext')
        ->from('news_position')
        ->join('news_mst', 'news_mst.news_id=news_position.news_id')
        ->join('user_info', 'user_info.id=news_mst.post_by','left')
        ->join('categories', 'categories.slug=news_mst.page')
        ->join('podcust_tbl t5', 't5.id=news_mst.podcust_id','left')
        ->where('news_position.page', $page)
        ->where('news_position.status',1)
        ->where('news_position.position >',0)
        ->where('news_mst.publish_date <=',date("Y-m-d"))
        ->order_by('news_position.position', 'asc')
        ->order_by('news_position.news_id', 'DESC')
        ->limit($limit,$start)
        ->get()
        ->result_array();

        $dif = $this->db->where('id',118)->get('settings')->row();
        $difimg = json_decode($dif->details);



        foreach ($newses as $data){

            $imgurl = ($data['image_base_url']?$data['image_base_url']:base_url());
            @$splited_TITLE = $this->string_clean($this->explodedtitle($data['title']));
            @$news_dtl = implode(' ', array_slice(explode(' ', $data['news']), 0, 30));

            $strtime = strtotime($data['post_date']);
            $converted_date = convertDate(date('l, d M, Y', $strtime)); 
            $PN['post_date_as_' . $i] = $converted_date;

        
            if($data['podcust_id']>0){

                if($data['file_ext']=='mp4'){

                    $PN['playbtn_' . $i] = '<div class="play-button"><i class="fa fa-play"></i></div>';
                }else{
                    $PN['playbtn_' . $i] = '<div class="play-button"><i class="fa fa-volume-up"></i></div>';
                }
            }elseif($data['videos']!=''){
                $PN['playbtn_' . $i] = '<div class="play-button"><i class="fa fa-play"></i></div>';
            }else{

                $PN['vdo_' . $i] = '';
                $PN['playbtn_' . $i] ='';
            }

            //default image
            $PN['default_img_' . $i] = base_url().@$difimg->img;
            @$PN['image_title_' . $i] =   @$data['image_title'] ;
            @$PN['image_alt_' . $i] =   @$data['image_alt'] ;
            //editor images
            @$PN['post_by_image_' . $i] =  base_url() . ($data['photo']!=''?$data['photo']:'/uploads/user/Man1.png') ;
            // editor name
            @$PN['post_by_name_' . $i] = html_escape($data['name']);
            // editor id
            @$PN['post_by_id_' . $i] = html_escape($data['user_id']);
            @$PN['author_profile_' . $i] = base_url('author/profile/').$data['user_id'];
            // category name
            @$PN['reporter_' . $i]      = html_escape($data['reporter']);
            @$PN['category_' . $i]      = html_escape($data['category_name']);
            // category link
            @$PN['category_link_' . $i] = base_url('category/').$data['page']. '/';
            // video id
            @$PN['video_' . $i]         = $data['videos'];
            //post time
            $PN['ptime_' . $i]          =  $data['time_stamp'];
            //news id
            @$PN['news_id_' . $i]       = $data['news_id'];
            //News Title
            @$PN['news_title_' . $i]    = html_escape(strip_tags($data['title']));
            //Short Title 
            @$PN['stitle_' . $i]        = html_escape(strip_tags($data['stitle']));
            //Spilt Title  
            @$PN['splted_title_' . $i]  = $this->string_clean($splited_TITLE);
            //News Title With Link
            @$PN['title_' . $i]         = '<a href="' . base_url() . $data['page'] . '/' . $data['news_id'] . '/' . $splited_TITLE . '">' . $data['title'] . '</a>';
            //Short News from XML data
            @$PN['news_' . $i]          = strip_tags($news_dtl . '<a href="' . $bu . 'home/' . $data['news_id'] . '/' . $splited_TITLE . '" class="details_link">  </a>', '<p><a>');
            // full news
            @$PN['full_news_' . $i]     = html_escape(strip_tags($data['news'], '<p><a>'));
            //short news
            @$PN['short_news_'.$i]      = character_limiter(strip_tags(htmlspecialchars_decode($data['news']), '<p><a>'),150);
            //Only News Link Creation
            @$PN['news_link_' . $i]     = base_url() . $data['encode_title']. '/';
            //Image name
            @$PN['image_' . $i]         = $data['image'];
            // image chack
            @$PN['image_check_' . $i]   = $data['image'];
            //Thumb Image 
            @$PN['image_thumb_' . $i]   = $imgurl . 'uploads/thumb/' . $data['image'];
            //Large Image Creation
            @$PN['image_large_' . $i]   = $imgurl . 'uploads/' . $data['image'];
            
            $i++;
        }
        return $NEWS_ARR = array('pn' => $PN);
    }

    #-------------------------------
    # count_total_news_by_category
    #-------------------------------

    public function count_total_news_by_category($category_slug) {


        $total_news = $this->db->select('news_position.*,news_mst.*,user_info.id as user_id,user_info.name,user_info.photo')
        ->from('news_position')
        ->join('news_mst', 'news_mst.news_id=news_position.news_id')
        ->join('user_info', 'user_info.id=news_mst.post_by')
        ->where('news_position.page', $category_slug)
        ->where('news_position.status',1)
        ->where('news_position.position >',0)
        ->where('news_mst.publish_date <=',date("Y-m-d"))
        ->order_by('news_position.position', 'asc')
        ->order_by('news_position.news_id', 'DESC')
        ->get()->num_rows();
        return $total_news;

    }


}
