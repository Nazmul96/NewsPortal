<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * @System  : News edit controller
 * @author  : BDTASK <bdtask@gmail.com>
 * @link    : http://www.bdtask.com
 */
class News_edit extends  MX_Controller {


    public function __construct() {
        parent::__construct();
        if (! $this->session->userdata('isLogIn'))
            redirect('login');


        $this->load->model('common_model');
        $this->load->model("category_model");
    }


    public function index($news_id=NULL) {

        $this->permission->check_label('news_list')->update()->redirect();


        $data['row'] = $this->db->select("news_mst.*,user_info.id,user_info.name,podcust_tbl.podcust_url,podcust_tbl.file_name")
        ->from('news_mst')
        ->join('user_info','user_info.id=news_mst.post_by')
        ->join('podcust_tbl','podcust_tbl.id=news_mst.podcust_id','left')
        ->where('news_mst.news_id',$news_id)
        ->get()->row_array();

        $post_tag = $this->db->select('tag')->where('news_id',$news_id)->get('post_tag_tbl')->result();

        $tags = '';
        
        foreach ($post_tag as $key => $value) {
            $tags.=$value->tag.',';
        }

        $data['tag'] = @$tags;
        $data['seo_info'] = $this->db->select('*')->from('post_seo_onpage')->where('news_id',$news_id)->get()->row_array();
        $data['categories'] = $this->category_model->all_categories();
        $data['settings'] = $this->db->get('app_settings')->row();

        $data['cschema'] = $this->db->where('news_id',$news_id)->get('custom_schema')->result();
        $data['schema'] = $this->db->where('news_id',$news_id)->get('schema_post')->row();
        $data['post_table_of_content'] = $this->db->where('news_id',$news_id)->get('post_table_of_content')->result();

        $data['title'] = display('news_edit');
        $data['module'] = "news"; 
        $data['page']   = "news/__view_edit"; 
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



    #--------------------------------------------
    # To update news according to News ID
    #--------------------------------------------
    public function update() {

         $this->permission->check_label('news_list')->update()->redirect();


        if ((trim($this->input->post('meta_keyword',TRUE))) != '' || (trim($this->input->post('meta_description',TRUE))) != '') {
            $post_meta['meta_keyword'] = trim($this->input->post('meta_keyword',TRUE));
            $post_meta['meta_description'] = trim($this->input->post('meta_description',TRUE));
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
                    $id = $this->input->post('news_id');
                    redirect('news/news_edit/index/'.$id);
                } else {
                    $image = explode('/', $file_location[0]);
                    $image = end($image);
                }

            } else{
                $this->session->set_flashdata('exception','This File Not allowed!');
                $id = $this->input->post('news_id',TRUE);
                redirect('news/news_edit/index/'.$id);
            }
            
        } else if ($this->input->post('lib_file_selected',TRUE) != '') {
            $image = $this->input->post('lib_file_selected',TRUE);
        } else {
            $image = $this->input->post('image_old',TRUE);
        }

        if(!empty($this->input->post('customurl',TRUE))){
            $encode_title = $this->explodedtitle($this->input->post('customurl',TRUE));
        }else{
            $encode_title = $this->explodedtitle($this->input->post('head_line',TRUE));
        }

        $image_alt = $this->input->post('image_alt',TRUE);
        $image_title = $this->input->post('image_title',TRUE);

        $podcust_id = $this->input->post('lib_podcust_selected',TRUE);

        
        // news data
        $data = array(
            'encode_title'      => $encode_title,
            'seo_title'         => $this->input->post('seo_title',TRUE),
            'news_id'           => $this->input->post('news_id',TRUE),
            'home_page'         => $this->input->post('home_page',TRUE),
            'other_page'        => $this->input->post('other_page',TRUE),
            'other_position'    => $this->input->post('other_position',TRUE),
            'picture_name'      => @$image_chk[0],
            'image'             => $image,
            'image_base_url'    => imageLink(),
            'image_alt'         => ($image_alt!=''?$image_alt:@$image_chk[0]),
            'image_title'       => ($image_title!=''?$image_title:@$image_chk[0]),
            'videos'            => $this->input->post('videos',TRUE),
            'podcust_id'        => $podcust_id,
            'stitle'            => $this->input->post('short_head',TRUE),
            'title'             => $this->input->post('head_line',TRUE),
            'reporter'          => $this->input->post('reporter',TRUE),
            'news'              => $this->input->post('details_news',FALSE),
            'reference'         => $this->input->post('reference',TRUE),
            'ref_date'          => $this->input->post('ref_date',TRUE),
            'post_date'         => $this->input->post('ref_date',TRUE),
            'publish_date'      => ($this->input->post('publish_date',TRUE)?$this->input->post('publish_date',TRUE):$this->input->post('ref_date',TRUE)),
            'pp'                => $this->input->post('post_by',TRUE),
            'update_boy'        => $this->session->userdata('id')
            
        );


