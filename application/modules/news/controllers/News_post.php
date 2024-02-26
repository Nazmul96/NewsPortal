<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * @System  : News post controller
 * @author  : BDTASK <bdtask@gmail.com>
 * @link    : http://www.bdtask.com
 */

class News_post extends  MX_Controller {


    public function __construct() {
        parent::__construct();
        if (! $this->session->userdata('isLogIn'))
            redirect('login');
        $this->permission->module()->redirect();
        $this->load->model(['common_model']);   
    }

    

    function clean($string) {
       $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
       return preg_replace('/[^A-Za-z0-9\-]/', '-', $string); // Removes special chars.
    }



    #----------------------------
    # To add new post
    #----------------------------    
    public function add_post() {

        $this->permission->check_label('add_post')->create()->redirect(); 
    
        $data['cat'] = $this->db->select("*")->from('categories')
        ->order_by('position','ASC')->get()->result(); 

        $data['title'] = display('add_new_post');
        $data['module'] = "news"; 
        $data['page']   = "news/__view_post"; 
        echo Modules::run('template/layout', $data); 

    }


    public function get_youtube_id_from_url($url) 
    {
        if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[\w\-?&!#=,;]+/[\w\-?&!#=/,;]+/|(?:v|e(?:mbed)?)/|[\w\-?&!#=,;]*[?&]v=)|youtu\.be/)([\w-]{11})(?:[^\w-]|\Z)%i', $url, $match)) {
            return $match['1']; 
        }else{
            return $video='';
        }

    }
  

