<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * @System  : Subscriber manage controller
 * @author  : BDTASK <bdtask@gmail.com>
 * @link    : http://www.bdtask.com
 */
class Subscriber_manage extends MX_Controller {
  

    public function __construct() {
        parent::__construct();
        if (! $this->session->userdata('isLogIn'))
            redirect('login');
    }


    public function index(){

        $this->permission->check_label('subscribers')->read()->redirect();

        $total_rows = $this->db->select('*')->from('subscription')->get()->num_rows();
        $limit = 15;
        $config["base_url"] = base_url("newsletter/subscriber_manage/index");
        $config["total_rows"] = $total_rows;
        $config["per_page"] = $limit;
        $config['full_tag_open'] = "<ul class='pagination col-xs pull-right'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        $config['attributes'] = array('class' => 'page-link');
        
        $this->pagination->initialize($config);

        $data["links"] = $this->pagination->create_links();
        $start = $this->uri->segment(4);

        $data['subscription'] = $this->db->select('*')
        ->from('subscription')
        ->limit($limit,$start)
        ->order_by('subs_id','DESC')
        ->get()
        ->result();


        $data['title'] = display('registration');
        $data['module'] = "newsletter"; 
        $data['page']   = "__subscriber_list"; 
        echo Modules::run('template/layout', $data); 

    }

    public function delete($id){
        $this->permission->check_label('subscribers')->delete()->redirect();

        $this->db->where('subs_id',$id)->delete('subscription');
        $this->session->set_flashdata('message',display('delete_message'));
        redirect('newsletter/subscriber_manage/index');
    }

}

?>