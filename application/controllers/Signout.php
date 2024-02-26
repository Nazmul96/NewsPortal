<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Signout Controller
 * 
 * @author BDTASK <bdtask@gmail.com>
 * 
 * @link http://www.bdtask.com
 */


class Signout extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }
    
    #---------------------------------
    #    To logout users
    #---------------------------------	
    public function index() {


        $post_by = $this->session->userdata('id');
        $time_stmp = date("Y-m-d h:i:s");
        $data_arr = array(
            'logout_time' => $time_stmp
        );

        $this->db->where('id', $post_by);
        $this->db->update('user_info', $data_arr);

        $this->session->sess_destroy();
        $base_url = base_url();
        redirect($base_url);
        
    }

}