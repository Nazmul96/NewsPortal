<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Module_permission_model extends CI_Model {
 
	public function create($data = array())
	{	
		$this->db->where('fk_role_id', $data[0]['fk_role_id'])->delete('module_permission');
		return $this->db->insert_batch('module_permission', $data);
	}



	public function read()
	{
		return $this->db->select("
				module_permission.fk_role_id,sec_role_tbl.role_name
			")
			->from('module_permission')
			->join('sec_role_tbl','sec_role_tbl.role_id = module_permission.fk_role_id', 'left')
			->group_by('module_permission.fk_role_id')
			->order_by('sec_role_tbl.role_id','asc')
			->get()
			->result();
	}

	

	public function single($id = null)
	{
		return $this->db->select("
				module_permission.*,
				module.name as module_name,sec_role_tbl.role_name,sec_role_tbl.role_id")
			->from('module_permission')
			->join('module', 'module.id = module_permission.fk_module_id', 'left')
			->join('sec_role_tbl','sec_role_tbl.role_id = module_permission.fk_role_id', 'left')
			->where('module_permission.fk_role_id', $id)
			->get()
			->result();
	}



	public function permission_edit($id = null)
	{
		$modules = $this->db->select("id, name")
				->from("module")
				->where("status", 1)
				->get()
				->result();

		$mod = array();
		foreach ($modules as $value) {

			$modWisPer = $this->db->select("
				module_permission.*,
				module.name as module_name 
			")
			->from('module_permission')
			->join('module', 'module.id = module_permission.fk_module_id', 'left')
			->where('module_permission.fk_role_id', $id)
			->where('module_permission.fk_module_id', $value->id)
			->get()
			->row();

			$mod[$value->id] = (object)array(
				'name' 		   => $value->name,
				'fk_module_id' => $value->id,
				'fk_role_id'   => $id,
				'create'       => (!empty($modWisPer->create)?$modWisPer->create:0),
				'read'         => (!empty($modWisPer->read)?$modWisPer->read:0),
				'update'       => (!empty($modWisPer->update)?$modWisPer->update:0),
				'delete'       => (!empty($modWisPer->delete)?$modWisPer->delete:0)
			);

		}
		return $mod;
	}



	public function delete($id = null)
	{
		return $this->db->where('fk_role_id', $id)
			->delete("module_permission");
	}
 
  
}
