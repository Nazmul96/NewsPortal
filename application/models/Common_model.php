<?php  defined('BASEPATH') OR exit('No direct script access allowed');

class Common_model extends CI_Model {

    //Send email via SMTP server in CodeIgniter
    public function send($post=array()){

        $em = $this->db->select('*')
        ->from('email_config')
        ->where('id',1)
        ->where('status',1)
        ->get()
        ->row();
        

        if($em){

            //Load email library
            $this->load->library('email');
            //SMTP & mail configuration
            $config = array(
                'protocol'  =>  $em->smtp_protocol,
                'smtp_host' =>  $em->smtp_host,
                'smtp_port' =>  $em->smtp_port,
                'smtp_user' =>  $em->smtp_username,
                'smtp_pass' =>  $em->smtp_password,
                'mailtype'  => 'html',
                'charset'   => 'utf-8'
            );

            $this->email->initialize($config);
            $this->email->set_mailtype("html");
            $this->email->set_newline("\r\n");
            //Email content
            $htmlContent = $post['message'];
            $this->email->to($post['to']);
            $this->email->from('workbd60@gmail.com','News365.com');
            $this->email->subject($post['subject']);
            $this->email->message($htmlContent);
            
            //Send email
            if($this->email->send()){
                return 1;
            } else{
                return 0;
            }

        }else{
            return 0;
        }

    }



    #------------------------------------
    #     Getting breaking news
    #------------------------------------    
    public function breaking_news() {

        $BN = array();
        $bu = base_url();
        $this->db->select('title');
        $this->db->from('breaking_news');
        $this->db->where('status', 1);
        $this->db->order_by('id', 'desc');
        $this->db->limit(5);
        $result = $this->db->get()->result();
        
        $i = 1;
        foreach ($result as $key => $data){
            @$json_data = json_decode($data->title);
            $title = $json_data->news_title;
            $url = $json_data->url;
            if ($url != '') {
                $title = '<a href="' . $url . '">' . $title . '</a>';
            }
            $BN['title_' . $i] = $title;
            $i++;
       }
        return $BN;
    }


    public function breakingnews(){
        $BN = array();
        $bu = base_url();
        $this->db->select('title');
        $this->db->from('breaking_news');
        $this->db->where('status', 1);
        $this->db->order_by('id', 'desc');
        $this->db->limit(5);
        $result = $this->db->get()->result();
        
        $i = 1;
        foreach ($result as $key => $data){
            @$json_data = json_decode($data->title);
            $title = $json_data->news_title;
            $url = $json_data->url;
            if ($url != '') {
                $title = '<a href="' . $url . '">' . $title . '</a>';
            }
            $BN['title_' . $i] = $title;
            $i++;
       }
        return $BN;
        
    }



