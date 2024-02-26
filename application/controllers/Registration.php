<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * User Registration Controller
 * 
 * @author BDTASK <bdtask@gmail.com>
 * 
 * @link http://www.bdtask.com
 */

class Registration extends CI_Controller {


    public function __construct() {
        parent::__construct();
        // loading model
        $this->load->model('ads');
        $this->load->model("settings");
        $this->load->model('home_model', 'hm');
        $this->load->model('Pb_function', 'pb');
        $this->load->model('All_cata', 'cata');
        $this->load->model('common_model');
        $this->load->model('Write_setting_model', 'wsm');
        $this->load->model('auth_model');
    }



    public function index(){

        #-------------------------------------
        # website setting data     
        $data['setting']                = $this->db->get('app_settings')->row();
        $data['meta']                   = json_decode($this->settings->get_previous_settings('settings', 5));
        $data['social_link']            = json_decode($this->settings->get_previous_settings('settings', 111));
        $data['social_page']            = json_decode($this->settings->get_previous_settings('settings', 6));
        
        $data['default_theme'] = $this->wsm->theme_data();
        $data['lan'] = $this->wsm->lan_data();
        $default_theme = $data['default_theme'];

        $data['ln'] = $this->common_model->latest_news();
        $data['bn'] = $this->common_model->breaking_news();
        $data['mr'] = $this->common_model->most_read_dbse();

        $data['login_url'] = $this->googleplus->loginURL();
        $data['main_menu'] = $this->settings->main_menu();
        $data['cat_menus'] = $this->settings->footer_menu();
        $data['footer_menu'] = $this->settings->menu_position_3();

        $this->load->view('themes/' . $default_theme . '/header', $data);
        $this->load->view("themes/" . $default_theme . "/breaking");
        $this->load->view('themes/' . $default_theme . '/menu');
        $this->load->view('themes/' . $default_theme . '/view_registration');
        $this->load->view('themes/' . $default_theme . '/footer');
    
    }


    public function redirect(){
       
        $user_type = $this->session->userdata('user_type');
        redirect('registration/index');
        
    }   


    #-----------------------
    # pssword genaretor
    #----------------------
    function randstrGen()
    {
        $result = "";
        $chars = "0123456789";
        $charArray = str_split($chars);
        for($i = 0; $i < 5; $i++) {
                $randItem = array_rand($charArray);
                $result .="".$charArray[$randItem];
        }
        return $result;
    }


    #------------------------------------
    #   facebook login and registration
    #------------------------------------    
    public function facebook_login()
    {

        echo "facebook_login"; exit;

        $data['user'] = array();
        // Check if user is logged in
        if ($this->facebook->is_authenticated())
        {
            // User logged in, get user details
            $user = $this->facebook->request('get', '/me?fields=id, name, email, about, age_range, birthday, cover, education, gender, hometown, languages, relationship_status, religion, photos, picture');

            if (!isset($user['error']))
            {
                $data['user'] = $user;
            }
        }else{
            redirect('registration/index');    
        }  

        if(empty($user['email'])){
            $this->session->set_flashdata('exception','Email not found');
            redirect('registration/index'); 
        }   

        echo "<pre>";
        print_r($user);

        $check_status = $this->db->select('*')->from('user_info')->where('email',$user['email'])->get()->row();  

        if($check_status){

            $session_data = array(

                'id'        => $check_status->id,
                'name'      => $check_status->name,
                'pen_name'  => $check_status->pen_name,
                'user_type' => $check_status->user_type,
                'email'     => $check_status->email,
                'session_id' => session_id(),
                'logged_in' => TRUE

            );

            $this->session->set_userdata($session_data);
            redirect(base_url());
            

        } else {

            $password = $this->randstrGen();
            $user_data = array(
                'name'      =>$user['name'],
                'pen_name'  =>$user['name'],
                'email'     =>$user['email'],
                'password'  =>md5($password),
                'status'    =>1,
                'user_type' =>5
            );
            $this->db->insert('user_info',$user_data);

            #-------------------------------
            #   email send to user email
            #-------------------------------
            $send_data = array(
                'to'       => $user['email'],
                'subject'  => 'Registration',
                'message'  => 'You successfully Registration '.$user['name'].',  Your email is '.$user['email'].' and Password is '.$password,
            );


            #----------------------------
            $sdata = $this->db->select('*')->from('user_info')->where('email',$user['email'])->get()->row();  
          
            $session_data = array(
                'id'            => $sdata->id,
                'name'          => $sdata->name,
                'pen_name'      => $sdata->pen_name,
                'user_type'     => $sdata->user_type,
                'email'         => $sdata->email,
                'session_id'    => session_id(),
                'logged_in'     => TRUE
            );

            $this->session->set_userdata($session_data);
            #------------------------------
            $data = array(
                'name' => $user['name'],
                'email'=>$user['email'],
                'password'=>$password
            ); 
                         
        }

        #-------------------------------------
        # website setting data     
        $data['setting']                = $this->db->get('app_settings')->row();
        $data['meta']                   = json_decode($this->settings->get_previous_settings('settings', 5));
        $data['social_link']            = json_decode($this->settings->get_previous_settings('settings', 111));
        $data['social_page']            = json_decode($this->settings->get_previous_settings('settings', 6));
        
        $data['default_theme'] = $this->wsm->theme_data();
        $data['lan'] = $this->wsm->lan_data();
        $default_theme = $data['default_theme'];

        $data['ln'] = $this->common_model->latest_news();
        $data['bn'] = $this->common_model->breaking_news();
        $data['mr'] = $this->common_model->most_read_dbse();

        $data['login_url'] = $this->googleplus->loginURL();
        $data['main_menu']      = $this->settings->main_menu();
        $data['cat_menus']          = $this->settings->footer_menu();
        $data['footer_menu']    = $this->settings->menu_position_3();

        $this->load->view('themes/' . $default_theme . '/header', $data);
        $this->load->view("themes/" . $default_theme . "/breaking");
        $this->load->view('themes/' . $default_theme . '/menu');
        $this->load->view('themes/' . $default_theme . '/view_fb_registration');
        $this->load->view('themes/' . $default_theme . '/footer');



    }


