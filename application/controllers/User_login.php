<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_login extends CI_Controller {

  
    public function __construct() {
        parent::__construct();
        $this->load->model('Auth_model','auth');
        $this->load->model("settings");
    }



    public function login() {

        $data1 = array(
            'email'     => ($this->input->post('email',TRUE)),
            'password'  => ($this->input->post('password',TRUE))
        );

        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        
        if ($this->form_validation->run() == FALSE) {
            echo '1'; 
        } else {

            $data = $this->auth->user_login($data1);

            if($data!=NULL){
                #-----------------------------
                # update login time
                $update_login_time = date("Y-m-d h:i:s");
                $ip = $this->input->ip_address();
                $id = $data['id'];
                $dd = array('login_time'=>$update_login_time,'ip'=>$ip);
                $this->db->where('id',$id)->update('user_info',$dd);
                #-----------------------------

                $session_data = array(
                    'id' => $data['id'],
                    'name' => $data['name'],
                    'pen_name' => $data['pen_name'],
                    'user_type' => $data['user_type'],
                    'email' => $data['email'],
                    'session_id' => session_id(),
                    'logged_in' => TRUE
                );

                $this->session->set_userdata($session_data);

                redirect(base_url());
                
         
            } else {
                echo "3";
            }
        }
            
    }



    public function registration(){
                 
        $this->form_validation->set_rules('name', 'Name ', 'required');
        $this->form_validation->set_rules('email', 'Email ', 'trim|required');
        $this->form_validation->set_rules('pass', 'Password ', 'trim|required');

        if ($this->form_validation->run() == FALSE) { 
                echo "1";           
        } else {

        
                $name = $this->input->post('name',TRUE);
                $email = $this->input->post('email',TRUE);
                $password = md5($this->input->post('pass'));

                $check_status = $this->db->select('*')->from('user_info')->where('email',$email)->get()->row();        
                    
                    if ($check_status) {
                        echo "2";
                    } else {

                    $user_data = array(
                        'name'      =>$name,
                        'email'     =>$email,
                        'password'  =>$password,
                        'status'    =>1,
                        'user_type' =>5
                    );
                    $this->db->insert('user_info',$user_data);

                    $ot = json_decode($this->settings->get_previous_settings('settings', 115));

                    if($ot->reg_status=='1'){

                        $em = $this->db->select('*')
                        ->from('email_config')
                        ->where('id',1)
                        ->where('status',1)
                        ->get()
                        ->row();

                        $email          = $this->input->post('email',TRUE);
                        $password       = $this->input->post('pass');
                        $subject        = 'Registration';

                        //Load email library
                        $this->load->library('email');
                        //SMTP & mail configuration
                        $config = array(
                            'protocol'  => $em->smtp_protocol,
                            'smtp_host' => $em->smtp_host,
                            'smtp_port' => $em->smtp_port,
                            'smtp_user' => $em->smtp_username,
                            'smtp_pass' => $em->smtp_password,
                            'mailtype'  => 'html',
                            'charset'   => 'utf-8'
                        );
                        $this->email->initialize($config);
                        $this->email->set_newline("\r\n");
                        //Email content
                        $htmlContent = '<p><strong>Welcome</strong> '.$name.', Your User name: '.$email.' Password : '.$password.'</p>';
                        $this->email->to($email);
                        $this->email->from($em->smtp_username,$subject);
                        $this->email->subject($subject);
                        $this->email->message($htmlContent);
                        $this->email->send();
                    }
                    echo "3";
                }

            }

        }

}

