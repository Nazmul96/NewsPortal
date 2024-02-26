<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Podcust_controller extends MX_Controller {
    
    public $spaceobj;
    public $CI;

    public function __construct() {
        parent::__construct();
        if (! $this->session->userdata('isLogIn'))
            redirect('login');
    }



    public function list() {

        $data['lists'] = $this->db->select('*')->get('podcust_tbl')->result();

        $data['title'] = display('list');
        $data['module'] = "media_library"; 
        $data['page']   = "midea/__podcust_list"; 
        echo Modules::run('template/layout', $data);   

    }


}