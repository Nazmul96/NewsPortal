<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * @System  : Positioning controller
 * @author  : BDTASK <bdtask@gmail.com>
 * @link    : http://www.bdtask.com
 */
class Positioning extends MX_Controller {
 

    public function __construct() {
        parent::__construct();
        
        if (! $this->session->userdata('isLogIn'))
            redirect('login');
        $this->load->model('common_model');  
        $this->load->model('category_model');   
        $this->load->model('positioning_model');   
    }



    #----------------------------------------
    # To view position according to Category
    #----------------------------------------    
    public function position() {

        $this->permission->check_label('positioning')->read()->redirect(); 

        if ($this->input->post('category',TRUE)) {
            $category = $this->input->post('category',TRUE);
        } elseif ($this->uri->segment(4)) {
            $category = $this->uri->segment(4);
        } else {
            $category = 'home';
        }

        $data['selected_category']  = $category;
        $data['categories']         = $this->category_model->all_categories();
        $data['newses']             = $this->positioning_model->get_newses_with_position($category);


        $data['title'] = display('positioning');
        $data['module'] = "news"; 
        $data['page']   = "news/__veiw_positioning"; 
        echo Modules::run('template/layout', $data); 


    }


    #-----------------------------
    #   To update positioning
    #-----------------------------
    public function update_positioning() {

        $this->permission->check_label('positioning')->update()->redirect(); 
        
        $positions = $this->input->post('position',TRUE);
        if (isset($positions) && is_array($positions)) {
            
            $this->positioning_model->update_positions_by_id($positions);
            $this->session->set_flashdata('message', display('update_message'));
            redirect('news/positioning/position/' . $this->input->post('category',TRUE), 'refresh');
        }
    }

    #---------------------------------------
    #     Delete position by ID
    #---------------------------------------    
    public function delete_positionbyid($id) {

        $this->permission->check_label('positioning')->delete()->redirect(); 

        $this->positioning_model->delete_single_position($id);
        $this->session->set_flashdata('message', display('delete_message'));
        redirect('news/positioning/position');
    }

}

