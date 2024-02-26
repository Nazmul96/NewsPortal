<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @System  : Archive controller
 * @author  : BDTASK <bdtask@gmail.com>
 * @link    : http://www.bdtask.com
 */
class Polling extends MX_Controller {


    public function index() {

       // $this->permission->check_label('archive_setting')->create()->redirect();
        
        $data['query'] = $this->db->select('*')->from('pulling')->order_by('id','DESC')->get()->result_array();

        $data['title'] = display('poll_list');
        $data['module'] = "poll"; 
        $data['page']   = "__poll"; 
        echo Modules::run('template/layout', $data);   

    }


    #-------------------------------------
    #      To save pulling question
    #-------------------------------------
    public function save_poll() {

        $pulling = trim($this->input->post('pulling',TRUE));

        if ($pulling) {

            $time_stamp = time() + (6 * 60 * 60); // 6 hours; 60 mins; 60secs
            $data = array(
                'id' => NULL,
                'question' => $pulling,
                'yes' => 0,
                'no' => 0,
                'on_comment' => 0,
                'time_stamp' => $time_stamp,
                'status' => 1
            );
            $this->db->insert('pulling', $data);

            $this->session->set_flashdata('message','Poll add successfully');
        }
        redirect("poll/polling/index");
    }


    #-----------------------------------
    #      To edit pulling question
    #-----------------------------------

    public function edit() {
        $time_stamp = time() + (6 * 60 * 60); // 6 hours; 60 mins; 60secs
        $id = $this->input->post('id');
        $data_arr = array(
            'question' => $this->input->post('pulling',TRUE),
            'time_stamp' => $time_stamp
        );
        $this->db->where('id', $id);
        $this->db->update('pulling', $data_arr);
        $this->session->set_flashdata('message',display('update_message'));
        redirect("poll/polling/index");
    }


    #------------------------------------------
    #     to edit pulling question status
    #------------------------------------------    
    public function status_edit() {
        $id = $this->uri->segment(4);
        $status = ($this->uri->segment(5) == 1) ? 0 : 1;
        $data_arr = array('status' => $status);
        $this->db->where('id', $id);
        $this->db->update('pulling', $data_arr);
         $this->session->set_flashdata('message',display('update_message'));
        redirect("poll/polling/index");
    }


    #-----------------------------------------------
    #     to delete individual pulling question
    #----------------------------------------------     
    public function delete() {
        $id = $this->uri->segment(4);
        $this->db->delete('pulling', array('id' => $id));
         $this->session->set_flashdata('message',display('delete_message'));
        redirect("poll/polling/index");
    }


    


}