    public function post() {

        $this->permission->check_label('add_post')->create()->redirect(); 



        // on page SEO
        $post_keyword = trim($this->input->post('meta_keyword',TRUE));
        $post_description = trim($this->input->post('meta_description',TRUE));
        if ($post_keyword != '' || $post_keyword != '') {
            $post_meta['meta_keyword'] = $post_keyword;
            $post_meta['meta_description'] = $post_description;
        }


        if (@$_FILES['file_select_machin']['name']) {

            $pst_imge = $_FILES['file_select_machin']['name'];
            $image_chk = explode(".",$pst_imge);
            $extent = end($image_chk);

            if($extent=="jpg" || $extent=="png" || $extent=="jpeg" || $extent=="gif" || $extent=="webp"){
                
                $sizes = array(260 => 200, 552 => 400);
                $file_location = $this->common_model->do_upload($_FILES['file_select_machin'], $sizes);

                if(@$file_location['msg']!=NULL){
                    $this->session->set_flashdata('exception', $file_location['msg']);
                    redirect('news/news_post');
                } else {
                    $image = explode('/', $file_location[0]);
                    $image = end($image);
                }
                
            } else{

                $this->session->set_flashdata('exception','This File Not allowed!');
                redirect('admin/news_post/add_post');
            }
            
        } else {

            $image = $this->input->post('lib_file_selected',TRUE);
        }

        // check user post status
        if($this->session->userdata('user_type')==2){

            $d = $this->db->select('post_ap_status,id')
            ->from('user_info')
            ->where('id',$this->session->userdata('id'))->get()->row(); 

            if($d->post_ap_status !=0){
                $post_ap_status = 1;
            }else{
                $post_ap_status = 0;
            }

        } else{
            $post_ap_status = $this->input->post('status_confirmed',TRUE);
        }//end


        if(!empty($this->input->post('customurl',TRUE))){
            $encode_title = $this->explodedtitle($this->input->post('customurl',TRUE));
        }else{
            $encode_title = $this->explodedtitle($this->input->post('head_line',TRUE));
        }

        $image_alt = $this->input->post('image_alt',TRUE);
        $image_title = $this->input->post('image_title',TRUE);

        $podcust_id = $this->input->post('lib_podcust_selected',TRUE);
        

        $data = array(
            'encode_title'      => $this->clean($encode_title),
            'seo_title'         => $this->input->post('seo_title',TRUE),
            'home_page'         => $this->input->post('home_page',TRUE),
            'other_page'        => $this->input->post('other_page',TRUE),
            'other_position'    => $this->input->post('other_position',TRUE),
            'image'             => @$image,
            'image_base_url'    => imageLink(),
            'image_alt'         => ($image_alt!=''?$image_alt:@$image_chk[0]),
            'image_title'       => ($image_title!=''?$image_title:@$image_chk[0]),
            'picture_name'      => @$image_chk[0],
            'podcust_id'        => @$podcust_id,
            'videos'            => $this->input->post('videos',TRUE),
            'stitle'            => $this->input->post('short_head',TRUE),
            'title'             => $this->input->post('head_line',TRUE),
            'reporter'          => $this->input->post('reporter',TRUE),
            'news'              => $this->input->post('details_news',FALSE),
            'confirm_dynamic_static' => $this->input->post('confirm_dynamic_static',TRUE),
            'latest_confirmed'  => $this->input->post('latest_confirmed',TRUE),
            'breaking_confirmed' => $this->input->post('breaking_confirmed',TRUE),
            'send_to_temp'      => $this->input->post('send_to_temp',TRUE),
            'reference'         => $this->input->post('reference',TRUE),
            'ref_date'          => $this->input->post('ref_date',TRUE),
            'publish_date'      => ($this->input->post('publish_date',TRUE)!=NULL?$this->input->post('publish_date',TRUE):$this->input->post('ref_date',TRUE)),
            'post_by'           => $this->session->userdata('id'),
            'status1'           =>  $post_ap_status
        );


        $result = $this->common_model->pbnews_post($data);

        if (isset($post_meta)) {
            $post_meta['news_id'] = $result['news_id'];
            $this->common_model->save_meta_on_page_seo('post_seo_onpage', $post_meta);
        }


        $posttag = $this->input->post('post_tag',TRUE);
        if(!empty($posttag)){
            $post_tag = explode(',',$posttag);
            foreach ($post_tag as $key => $tags) {
                $t =$this->explodedtitle($tags);
                $tag = array('news_id'=>$result['news_id'],'tag'=>$t);
                $this->db->insert('post_tag_tbl',$tag);
            }
        }


        $section_name = $this->input->post('section_name',TRUE);
        $section_id = $this->input->post('section_id',TRUE);

        if (!empty($section_name)) {
            foreach ($section_name as $key => $c) {
                $post_table_of_content = array('news_id'=>$result['news_id'],'section_name'=>$section_name[$key],'section_id'=>$section_id[$key]);
                $this->db->insert('post_table_of_content',$post_table_of_content);
            }
        }


        // for schema
        $schemapost['type'] = 'Article';
        $schemapost['url'] = '';
        $schemapost['headline'] = $this->input->post('head_line',TRUE);
        $schemapost['image_url'] = '';
        $schemapost['description'] =  implode(' ', array_slice(explode(' ', $this->input->post('details_news')), 0, 60));
        $schemapost['author_type'] = 'person';
        $schemapost['author_name'] = $this->input->post('reporter',TRUE);

        $schemapost['publisher'] = '';
        $schemapost['publisher_logo'] = '';
        $schemapost['publishdate'] = $this->input->post('ref_date',TRUE);
        $schemapost['modifidate'] = $this->input->post('ref_date',TRUE);
        $schemapost['active_status'] = $this->input->post('schemasetup',TRUE);
        $schemapost['news_id'] = $result['news_id'];

        if(!empty($schemapost['active_status'])){
            $this->db->insert('schema_post',$schemapost);
        }

        $this->session->set_flashdata('message', display('news_post_msg'));
        redirect("news/news_post/add_post");
        
    }



    #----------------------------------------------
    #   My window to select  images form library
    #----------------------------------------------
    public function my_window() {
        $this->load->view('news/includes/__library_image_search');
    }


    #----------------------------------------------
    #   My window 
    #----------------------------------------------
    public function my_protcust() {
        $this->load->view('news/includes/__podcust_search');
    }




    function explodedtitle($title) {
        $extitle =  @trim(@implode('-', @preg_split("/[\s,-\:,()]+/", @$title)), '');
        $string = str_replace(' ', '-', trim($title)); 
        return  $string;
    }
    
    function string_clean($string) {
        $string = str_replace(' ', '', $string); 
        return $text = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
    }




}
