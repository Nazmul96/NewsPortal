<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Template Model
 * 
 * @author BDTASK <bdtask@gmail.com>
 * 
 * @link http://www.bdtask.com
 */

class Template_model extends CI_Model {


	public function setting()
	{
		return $this->db->get('app_settings')->row();
	}
}
 