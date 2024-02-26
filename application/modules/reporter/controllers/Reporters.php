<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @System  : Reporters controller
 * @author  : BDTASK <bdtask@gmail.com>
 * @link    : http://www.bdtask.com
 */
class Reporters extends MX_Controller {

    public function __construct() {
        parent::__construct();
        if (! $this->session->userdata('isLogIn'))
            redirect('login');

    }

   
    public function index() {

        $this->permission->check_label('repoter_list')->create()->redirect();

        $time_stamp = time();   
        $post_date  = date('Y-m-d', $time_stamp);
        $name       = $this->input->post('r_name',TRUE);
        $page_name  = $this->input->post('page_name',TRUE);
        $news_id    = $this->input->post('news_id',TRUE);
        $formdate   = $this->input->post('formdate',TRUE);
        $todate     = $this->input->post('todate',TRUE);

        if($news_id!=NULL){
            @$where = "news_mst.news_id='" . $news_id . "'";
        }
        elseif(!empty($formdate AND $todate)){
              @$f = date('Y-m-d',strtotime($formdate));
              @$t = date('Y-m-d',strtotime($todate));
              @$where="news_mst.post_date BETWEEN '$f' AND '$t'";  
        }
        elseif($name!=NULL){
            @$where = "news_mst.post_date='" . $post_date . "'";
            @$where .= "AND news_mst.post_by='" . $name . "'";
        }elseif($page_name!=NULL) {
           @$where = "news_mst.post_date='" . $post_date . "'";
           @$where.=" AND news_mst.page='" . $page_name . "'";
        }
        else{
            @$where = " post_date='" . $post_date . "'";
        }

        $query = $this->db->query("SELECT news_mst.*, user_info.name FROM news_mst  JOIN  user_info ON user_info.id = news_mst.post_by WHERE $where  ORDER BY news_mst.id DESC");        
        $data['cat'] = $this->db->select("*")->from('categories')->order_by('position','ASC')->get()->result();
        $data['reporter'] = $this->db->select()->from('user_info')->get()->result();
        $data['pp']= $query->result_array();
        

        $data['title'] = display('registration');
        $data['module'] = "reporter"; 
        $data['page']   = "__reports_news_list"; 
        echo Modules::run('template/layout', $data); 

    }


    public function registration() {
        $this->permission->check_label('repoter_list')->create()->redirect();

        $data['title'] = display('registration');
        $data['module'] = "reporter"; 
        $data['page']   = "__add_new_registration"; 
        echo Modules::run('template/layout', $data); 

    }



    public function create_new_reporter() {

        $this->permission->check_label('repoter_list')->create()->redirect(); 

        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', display('email'),'required|valid_email|is_unique[user_info.email]|max_length[100]');
        $this->form_validation->set_rules('name', display('name'),'trim|required|xss_clean');
        $this->form_validation->set_rules('mobile', display('mobile'),'trim|required|xss_clean');
        $this->form_validation->set_rules('user_type', 'User type','trim|required|xss_clean');
        
        $postData = array(
            'name'          => $this->input->post('name',TRUE),
            'nick_name'      => $this->input->post('nick_name',TRUE),
            'email'         => $this->input->post('email',TRUE),
            'mobile'        => $this->input->post('mobile',TRUE),
            'password'      => md5($this->input->post('password',TRUE)),
            'sex'           => $this->input->post('sex',TRUE),
            'blood'         => $this->input->post('blood',TRUE),
            'birth_date'    => $this->input->post('birth_date',TRUE),
            'address_one'   => $this->input->post('address_one',TRUE),
            'address_two'   => $this->input->post('address_two',TRUE),
            'city'          => $this->input->post('city',TRUE),
            'user_type'     => $this->input->post('user_type',TRUE),
            'state'         => $this->input->post('state',TRUE),
            'country'       => $this->input->post('country',TRUE),
            'zip'           => $this->input->post('zip',TRUE),
            'about'           => $this->input->post('about',TRUE),
            'verification_id_no'    => $this->input->post('verification_id_no',TRUE),
            'verification_type'     => $this->input->post('verification_type',TRUE),
            'status'     => 1,
        );



        if($this->form_validation->run() == FALSE){

            $data['r'] = (object)$postData;
            $data['title'] = display('registration');
            $data['module'] = "reporter"; 
            $data['page']   = "__add_new_registration"; 
            echo Modules::run('template/layout', $data); 


        }else{

            $this->db->insert('user_info', $postData);
            $this->session->set_flashdata('message', display('user_reagistration_message'));
            redirect('reporter/reporters/registration');
        }
      
    }



