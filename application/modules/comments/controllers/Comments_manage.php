<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @System  : Comments manage Controller
 * @author  : BDTASK <bdtask@gmail.com>
 * @link    : http://www.bdtask.com
 */
class Comments_manage extends MX_Controller {

    public function __construct() {
        parent::__construct();
        if (! $this->session->userdata('isLogIn'))
            redirect('login');


    }


    #------------------------------------
    #   Comment list
    #------------------------------------ 
    public function index() {

        $this->permission->check_label('comment')->read()->redirect();

        $total_rows = $this->db->select('*')->from('comments_info')->get()->num_rows();
        $limit = 15;
        $config["base_url"] = base_url("comments/comments_manage/index");
        $config["total_rows"] = $total_rows;
        $config["per_page"] = $limit;
        // integrate bootstrap pagination
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
        $this->pagination->initialize($config);

        $data["links"] = $this->pagination->create_links();
        
        $start = $this->uri->segment(4);
        $data['comments'] = $this->db->select('comments_info.*,user_info.name,user_info.photo,user_info.email')
        ->from('comments_info')
        ->join('user_info','user_info.id=comments_info.com_user_id')
        ->limit($limit,$start)
        ->order_by('comments_info.com_id','DESC')
        ->get()->result();

        $data['title'] = display('comments_list');
        $data['module'] = "comments"; 
        $data['page']   = "comment_list"; 
        echo Modules::run('template/layout', $data); 

 
    }

    public function get_com_by_id($id){
        $data = $this->db->select('*')->from('comments_info') ->where('com_id',$id)->get()->row();
        echo json_encode($data);
    }

    public function delete_comments($com_id=NULL){
        $this->permission->check_label('comment')->delete()->redirect();
        $this->db->where('com_id',$com_id)->delete('comments_info');
        $this->session->set_flashdata('message',display('delete_message'));
        redirect('comments/comments_manage/index');
    }

    public function varifid($com_id=NULL){
         $this->permission->check_label('comment')->update()->redirect();

        $this->db->set('com_status',1)->where('com_id',$com_id)->update('comments_info');
        $this->session->set_flashdata('message',display('update_message'));
        redirect('comments/comments_manage/index');
    }
    
    public function un_varifid($com_id=NULL){
        $this->permission->check_label('comment')->update()->redirect();
        $this->db->set('com_status',0)->where('com_id',$com_id)->update('comments_info');
        $this->session->set_flashdata('message',display('update_message'));
        redirect('comments/comments_manage/index');
    }




}