        $update_position = $this->common_model->update_category($data);
        
        $result = $this->common_model->update_news($data);

        $news_id = $this->input->post('news_id',TRUE);
        
        // update meta information
        if (isset($post_meta)) {
           
            //check meta data exist
            $check_status = $this->common_model->check_meta_exist($news_id);
            if ($check_status) {
                $this->common_model->update_meta_on_page_seo('post_seo_onpage', $post_meta, $news_id);
            } else {
                $post_meta['news_id'] = $news_id;
                $this->common_model->save_meta_on_page_seo('post_seo_onpage', $post_meta);
            }
        }

        $posttag = $this->input->post('post_tag',TRUE);

        if(!empty($posttag)){

            $this->db->where('news_id',$news_id)->delete('post_tag_tbl');
            $post_tag = explode(',',$posttag);
            foreach ($post_tag as $key => $tags) {
                $t =$this->explodedtitle($tags);
                $tag = array('news_id'=>$news_id,'tag'=>$t);
                $this->db->insert('post_tag_tbl',$tag);
            }
            
        }


        $section_name = $this->input->post('section_name',TRUE);
        $section_id = $this->input->post('section_id',TRUE);

        $this->db->where('news_id',$news_id)->delete('post_table_of_content');
        if (!empty($section_name)) {
            foreach ($section_name as $key => $c) {
                $post_table_of_content = array('news_id'=>$news_id,'section_name'=>$section_name[$key],'section_id'=>$section_id[$key]);
                $this->db->insert('post_table_of_content',$post_table_of_content);
            }
        }



        //custom schema
        $schema = $this->input->post('custom_schema',FALSE);
        $news_id = $news_id;
        $this->db->where('news_id',$news_id)->delete('custom_schema');
        if (!empty($schema)) {
            foreach ($schema as $key => $cs) {
                $cschema = array('news_id'=>$news_id,'schema'=>$schema[$key]);
                $this->db->insert('custom_schema',$cschema);
            }

        }

        // for schema
        $schemapost['type'] = $this->input->post('type',TRUE);
        $schemapost['url'] = $this->input->post('url',TRUE);
        $schemapost['headline'] = $this->input->post('headline',TRUE);
        $schemapost['image_url'] = $this->input->post('image_url',TRUE);
        $schemapost['description'] = $this->input->post('description',TRUE);
        $schemapost['author_type'] = $this->input->post('author_type',TRUE);
        $schemapost['author_name'] = $this->input->post('author_name',TRUE);
        $schemapost['publisher'] = $this->input->post('spublisher',TRUE);
        $schemapost['publisher_logo'] = $this->input->post('spublisher_logo',TRUE);
        $schemapost['publishdate'] = $this->input->post('spublishdate',TRUE);
        $schemapost['modifidate'] = $this->input->post('smodifidate',TRUE);
        $schemapost['active_status'] = $this->input->post('sactive_status',TRUE);
        $schemapost['news_id'] = $news_id;

        $this->db->where('news_id',$news_id)->delete('schema_post');
        $this->db->insert('schema_post',$schemapost);

        $this->session->set_flashdata('message', display('update_message'));
        redirect("news/news_list/newses");
    }


    //set publesh news
    public function publishd($news_id) {

         $this->permission->check_label('news_list')->update()->redirect();

        $this->db->set('status', 0);
        $this->db->where('news_id', $news_id);
        $this->db->update('news_mst');


        $this->db->set('status', 1);
        $this->db->where('news_id', $news_id);
        $this->db->update('news_position');
        
        if ($this->session->userdata['user_type'] == 1) {
            redirect("news/news_list/user_interface");
        } else {
            redirect("news/news_list/newses");
        }
    }


    //set unpublesh news
    public function unpublishd($news_id) {

        $this->permission->check_label('news_list')->update()->redirect();


        $this->db->set('status', 1);
        $this->db->where('news_id', $news_id);
        $this->db->update('news_mst');
        $this->db->set('status', 0);
        $this->db->where('news_id', $news_id);
        $this->db->update('news_position');

        if ($this->session->userdata['user_type'] == 1) {
            redirect("news/news_list/user_interface");
        } else {
            redirect("news/news_list/newses");
        }
    }



    function explodedtitle($title) {
        $extitle =  @trim(@implode('-', @preg_split("/[\s,-\:,()]+/", @$title)), '');
        $string = str_replace(' ', '-', trim($title)); 
        return  $string;
    }
    
    function string_clean($string) {
        $string = str_replace(' ', '-', $string); 
        return $text = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
    }



}

