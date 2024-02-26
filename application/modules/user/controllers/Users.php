<?php defined('BASEPATH') or exit('No direct script access allowed');

class Users extends MX_Controller {

   
    public function __construct() {

        parent::__construct();
        if (! $this->session->userdata('isLogIn'))
        redirect('login');

    }

   
    public function user_list() {

        $this->permission->check_label('user_list')->read()->redirect();

        $user_type = $this->session->userdata('user_type'); 
            $data['query'] = $this->db->Select("*")
            ->from('user_info')
            ->where('user_type',5)
            ->where('status',1)
            ->get()
            ->result_array();

        $data['title'] = display('user');
        $data['module'] = "user"; 
        $data['page']   = "__general_user_list"; 
        echo Modules::run('template/layout', $data); 




    }

    # user delete 
    #-----------------------------------
    public function delete_user($id) {
        $this->permission->check_label('user_list')->delete()->redirect();
        
        $this->db->where('id',$id)->delete('user_info');
        $this->session->set_flashdata('message','Delete Successfully');
        redirect("user/users/user_list");
    }




}
