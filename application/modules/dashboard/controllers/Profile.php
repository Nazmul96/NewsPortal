<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @System  : Profile controller
 * @author  : BDTASK <bdtask@gmail.com>
 * @link    : http://www.bdtask.com
 */
class Profile extends MX_Controller {


    public function __construct() {
        parent::__construct();
        if (! $this->session->userdata('isLogIn'))
            redirect('login');
    }


    public function index() {
        
        $id = $this->session->userdata('id');
        $data['user_info'] = $this->db->where('id',$id)->get('user_info')->row();
        
        $data['title']      = display('profile');
        $data['module']     = "dashboard";  
        $data['page']       = "user/__profile";   
        echo Modules::run('template/layout', $data); 

    }


    #user_info_update;
    public function update_user_info() {

        $postData = array(
            'name'          => $this->input->post('name',TRUE),
            'nick_name'     => $this->input->post('nick_name',TRUE),
            'pen_name'      => $this->input->post('pen_name',TRUE),
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
            'status'        => 1,
        );
        
        $id = $this->session->userdata('id');
        $this->db->where('id', $id);
        $rv = $this->db->update('user_info', $postData);

        $this->session->set_flashdata('message', display('update_message'));
        redirect('dashboard/profile');
        
    }



    // user photo update
    public function user_photo() {

        if (@$_FILES['user_photo']['name']) {
           
            $config['upload_path']   = './uploads/user/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['overwrite']     = false;
            $config['max_size']      = 1024;
            $config['remove_spaces'] = true;
            $config['max_filename']   = 10;
            $config['file_ext_tolower'] = true;

            $this->upload->initialize($config);

                if (!$this->upload->do_upload('user_photo'))
                {
                   $error = $this->upload->display_errors();
                   
                   $this->session->set_flashdata('exception',$error);
                   redirect("dashboard/Profile");

                } else {
            
                    $data = $this->upload->data();
                    $image = $config['upload_path'].$data['file_name'];

                    #------------resize image------------#
                    $this->load->library('image_lib');
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = $config['upload_path'].$data['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['width']    = 180;
                    $config['height']   = 180;

                    $this->image_lib->clear();
                    $this->image_lib->initialize($config);
                    $this->image_lib->resize();
                    #-------------resize image----------#
                }

            } else {
                $image = $this->input->post('user_pic',TRUE);
            }

            $post_by = $this->session->userdata('id');
            $data_arr = array(
                'photo' => $image
            );
            $this->db->where('id', $post_by);
            $this->db->update('user_info', $data_arr);

            $this->session->set_flashdata('message',display('update_message'));
        
            redirect("dashboard/profile");
    }





    public function change_password(){

        $data['title']      = display('change_password');
        $data['module']     = "dashboard";  
        $data['page']       = "user/__change_password";   
        echo Modules::run('template/layout', $data); 

    }



    #------------------------
    public function save_change(){

        $this->form_validation->set_rules('old_password', 'Old Password', 'trim|required');
        $this->form_validation->set_rules('new_password', 'New Password', 'trim|required');
        $this->form_validation->set_rules('confirm_password', 'Confirm password', 'required|matches[new_password]');
        
        if($this->form_validation->run() == FALSE){
            $data['title']      = display('change_password');
            $data['module']     = "dashboard";  
            $data['page']       = "user/__change_password";   
            echo Modules::run('template/layout', $data); 
        }else{

            $old_password = $this->input->post('old_password',TRUE);
            $new_password = $this->input->post('new_password',TRUE);
            $confirm_password = $this->input->post('confirm_password',TRUE);
            $id = $this->session->userdata('id');

            if($new_password==$confirm_password){

                $check = $this->db->where('id',$id)->where('password',md5($old_password))->get('user_info')->row();
                if($check){
                    $password =  md5($new_password);
                    $this->db->set('password',$password)->where('id',$id)->update('user_info');
                    $this->session->set_flashdata('message','Change successfully');
                    redirect('dashboard/profile/change_password');
                }else{
                    $this->session->set_flashdata('exception','Old password is Wrong');
                    redirect('dashboard/profile/change_password');
                }
 
            }else{
                $this->session->set_flashdata('exception','Confirm Password Does not match');
                redirect('dashboard/profile/change_password');
            }
        }
    }

}
