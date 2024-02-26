<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * @System  : News list controller
 * @author  : BDTASK <bdtask@gmail.com>
 * @link    : http://www.bdtask.com
 */
class News_list extends  MX_Controller {


    public function __construct() {
        parent::__construct();
        if (! $this->session->userdata('isLogIn'))
            redirect('login');
        $this->load->model('common_model');
    }

    //news list
    public function newses() {

        $this->permission->check_label('news_list')->read()->redirect(); 

        $user_type = $this->session->userdata('user_type'); 

        $time_stamp = time();   
        $post_date = date('Y-m-d', $time_stamp);

        $post_reporter = $this->input->post('r_name',TRUE);
    
        if($user_type==2 || $user_type==4){
            $reporter = $this->session->userdata('id');
        }elseif ($post_reporter!=NULL) {
            $reporter = $this->input->post('r_name',TRUE);
        }else{
            $reporter = '';
        }

        $formdate = $this->input->post('formdate',TRUE);
        $todate = $this->input->post('todate',TRUE);

        if($formdate != NULL AND $todate != NULL){
            @$formdate = date('Y-m-d',strtotime($formdate));
            @$todate = date('Y-m-d',strtotime($todate));
        }

        $search = (object) array(
            'reporter'  => $reporter,
            'news_id'   => $this->input->post('news_id',TRUE),
            'formdate'  => @$formdate,
            'todate'    => @$todate,
            'page_name' => $this->input->post('page_name',TRUE),
            'title' => $this->input->post('title',TRUE)
        );

        // pagination settings
        $total_rows = $this->get_news($search, $limit='',$start='')->num_rows();

        $limit = 15;
        @$start = $this->uri->segment(4);
        $config = $this->get_pasinagion($limit,$total_rows);
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();

        $data['newslists'] = $this->get_news($search,$limit,$start)->result_array();

        $data['cat'] = $this->db->select("*")->from('categories')->order_by('position','ASC')->get()->result();
        $data['reporter'] = $this->db->select('id,name')->where('user_type!=',2)->from('user_info')->get()->result();

        $data['title'] = display('post_list');
        $data['module'] = "news"; 
        $data['page']   = "news/__view_news_list"; 
        echo Modules::run('template/layout', $data); 

    }



    function get_news($search=null,$limit=null,$start=null) {

        $this->db->select('news_mst.*,user_info.name,podcust_tbl.podcust_url,podcust_tbl.file_name,categories.category_name');
        
        $this->db->from('news_mst');
        $this->db->join('user_info','user_info.id=news_mst.post_by');
        $this->db->join('podcust_tbl','podcust_tbl.id=news_mst.podcust_id','left');
        $this->db->join('categories','categories.slug=news_mst.page','full');

        if(!empty($search->news_id)){
            $this->db->where('news_mst.news_id',$search->news_id);
        }

        if(!empty($search->reporter)){
            $this->db->where('news_mst.post_by',$search->reporter);
        }

        if(!empty($search->page_name)){
            $this->db->where('news_mst.page',$search->page_name);
        }        

        if(!empty($search->title)){
            $this->db->where('news_mst.encode_title',$search->title);
        }

        if(!empty($search->formdate) && !empty($search->todate)){
            $this->db->where('news_mst.post_date >= ',$search->formdate);
            $this->db->where('news_mst.post_date <= ',$search->todate);
        }elseif (!empty($search->formdate)) {
            echo "sdfsdf";
            $this->db->where('news_mst.post_date = ',$search->formdate);
        }

        if(!empty($limit)){

        $this->db->limit($limit,$start);
        }

        $this->db->order_by('news_mst.id','DESC');
        $result = $this->db->get(); 

        return $result;

    }



    function get_pasinagion($limit,$total_rows){

        $config = array();

        $config["base_url"] = base_url("news/news_list/newses");
        $config["total_rows"] = $total_rows;
        $config["per_page"] = $limit;
        $config['next_link'] = '→';
        $config['prev_link'] = '←'; 
        $config['full_tag_open'] = "<ul class='pagination justify-content-center'>";
        $config['full_tag_close'] = "</ul>"; 
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tagl_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tagl_close'] = '</li>';
        $config['first_tag_open'] = "<li class='page-item disabled'>";
        $config['first_tagl_close'] = "</a></li>";
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tagl_close'] = '</a></li>';
        $config['attributes'] = array('class' => 'page-link');
        
        return $config;
        
    }



    public function singal() {

        $this->permission->check_label('news_list')->delete()->redirect(); 
        
        $user_type = $this->session->userdata('user_type');
        $header = $this->common_model->meta_key();
        $news_id = $this->uri->segment(4);

        $result = $this->common_model->pb_delete($news_id);
        $this->db->where('news_id',$news_id)->delete('post_table_of_content'); 
        $this->db->where('news_id',$news_id)->delete('schema_post'); 
        
        $this->session->set_flashdata('message',display('delete_message'));
        redirect('news/news_list/newses');
        
    }
    
    

}
