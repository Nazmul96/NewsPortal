<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * @System  : Positioning controller
 * @author  : BDTASK <bdtask@gmail.com>
 * @link    : http://www.bdtask.com
 */

class Redirection extends MX_Controller {


    public function __construct() {
        parent::__construct();

        if (! $this->session->userdata('isLogIn'))
            redirect('login');
        $this->load->model('common_model');  
        $this->load->model('category_model');   
        $this->load->model('positioning_model');   

    }


    public function manage_redirection() {

  
        $data['rr'] = $this->db->select('*')->get('redirection_tbl')->result();

        $data['title'] = display('redirection');
        $data['module'] = "news"; 
        $data['page']   = "news/_manage_redirection"; 
        echo Modules::run('template/layout', $data); 



    }



    public function save(){

        $data = array(
            'from_title' => $this->input->post('from_title',TRUE),
            'to_title'=> $this->input->post('to_title',TRUE)
        );


        $insert = $this->db->insert('redirection_tbl',$data);

        if($insert){
            echo json_encode(array("status" => 1));
        }else{
            echo json_encode(array("status" => 0));
        }

    }


    public function save_update(){

        $data = array(
            'from_title' => $this->input->post('from_title',TRUE),
            'to_title'=>$this->input->post('to_title',TRUE)
        );
        $id = $this->input->post('id',TRUE);

        if($this->db->where('id',$id)->update('redirection_tbl',$data)){

            echo json_encode(array("status" => 1));
        }else{
            echo json_encode(array("status" => 0));
        }

    }


    public function edit($id){

        $data = $this->db->where('id',$id)->get('redirection_tbl')->row();
        echo json_encode($data);   

    }




    public function delete($id){

        if($this->db->where('id',$id)->delete('redirection_tbl')){

            echo json_encode(array("status" => 1));
            
        }else{
            echo json_encode(array("status" => 0));
        }   

    }


    

}