    #----------------------------------------
    #       google registration and login
    #----------------------------------------    
    public function googl_login(){
     
        // Check if user is logged in
        if ($this->googleplus->getAuthenticate())
        {
            $data = $this->googleplus->getUserInfo();
        }

        $check_status = $this->db->select('*')->from('user_info')->where('email',$data['email'])->get()->row();  

        if($check_status){
            $session_data = array(
                'id' => $check_status->id,
                'name' => $check_status->name,
                'pen_name' => $check_status->pen_name,
                'user_type' => $check_status->user_type,
                'email' => $check_status->email,
                'session_id' => session_id(),
                'logged_in' => TRUE
            );


            $this->session->set_userdata($session_data);
            redirect(base_url());
            

        }else{

            $password = $this->randstrGen(); 
            $register_data = array(
                'name' => $data['name'],
                'email' => $data['email'],
                'pen_name' => $data['given_name'],
                'user_type' => 5,
                'status'    =>1,
                'password' => md5($password)
            );
            
            $this->db->insert('user_info',$register_data);
            #-------------------------------
            #   email send to user email
            #-------------------------------
            $send_data = array(
                 'to'       =>  $data['email'],  
                 'subject'  => 'Registration',
                 'message'  => 'You successfully Registration '.$data['name'].',  Your email is '.$data['email'].' and Password is '.$password,
            );
            #-------------------------------

            @$sdata = $this->db->select('*')->from('user_info')->where('email',$data['email'])->get()->row();
          
            $session_data = array(
                'id'            => $sdata->id,
                'name'          => $sdata->name,
                'pen_name'      => $sdata->pen_name,
                'user_type'     => $sdata->user_type,
                'email'         => $sdata->email,
                'session_id'    => session_id(),
                'logged_in'     => TRUE
            );

            $this->session->set_userdata($session_data);

            $data = array(
                'name'      => $data['name'],
                'email'     => $data['email'],
                'pen_name'  => $data['given_name'],
                'user_type' => 5,
                'status'    => 1,
                'password'  => $password
            );
             
            #-------------------------------------
            # website setting data     
            $data['setting']                = $this->db->get('app_settings')->row();
            $data['meta']                   = json_decode($this->settings->get_previous_settings('settings', 5));
            $data['social_link']            = json_decode($this->settings->get_previous_settings('settings', 111));
            $data['social_page']            = json_decode($this->settings->get_previous_settings('settings', 6));
            
            $data['default_theme'] = $this->wsm->theme_data();
            $data['lan'] = $this->wsm->lan_data();
            $default_theme = $data['default_theme'];

            $data['ln'] = $this->common_model->latest_news();
            $data['bn'] = $this->common_model->breaking_news();
            $data['mr'] = $this->common_model->most_read_dbse();

            $data['login_url'] = $this->googleplus->loginURL();
            $data['main_menu']      = $this->settings->main_menu();
            $data['cat_menus']          = $this->settings->footer_menu();
            $data['footer_menu']    = $this->settings->menu_position_3();

            $this->load->view('themes/' . $default_theme . '/header', $data);
            $this->load->view("themes/" . $default_theme . "/breaking");
            $this->load->view('themes/' . $default_theme . '/menu');
            $this->load->view('themes/' . $default_theme . '/view_fb_registration');
            $this->load->view('themes/' . $default_theme . '/footer');

       } 

       
    }


