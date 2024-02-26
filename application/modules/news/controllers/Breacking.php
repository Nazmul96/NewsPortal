<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * @System  : Breaking controller
 * @author  : BDTASK <bdtask@gmail.com>
 * @link    : http://www.bdtask.com
 */
class breacking extends MX_Controller {


    public function __construct() {
        parent::__construct();
        if (! $this->session->userdata('isLogIn'))
            redirect('login');
        $this->load->model('common_model');
   
    }


    #------------------------------------
    #      view breaking news list
    #------------------------------------ 
    public function breaking_news() {

        $this->permission->check_label('breaking_news')->create()->redirect();

        $total_rows = $this->get_breacking_news()->num_rows();;
        
        $limit = 15;
        $config["base_url"] = base_url("news/breacking/breaking_news");
        $config["total_rows"] = $total_rows;
        $config["per_page"] = $limit;
        // integrate bootstrap pagination

        $config["last_link"] = false; 
        $config["first_link"] = false; 
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
        $data['query'] = $this->get_breacking_news($limit,$start)->result_array();

        $data['title'] = display('breaking_news');
        $data['module'] = "news"; 
        $data['page']   = "news/__view_breaking_news"; 
        echo Modules::run('template/layout', $data); 



    }


    public function get_breacking_news($limit=null,$start=null){
        $this->db->select('*');
        $this->db->from('breaking_news');
        if($limit){        
            $this->db->limit($limit,$start);
        }
        $this->db->order_by('id','DESC');
        return $this->db->get();
    }



    #------------------------------------
    #      save breaking news
    #------------------------------------
    public function breaking_save() {
        $this->permission->check_label('breaking_news')->create()->redirect();

        $json_data['news_title'] = $this->input->post('breaking_news',TRUE);
        $json_data['url'] = '';
        $json_encode = json_encode($json_data);
        $time_stamp = time() + (6 * 60 * 60); 
        $data = array(
            'id'        => NULL,
            'title'     => $json_encode,
            'time_stamp' => $time_stamp,
            'status'    => 1
        );
        $this->db->insert('breaking_news', $data);
        $this->session->set_flashdata('message', display('breaking_add_msg'));
        redirect("news/breacking/breaking_news");
    }


    #------------------------------------
    #      Edit Breaking news
    #------------------------------------/
    public function breaking_edit() {

        $this->permission->check_label('breaking_news')->update()->redirect();

        $json_data['news_title'] = $this->input->post('breaking_news',TRUE);

        $json_data['url'] = '';
        $json_encode = json_encode($json_data);
        $time_stamp = time() + (6 * 60 * 60); 
        $id = $this->input->post('id');
        $data_arr = array(
            'title' => $json_encode,
            'time_stamp' => $time_stamp
        );
        $this->db->where('id', $id);
        $this->db->update('breaking_news', $data_arr);
        
        $this->session->set_flashdata('message', display('update_message'));
        redirect("news/breacking/breaking_news");
    }


    #----------------------------------------
    # To update breaking news status
    #----------------------------------------    
    public function breaking_status_edit() {
        $this->permission->check_label('breaking_news')->update()->redirect();

        $id = $this->uri->segment(4);
        $status = ($this->uri->segment(5) == 1) ? 0 : 1;
        $data_arr = array('status' => $status);
        $this->db->where('id', $id);
        $this->db->update('breaking_news', $data_arr);
        redirect("news/breacking/breaking_news");


    }

    #-----------------------------------------
    #      To delete breaking news
    #-----------------------------------------    
    public function breaking_delete() {
        $this->permission->check_label('breaking_news')->delete()->redirect();
        $id = $this->uri->segment(4);
        $this->db->delete('breaking_news', array('id' => $id));
        $this->session->set_flashdata('message', display('delete_message'));
        redirect("news/breacking/breaking_news");
    }


    #----------------------------------------
    #   delete breaking new with selected
    #----------------------------------------    
    public function breaking_delete_selected() {
        $this->permission->check_label('breaking_news')->delete()->redirect();
        
        $id = $this->input->post("news_id",TRUE);
        if (count($id) > 0) {
            for ($i = 0; $i <= count($id); $i++) {
                $this->db->where('id', $id[$i]);
                $this->db->delete('breaking_news');
            }
        }
        redirect("news/breacking/breaking_news");
    }



}