    #------------------------------------
    #     getting latest news
    #------------------------------------ 
    function latest_news() {

        $dif = $this->db->where('id',118)->get('settings')->row();
        $difimg = json_decode($dif->details);

        $todate = date('Y-m-d');
        $bu = base_url();
        $LN = array();
        $this->db->select('
            news_mst.news_id,news_mst.encode_title,news_mst.title,news_mst.image,
            news_mst.videos,news_mst.page,news_mst.time_stamp,
            news_mst.post_date,news_mst.news,news_mst.post_by,
            news_mst.image_title,news_mst.image_alt,news_mst.image_base_url,news_mst.podcust_id,
            user_info.id,user_info.photo,user_info.name,user_info.id as user_id,categories.category_name,
            t5.file_name,t5.file_ext
            ');
        $this->db->from('news_mst');
        $this->db->join('user_info', 'user_info.id=news_mst.post_by');
        $this->db->join('categories', 'categories.slug=news_mst.page');
        $this->db->join('podcust_tbl t5', 't5.id=news_mst.podcust_id','left');
        $this->db->where('news_mst.publish_date <=',date("Y-m-d"));
        $this->db->where('news_mst.is_latest', 1);
        $this->db->where('news_mst.status', 0);
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
            @$image_base_url = $data->image_base_url;
            $imgurl = ($data->image_base_url?$data->image_base_url:base_url());
            

            $strtime = strtotime($data->post_date);
            $converted_date = convertDate(date('l, d M, Y', $strtime)); 
            $LN['post_date_as_' . $i] = $converted_date;


            if($data->podcust_id>0){
                if($data->file_ext=='mp4'){
                    $LN['playbtn_' . $i] = '<div class="play-button"><i class="fa fa-play"></i></div>';
                }else{
                    $LN['playbtn_' . $i] = '<div class="play-button"><i class="fa fa-volume-up"></i></div>';
                }
            }elseif($data->videos!=''){
                $LN['playbtn_' . $i] = '<div class="play-button"><i class="fa fa-play"></i></div>';
            }else{
                $LN['vdo_' . $i] = '';
                $LN['playbtn_' . $i] ='';
            }



            //default image
            $LN['default_img_' . $i] = base_url().@$difimg->img;

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

            // category link         
            $LN['category_link_' . $i]       = base_url('category/').$page. '/';

            // editor image      
            $LN['post_by_image_' . $i]       =  base_url() . $post_by_img ;
            // editor name
            $LN['post_by_name_' . $i]       = html_escape(strip_tags(@$post_by));
            //news link
            $LN['news_link_' . $i]          = $bu . @$encode_title. '/';
            //Image 
            $LN['image_alt_' . $i]        = $data->image_alt;
            $LN['image_title_' . $i]        = $data->image_title;

            $LN['image_check_' . $i]        = $image;
            // image thumb
            $LN['image_thumb_' . $i]        = $imgurl . 'uploads/thumb/' . $image;
            //Large Image 
            $LN['image_large_' . $i]        = $imgurl . 'uploads/' . $image;
            $i++;
        }
        return $LN;
    }


    
    #------------------------------------
    #     getting most read newspaper
    #------------------------------------
    function most_read_dbse() {
        $MR = array();
        $bu = base_url();
        $i = 1;

        $this->db->select('t1.news_id,t1.encode_title,t1.stitle,t1.title,
            t1.page,t1.image,t1.videos,t1.reader_hit,t1.time_stamp,
            t1.image_title,t1.image_alt,
            t1.post_date,t1.news,t1.image_base_url,t1.podcust_id,
            t2.id,t2.name,t2.photo,t4.category_name,
            t5.file_name,t5.file_ext
            ');
        $this->db->from('news_mst t1');
        $this->db->join('user_info t2', 't2.id=t1.post_by');
        $this->db->join('categories t4', 't4.slug=t1.page');
        $this->db->join('podcust_tbl t5', 't5.id=t1.podcust_id','left');
        $this->db->order_by('t1.reader_hit', 'desc');
        $this->db->limit(20);
        $result = $this->db->get()->result_array();

        $dif = $this->db->where('id',118)->get('settings')->row();
        $difimg = json_decode($dif->details);

        foreach ($result as $key => $rows) {

            $imgurl = ($rows['image_base_url']?$rows['image_base_url']:base_url());


            $splited_TITLE = $this->string_clean($this->explodedtitle($rows['title']));   

            $strtime = strtotime($rows['post_date']);
            $converted_date = convertDate(date('l, d M, Y', $strtime)); 
            $MR['post_date_as_' . $i] = $converted_date;

            if($rows['podcust_id']>0){
                if($rows['file_ext']=='mp4'){
                    $MR['playbtn_' . $i] = '<div class="play-button"><i class="fa fa-play"></i></div>';
                }else{
                    $MR['playbtn_' . $i] = '<div class="play-button"><i class="fa fa-volume-up"></i></div>';
                }
            }elseif($rows['videos']!=''){
                $MR['playbtn_' . $i] = '<div class="play-button"><i class="fa fa-play"></i></div>';
            }else{
                $MR['vdo_' . $i] = '';
                $MR['playbtn_' . $i] ='';
            }



            if($rows['podcust_id']>0 || $rows['videos']!=''){
                $MR['vdo_' . $i] = 1;
                $MR['playbtn_' . $i] = '<div class="play-button"><i class="fa fa-play"></i></div>';
            }else{
                $MR['vdo_' . $i] = '';
                $MR['playbtn_' . $i] = '';
            }
            //default image
            $MR['default_img_' . $i] = base_url().@$difimg->img;
            // news title
            $MR['news_title_' . $i]         = html_escape(strip_tags($rows['title']));
            // image name
            $MR['image_check_' . $i]        =  $rows['image'];
            // image view form thumb
            $MR['image_thumb_' . $i]        =   $imgurl . 'uploads/thumb/' . $rows['image'];
            // image view form upload
            $MR['image_large_' . $i]        =   $imgurl . 'uploads/' . $rows['image'];
            // video id
            $MR['video_' . $i]              = html_escape(strip_tags($rows['videos']));
            // post time
            $MR['ptime_' . $i]              = date('l, d M, Y', $rows['time_stamp']);
            // category link
            $MR['category_link_' . $i]      = base_url('category/').$rows['page']. '/';
            // category name
            $MR['category_' . $i]           = html_escape(strip_tags($rows['category_name']));
            $MR['category_name_' . $i]      = html_escape(strip_tags($rows['category_name']));
            // read hit
            $MR['reader_hit_' . $i]         = $rows['reader_hit'];
            // full news
            $MR['full_news_' . $i]          = html_escape(strip_tags($rows['news'], '<p><a>'));
            // post date
            $MR['post_date_' . $i]          = $rows['post_date'];
            // editor name
            $MR['post_by_name_' . $i]       = html_escape(strip_tags($rows['name']));
            // editor image
            $MR['post_by_image_' . $i]      =  base_url() . $rows['photo'];
            // editor id
            $MR['post_by_id_' . $i]         =   $rows['id'];
            $MR['author_profile_' . $i]     = base_url('author/profile/').$rows['id'];
            //News Link Creation
            $MR['news_link_' . $i]          = base_url() . $rows['encode_title']. '/';
            //image alter
            $MR['image_alt_' . $i]          = $rows['image_alt'];
            //image title
            $MR['image_title_' . $i]        = $rows['image_title'];
           
            $i++;
        }
        return $MR;
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

    
    #------------------------------------
    #     pulling
    #------------------------------------ 
    function pulling() {

        @$PULL = array();
        $result = $this->db->select('*')
                ->from('pulling')
                ->where('status',1)
                ->order_by('time_stamp', 'DESC')
                ->limit(1)
                ->get()
                ->row();
        if($result){

            $total = @$result->yes + @$result->no + @$result->on_comment;

            if($total>0){
                $yes = (@$result->yes/@$total)*100;
                $no = (@$result->no/@$total)*100;
                $on_comment = ($result->on_comment/@$total)*100;
            }else{
                $yes = 0;
                $no = 0;
                $on_comment = 0;
            }

            $PULL['question'] = $result->question;
            $PULL['id'] = $result->id;
            $PULL['total'] = $total;
            $PULL['yes'] = round($yes,2);
            $PULL['no'] = round($no,2);
            $PULL['on_comment'] = round($on_comment,2);

        }

        return $PULL;          
    }

}