    public function last_20_access() {
        $this->permission->check_label('last_20_access')->read()->redirect(); 

        $this->db->select("*");
        $this->db->from('ci_sessions');
        $this->db->limit(20);
        $data['last_access'] =  $this->db->get()->result();

        $data['title'] = display('last_20_access');
        $data['module'] = "reporter"; 
        $data['page']   = "__last_access"; 
        echo Modules::run('template/layout', $data); 


        
    }


    public function clearlog() {
        $this->permission->check_label('last_20_access')->delete()->redirect(); 

        $this->db->query("DELETE FROM ci_sessions");
        $this->session->set_flashdata("message", 'Log Cleared Successfully.');
        redirect('reporter/reporters/last_20_access');
    }




    public function repoter_list() {

        $this->permission->check_label('repoter_list')->read()->redirect(); 

        $user_type = $this->session->userdata('user_type'); 

        $data['query'] = $this->db->Select("*")->from('user_info')
            ->where_not_in('user_type',3)
            ->where('user_type',1)
            ->or_where('user_type',2)
            ->or_where('user_type',4)
            ->get()->result_array();

        $data['title'] = display('repoter_list');
        $data['module'] = "reporter"; 
        $data['page']   = "__view_repoter_list"; 
        echo Modules::run('template/layout', $data); 


    }
    

    public function repoter_delete() {
        $this->permission->check_label('repoter_list')->delete()->redirect(); 

        $id = $this->uri->segment(4);
        $this->db->delete('user_info', array('id' => $id));
        $this->session->set_flashdata('message', display('delete_message'));
        redirect("reporter/reporters/repoter_list");

    }


    public function repoter_status_edit() {

        $this->permission->check_label('repoter_list')->update()->redirect(); 

        $id = $this->uri->segment(4);
        $status = ($this->uri->segment(5) == 1) ? 0 : 1;
        $data_arr = array('status' => $status);
        $this->db->where('id', $id);
        $this->db->update('user_info', $data_arr);

        $this->session->set_flashdata('message',display('update_message'));
        redirect("reporter/reporters/repoter_list");

    }



    public function repoter_type_edit() {

        $this->permission->check_label('repoter_list')->update()->redirect(); 

        $id = $this->uri->segment(4);
        $status = ($this->uri->segment(5) == 3) ? 1 : 3;
        $data_arr = array('user_type' => $status);
        $this->db->where('id', $id);
        $this->db->update('user_info', $data_arr);
        redirect("reporter/reporters/repoter_list");
    }

    public function repoter_post_approval_status(){
        $this->permission->check_label('repoter_list')->update()->redirect(); 

        $id = $this->uri->segment(4);
        $status = ($this->uri->segment(5) == 1) ? 0 : 1;
        $data_arr = array('post_ap_status' => $status);
        $this->db->where('id', $id);
        $this->db->update('user_info', $data_arr);
        redirect("reporter/reporters/repoter_list");
    }    


    public function repoter_edit($reporter_id) {
        $this->permission->check_label('repoter_list')->update()->redirect(); 

        $data['user_info'] = $this->db->where('id',$reporter_id)->get('user_info')->row();


        $data['title'] = display('repoter_list');
        $data['module'] = "reporter"; 
        $data['page']   = "__view_repoter_edit"; 
        echo Modules::run('template/layout', $data); 

    }


    public function update_reporter_info() {

        $this->permission->check_label('repoter_list')->update()->redirect(); 

        $id = $this->input->post('id');

        if (isset($id)) {

            $postData = array(
                'name'          => $this->input->post('name',TRUE),
                'nick_name'     => $this->input->post('nick_name',TRUE),
                'email'         => $this->input->post('email',TRUE),
                'mobile'        => $this->input->post('mobile',TRUE),
                'sex'           => $this->input->post('sex',TRUE),
                'blood'         => $this->input->post('blood',TRUE),
                'birth_date'    => $this->input->post('birth_date',TRUE),
                'address_one'   => $this->input->post('address_one',TRUE),
                'address_two'   => $this->input->post('address_two',TRUE),
                'city'          => $this->input->post('city',TRUE),
                'state'         => $this->input->post('state',TRUE),
                'country'       => $this->input->post('country',TRUE),
                'zip'           => $this->input->post('zip',TRUE),
                'about'           => $this->input->post('about',TRUE),
                'verification_id_no'    => $this->input->post('verification_id_no',TRUE),
                'verification_type'     => $this->input->post('verification_type',TRUE),
                'status'     => 1,
            );


            $this->db->where('id', $id);
            $this->db->update('user_info', $postData);

            $this->session->set_flashdata('message', display('update_message'));
        }

        redirect('reporter/reporters/repoter_edit/'.$id);

    }


    public function clear_log(){

        $this->permission->check_label('last_20_access')->delete()->redirect(); 

        $this->db->empty_table('ci_sessions');
        $this->session->set_flashdata('message','Clear  successfully!');
        redirect('login');
    }



}