    #------------------------------
    # ContactUs
    #-------------------------------
    public function create_user() {
        
        $this->form_validation->set_rules('name', 'Name ', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Email ', 'trim|required|valid_email|is_unique[user_info.email]');
        $this->form_validation->set_rules('password', 'Password ', 'trim|required|xss_clean');
       
        if ($this->form_validation->run() == FALSE) { 
        #---------------------
        # website setting data   

            $data['setting']                = $this->db->get('app_settings')->row();
            $data['meta']                   = json_decode($this->settings->get_previous_settings('settings', 5));
            $data['social_link']            = json_decode($this->settings->get_previous_settings('settings', 111));
            $data['social_page']            = json_decode($this->settings->get_previous_settings('settings', 6));
            // getting ads

            $data['home_page_positions']    = $this->wsm->home_category_position();
            $data['default_theme']          = $this->wsm->theme_data();
            $data['lan']                    = $this->wsm->lan_data();
            $default_theme                  = $data['default_theme'];

            $data['ln'] = $this->common_model->latest_news();
            $data['bn'] = $this->common_model->breaking_news();
            $data['mr'] = $this->common_model->most_read_dbse();
            
            $data['login_url']      = $this->googleplus->loginURL();
            $data['main_menu']      = $this->settings->main_menu();
            $data['cat_menus']      = $this->settings->footer_menu();
            $data['footer_menu']    = $this->settings->menu_position_3();

            $this->load->view('themes/' . $default_theme . '/header', $data);
            $this->load->view("themes/" . $default_theme . "/breaking");
            $this->load->view('themes/' . $default_theme . '/menu');
            $this->load->view('themes/' . $default_theme . '/view_registration');
            $this->load->view('themes/' . $default_theme . '/footer'); 



        } else {

            $name = $this->input->post('name',TRUE);
            $email = $this->input->post('email',TRUE);
            $password = md5($this->input->post('password',TRUE));

                $user_data = array(
                    'name'      =>$name,
                    'email'     =>$email,
                    'password'  =>$password,
                    'user_type' =>5,
                    'status'    =>1
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



                $this->session->set_flashdata('message', "Registration successful.");
                #-------------------------------
                redirect('registration/index');    
         }

    }



    public function check_authentic() {  

        $data = array(
            'email'     => trim($this->input->post('email',TRUE)),
            'password'  => trim($this->input->post('password',TRUE))
        );

        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|xss_clean|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('exception','Email or Password is Missing!.');
            redirect('registration/index');

        } else {

            $data = $this->auth_model->user_login($data);

            if($data>0){

                $update_login_time = date("Y-m-d h:i:s");
                $ip = $this->input->ip_address();
                $id = $data['id'];
                $dd = array('login_time' => $update_login_time,'ip'=>$ip);
                $this->db->where('id',$id)->update('user_info',$dd);
                
                $session_data = array(

                    'id'        => $data['id'],
                    'name'      => $data['name'],
                    'nick_name' => $data['nick_name'],
                    'email'     => $data['email'],
                    'user_type' => $data['user_type'],
                    'session_id'=> session_id(),
                    'logged_in' => TRUE

                );

                $this->session->set_userdata($session_data);
                
            
                if($data['user_type'] == 5){
                    $this->session->set_flashdata('message','Login Successful');
                    redirect('registration/index');
                } else {
                    $this->session->set_flashdata('exception',display('log_error_msg'));
                    redirect('registration/index');
                }

            }  else {

                $this->session->set_flashdata('exception',display('log_error_msg'));
                redirect('registration/index');

            }

        }
        
    }



    public function sign_out(){

        $post_by = $this->session->userdata('id');
        $time_stmp = time() + 6 * 60 * 60;
        $data_arr = array(
            'logout_time' => $time_stmp
        );
        $this->db->where('id', $post_by);
        $this->db->update('user_info', $data_arr);
        $this->session->sess_destroy();
        $this->session->set_flashdata('message','Logout Successful');
        redirect('registration/index');
    }



}
