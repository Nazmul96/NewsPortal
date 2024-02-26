<?php  defined('BASEPATH') OR exit('No direct script access allowed');

class Archive_Model extends CI_Model {


    public function __construct() {
        parent::__construct();
    }



    public function get_ar_data($keyword, $slug) {

        $query1 = $this->db->select("news_mst.*,user_info.id,user_info.name,user_info.photo,categories.*")
        ->distinct()
        ->from("news_mst")
        ->join('user_info', 'user_info.id=news_mst.post_by')
        ->join('categories', 'categories.slug=news_mst.page')
        ->like('post_date',$keyword) 
        ->where('page',$slug) 
        ->get()->result();


        $query2 = $this->db->select("news_archive.*,user_info.id,user_info.name,user_info.photo,categories.*")
        ->distinct()
        ->from("news_archive")
        ->join('user_info', 'user_info.id=news_archive.post_by')
        ->join('categories', 'categories.slug=news_archive.page')
        ->like("post_date", $keyword)
        ->where('page',$slug)
        ->get()
        ->result();

        $query = array_merge($query1, $query2);

        if ($query) {
            return $query;
        } else {
            return false;
        }
    }




    public function get_news_by_archive_date($keyword, $limit=NULL,$start=NULL) {

        $query1 = $this->db->select("news_mst.*,user_info.id,user_info.name,user_info.photo,categories.*,t5.file_name,t5.file_ext")
        ->distinct()
        ->from("news_mst")
        ->join('user_info', 'user_info.id=news_mst.post_by')
        ->join('categories', 'categories.slug=news_mst.page')
        ->join('podcust_tbl t5', 't5.id=news_mst.podcust_id','left')
        ->like('post_date',$keyword) 
        ->limit($limit,$start)
        ->get()->result();


        $query2 = $this->db->select("news_archive.*,user_info.id,user_info.name,user_info.photo,categories.*,t5.file_name,t5.file_ext")
        ->distinct()
        ->from("news_archive")
        ->join('user_info', 'user_info.id=news_archive.post_by')
        ->join('categories', 'categories.slug=news_archive.page')
        ->join('podcust_tbl t5', 't5.id=news_archive.podcust_id','left')
        ->or_like("post_date", $keyword)
        ->get()
        ->result();

       $query = array_merge($query1, $query2);

            $pn = array();

            $i = 1;
            foreach ($query as  $value) {

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
                
                //new id
                $pn['news_id_' . $i]        = $value->news_id;
                $pn['image_title_' . $i]        = $value->image_title;
                $pn['image_alt_' . $i]        = $value->image_alt;
                //news short title
                $pn['stitle_' . $i]         = html_escape(strip_tags($value->stitle));
                //editor images
                $pn['post_by_image_' . $i]  =  base_url() . ($value->photo!=''?$value->photo:'/uploads/user/Man1.png') ;
                // editor name
                $pn['post_by_name_' . $i]   = html_escape($value->name);
                // category name
                $pn['category_' . $i]      = html_escape($value->category_name);
                //reporter
                $pn['reporter_' . $i]       = html_escape($value->reporter);
                // category link
                $pn['category_link_' . $i]  = base_url('category/').$value->page. '/';
                // news title with link
                $pn['title_' . $i]          = '<a href="' . base_url() . $value->page . '/' . $value->news_id . '/' . $this->string_clean($splited_TITLE) . '" class="text-green" title=' . $value->title . '>' . $value->title . '</a>';
                // only news link
                $pn['news_link_' . $i]      = base_url() .$value->encode_title . '/';
                // full news
                $pn['full_news_' . $i]      = html_entity_decode($news);

                @$pn['short_news_'.$i]      = character_limiter(strip_tags(htmlspecialchars_decode($news), '<p><a>'),150);

                $pn['image_large_' . $i]    = $imgurl . 'uploads/' . $value->image ;
                // image view from thumb
                $pn['image_thumb_' . $i]    =  $imgurl . 'uploads/thumb/' . $value->image ;
                // image view from thumb  with link
                $pn['image_thumb_link_' . $i] = '<a href="' . base_url() . $value->page . '/' . $value->news_id . '/' . $this->string_clean($splited_TITLE) . '"><img src="' . @$value->image_base_url . 'uploads/thumb/' . $value->image . '" align="left" title="' . $value->title . '" class="img-responsive"' . '" alt="' . $value->title . '"/></a>';
                //image view from upload with link
                $pn['image_large_link_' . $i] = '<a href="' . base_url() . $value->page . '/' . $value->news_id . '/' . $this->string_clean($splited_TITLE) . '"><img src="' . @$value->image_base_url . 'uploads/' . $value->image . '" align="left" title="' . $value->title . '" class="img-responsive"' . '" alt="' . $value->title . '"/></a>';
                // image view from upload 
                //image check
                $pn['image_check_' . $i]    = $value->image ;
                //video
                $pn['video_' . $i]          = $value->videos;
                //post date
                $pn['post_date_' . $i]      = $value->time_stamp;
                //time_stamp
                $pn['ptime_' . $i]          =  $value->time_stamp;
                //news title
                $pn['news_title_' . $i]     = strip_tags(htmlspecialchars_decode($value->title));
                ++$i;
            }

            return array('sn' =>$pn);

    }



    // explode Title
    function explodedtitle($title) {
        return @trim(@implode('-', @preg_split("/[\s,-\:,()]+/", @$title)), '');
    }

    function string_clean($string) {
        $string = str_replace(' ', '', $string); // Replaces all spaces with hyphens.    
        return $text = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }

    /*******************************
      count total row by date
    ******************************/
    public function count_total_news($archive_date){

        $query1 = $this->db->select("news_mst.*,user_info.id,user_info.name,user_info.photo")
        ->distinct()
        ->from("news_mst")
        ->join('user_info', 'user_info.id=news_mst.post_by')
        ->where_in("post_date", $archive_date)
        ->get()->num_rows();
        
        $query2 = $this->db->select("news_archive.*,user_info.id,user_info.name,user_info.photo")
       ->distinct()
       ->from("news_archive")
       ->join('user_info', 'user_info.id=news_archive.post_by')
       ->where_in("post_date", $archive_date)
       ->get()->num_rows();
       $total_news = $query1 + $query2;
       return $total_news;
       
    }


    
    public function get_pages_archive_date($keyword){
        
        $query1 = $this->db->select("news_mst.page,news_mst.post_date,categories.*")
        ->distinct()
        ->from("news_mst")
        ->join('categories', 'categories.slug=news_mst.page')
        ->like('post_date',$keyword)
        ->get()
        ->result();

        $query2 = $this->db->select("news_archive.page,news_archive.post_date,categories.*")
        ->distinct()
        ->from("news_archive")
        ->join('categories', 'categories.slug=news_archive.page')
        ->like("post_date", $keyword)
        ->get()
        ->result();

        $query = array_merge($query1, $query2);

        $pg = array();
        $i = 1;
        foreach ($query as  $value) {
            $pg['category_' . $i]      = html_escape($value->category_name);
            $pg['slug_' . $i]      = html_escape($value->slug);
            ++$i;
        }

        return $pg;

    }

}
