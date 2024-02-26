<?php  defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Model {

    public function __construct() {
        parent::__construct();
    }


    #--------------------------------
    #       get page wise news
    #--------------------------------    
    public function get_news_page_wise($page = NULL, $num = NULL, $offset = NULL, $word_limit = 30) {

       $this->db->select('news_position.*,news_mst.*,user_info.id as user_id,user_info.name,user_info.photo,categories.*,t5.file_name,t5.file_ext')
        ->from('news_position')
        ->join('news_mst', 'news_mst.news_id=news_position.news_id')
        ->join('user_info', 'user_info.id=news_mst.post_by')
        ->join('categories', 'categories.slug=news_mst.page')
        ->join('podcust_tbl t5', 't5.id=news_mst.podcust_id','left')
        ->where('news_mst.publish_date <=',date("Y-m-d"))
        ->where('news_position.page', $page)
        ->where('news_position.status',1)
        ->where('news_position.position >',0)
        ->limit($num, $offset)
        ->order_by('news_position.position', 'asc')
        ->order_by('news_position.news_id', 'DESC');
        $query = $this->db->get();


        $dif = $this->db->where('id',118)->get('settings')->row();
        $difimg = json_decode($dif->details);

        if ($query->num_rows() > 0) {
            
            $i = 1;
            foreach ($query->result() as  $value) {


                $news = $value->news;
                $news = htmlspecialchars($news, ENT_QUOTES);
                $splited_TITLE = $this->explodedtitle($value->title);

                $imgurl = ($value->image_base_url?$value->image_base_url:base_url());

                $strtime = strtotime($value->post_date);
                $converted_date = convertDate(date('l, d M, Y', $strtime)); 
                $pn['post_date_as_' . $i] = $converted_date;


                if($value->podcust_id>0){
                    if($value->file_ext=='mp4'){

                        $pn['playbtn_' . $i] = '<div class="play-button"><i class="fa fa-play"></i></div>';
                    }else{
                        $pn['playbtn_' . $i] = '<div class="play-button"><i class="fa fa-volume-up"></i></div>';
                    }
                }elseif($value->videos!=''){
                    $pn['playbtn_' . $i] = '<div class="play-button"><i class="fa fa-play"></i></div>';
                }else{
                    $pn['vdo_' . $i] = '';
                    $pn['playbtn_' . $i] ='';
                }

               


              
                //default image
                $pn['default_img_' . $i] = base_url().@$difimg->img;

                
                //new id
                $pn['news_id_' . $i]        = $value->news_id;
                $pn['image_title_' . $i]    = $value->image_title;
                $pn['image_alt_' . $i]      = $value->image_alt;
                //news short title
                $pn['stitle_' . $i]         = html_escape(strip_tags($value->stitle));
                //editor images
                $pn['post_by_image_' . $i]  =  base_url() . base_url() . ($value->photo!=''?$value->photo:'/uploads/user/Man1.png') ;
                // editor name
                $pn['post_by_name_' . $i]   = html_escape($value->name);
                $pn['post_by_id_' . $i]     = html_escape($value->user_id);
                $pn['author_profile_' . $i] = base_url('author/profile/').html_escape($value->user_id);
                // category name
                $pn['category_' . $i]       = html_escape($value->category_name);

                $pn['reporter_' . $i]       = html_escape($value->reporter);
                // category link
                $pn['category_link_' . $i]  = base_url('category/').$value->page. '/';
                // news title with link
                $pn['title_' . $i]          = '<a href="' . base_url() . $value->page . '/' . $value->news_id . '/' . $this->string_clean($splited_TITLE) . '" class="text-green" title=' . $value->title . '>' . $value->title . '</a>';
                // only news link
                $pn['news_link_' . $i]      = base_url() .$value->encode_title. '/';
                // full news
                $pn['full_news_' . $i]      = html_entity_decode($news);

                @$pn['short_news_'.$i]      = character_limiter(strip_tags(htmlspecialchars_decode($news), '<p><a>'),150);
                // image view from thumb
                $pn['image_large_' . $i]    = $imgurl . 'uploads/' . $value->image ;
                $pn['image_thumb_' . $i]    =  $imgurl . 'uploads/thumb/' . $value->image ;
                // image view from thumb  with link
                $pn['image_thumb_link_' . $i] = '<a href="' . base_url() . $value->page . '/' . $value->news_id . '/' . $this->string_clean($splited_TITLE) . '"><img src="' . base_url() . 'uploads/thumb/' . $value->image . '" align="left" title="' . $value->title . '" class="img-responsive"' . '" alt="' . $value->title . '"/></a>';
                //image view from upload with link
                $pn['image_large_link_' . $i] = '<a href="' . base_url() . $value->page . '/' . $value->news_id . '/' . $this->string_clean($splited_TITLE) . '"><img src="' . base_url() . 'uploads/' . $value->image . '" align="left" title="' . $value->title . '" class="img-responsive"' . '" alt="' . $value->title . '"/></a>';
                // image view from upload 
                $pn['image_check_' . $i]    = $value->image ;
                //video
                $pn['video_' . $i]          = $value->videos;
                //post date
                $pn['post_date_' . $i]      = $value->time_stamp;
                $pn['ptime_' . $i]          =  $value->time_stamp;
                //news title
                $pn['news_title_' . $i]     = strip_tags(htmlspecialchars_decode($value->title));
                ++$i;
            }

            return $NEWS_ARR = array('pn' => $pn);
        } else {
            return false;
        }
    }



    #-------------------------------------
    public function get_category_name_by_slug($slug=NULL) {
        $this->db->select("category_name");
        $this->db->from("categories");
        $this->db->where("slug", $slug);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            $fetch = $query->row();
            return $fetch->category_name;
        } else {
            return false;
        }
    }

    // explode Title
    function explodedtitle($title) {
        return @trim(@implode('-', @preg_split("/[\s,-\:,()]+/", @$title)), '');
    }

    function string_clean($string) {
        $string = str_replace(' ', '', $string); // Replaces all spaces with hyphens.    
        return $text = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }

}

