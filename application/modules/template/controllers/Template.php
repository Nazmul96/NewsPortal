<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Template controller
 * 
 * @author BDTASK <bdtask@gmail.com>
 * 
 * @link http://www.bdtask.com
 */
class Template extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('template_model'));
	}
 
	public function layout($data)
	{  
		$id = $this->session->userdata('id');
		$data['settings'] = $this->template_model->setting();
		$data['ot'] = json_decode($this->db->where('id', 115)->get('settings')->row()->details);
		$data['panelset'] = json_decode($this->db->where('id',117)->get('settings')->row()->details);

		$data['message_autoupdate'] = $this->autoupdate_checker($data['settings']);

		$this->load->view('layout', $data);
	}
 
	public function login($data)
	{ 
		$data['settings'] = $this->template_model->setting();
		$this->load->view('login', $data);
	}



	public function autoupdate_checker($settings){ 

		if($this->uri->segment(2)!='autoupdate'){
            define('UPDATE_INFO_URL','https://update.bdtask.com/news365/autoupdate/update_info');
        }
		
        if (! $this->session->userdata('isLogIn'))
            redirect('login');

        $data = array();
        $data['current_version'] = $this->current_version();
        $data['latest_version']  = file_get_contents(UPDATE_INFO_URL);
        $message_autoupdate = '';
        if(@$settings->version<$data['latest_version']){
            if ($data['current_version']<$data['latest_version']) {
                $message_autoupdate = '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Update available';
            } 
        }

        return $message_autoupdate; 

    }




    private function current_version(){

        //Current Version
        $product_version = '';
        $path = FCPATH.'system/core/compat/lic.php'; 
        if (file_exists($path)) {
            // Open the file
            $whitefile = file_get_contents($path);
            $file = fopen($path, "r");
            $i    = 0;
            $product_version_tmp = array();
            $product_key_tmp = array();
            
            while (!feof($file)) {
                $line_of_text = fgets($file);
                if (strstr($line_of_text, 'product_version')  && $i==0) {
                    $product_version_tmp = explode('=', strstr($line_of_text, 'product_version'));
                    $i++;
                }
            }
            fclose($file);
            $product_version = trim(@$product_version_tmp[1]);
            $product_version = ltrim(@$product_version, '\'');
            $product_version = rtrim(@$product_version, '\';');
            return @$product_version;
        } else {
            //file is not exists
            return false;
        }
        
    }
 
}
