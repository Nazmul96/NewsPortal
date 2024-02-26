<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @System  : Authentication controller
 * @author  : BDTASK <bdtask@gmail.com>
 * @link    : http://www.bdtask.com
 */
class Auth extends MX_Controller {
 	
 	public function __construct()
 	{
 		parent::__construct();
 		$this->load->model(array('auth_model'));
		$this->load->helper('captcha');
 	}

    /**
     * -------------------------------------
     * Checking login authentication and return view
     * @access public 
     * @return author  data array view
     * -------------------------------------
     */
	public function index()
	{  
		if ($this->session->userdata('isLogIn'))
			redirect('dashboard/home');
		#-------------------------------------#
		$this->form_validation->set_rules('email', display('email'), 'required|valid_email|max_length[100]|trim');
		$this->form_validation->set_rules('password', display('password'), 'required|max_length[32]|md5|trim');

		$settings = $this->db->get('app_settings')->row();
		
		if($settings->captcha == 1){
			$this->form_validation->set_rules(
				'captcha', display('captcha'),
				array(
					'matches[captcha]', 
					function($captcha)
					{ 
						$oldCaptcha = $this->session->userdata('captcha');
						if ($captcha == $oldCaptcha) {
							return true;
						}
					}
				)
			);
		}

		#-------------------------------------#
		$data['user'] = (object)$userData = array(
			'email' 	 => $this->input->post('email',TRUE),
			'password'   => $this->input->post('password',TRUE),
		);
		#-------------------------------------#
		if ( $this->form_validation->run())
		{
			$this->session->unset_userdata('captcha');

			$user = $this->auth_model->checkUser($userData);

			if($user->num_rows() > 0) {


				$checkPermission = $this->auth_model->userPermission2($user->row()->id);
				if($checkPermission!=NULL){
					
					$permission = array();
					$permission1 = array();

					if(!empty($checkPermission)){
						foreach ($checkPermission as $value) {
							
							$permission[$value->module] = array( 
								'create' => $value->create,
								'read'   => $value->read,
								'update' => $value->update,
								'delete' => $value->delete
							);

							$permission1[$value->menu_title] = array( 
								'create' => $value->create,
								'read'   => $value->read,
								'update' => $value->update,
								'delete' => $value->delete
							);
						}
					} 
				}



				$sData = array(
					'isLogIn' 	  => true,
					'isAdmin' 	  => (($user->row()->user_type == 3)?true:false),
					'id' 		  => $user->row()->id,
					'name'	  	  => $user->row()->name,
					'email' 	  => $user->row()->email,
					'user_type'   => $user->row()->user_type,
					'pen_name' 	  => $user->row()->pen_name,
					'permission'  => json_encode(@$permission), 
					'label_permission'  => json_encode(@$permission1)

				);	

				//store date to session 
				$this->session->set_userdata($sData);
				//welcome message
				$this->session->set_flashdata('message', display('welcome_back').' '.$user->row()->name);
				redirect('dashboard/home');

			} else {
				$this->session->set_flashdata('exception', display('incorrect_email_or_password'));
				redirect('login');
			} 

		} else {

			$captcha = create_captcha(array(
			    'img_path'      => './assets/img/captcha/',
			    'img_url'       => base_url('assets/img/captcha/'),
			    'font_path'     => base_url('./assets/fonts/captcha.ttf'),
			    'img_width'     => '344',
			    'img_height'    => 50,
			    'expiration'    => 600, //5 min
			    'word_length'   => 4,
			    'font_size'     => 26,
			    'img_id'        => 'Imageid',
			    'pool'          => '0123456789abcdefghijklmnopqrstuvwxyz',
			    // White background and border, black text and red grid
			    'colors'        => array(
			            'background' => array(255, 255, 255),
			            'border' => array(228, 229, 231),
			            'text' => array(49, 141, 1),
			            'grid' => array(241, 243, 246)
			    )
			));

			$data['captcha_word'] = $captcha['word'];
			$data['captcha_image'] = $captcha['image'];
			$this->session->set_userdata('captcha', $captcha['word']);
			$data['title']    = display('login'); 

			echo Modules::run('template/login', $data);

		}
	}
  

    /**
     * -------------------------------------
     * Destroy set session data
     * @access public 
     * -------------------------------------
     */
	public function logout()
	{ 
		//destroy session
		$this->session->sess_destroy();
		redirect('login');
	}

	

}
