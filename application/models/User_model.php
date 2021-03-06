<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	var $table = "user";
	var $id    = "user_id";

	public function get($params=array())
	{
		if (isset($params['select'])) 
		{
			$this->db->select($params['select']);
		}

		if(isset($params['id'])) {
			$this->db->where($this->id, $params['id']);
		}

		if (isset($params['join'])) {
			$this->db->join($params['join'], $params['on']);
		}

		if (isset($params['id'])) 
		{
			return $this->db->get($this->table)->row_array();
		}else
		{
			return $this->db->get($this->table)->result_array();
		}

	}

	public function add($record)
	{
		$this->db->insert($this->table, $record);
	}

	public function edit($record, $id)
	{
		$this->db->where($this->id, $id);
		$this->db->update($this->table, $record);
	}

	public function del($id)
	{
		$this->db->where($this->id, $id);
		$this->db->delete($this->table);
	}

	public function user_login($username, $password)
	{
		$this->db->where('user_name', $username);
		$this->db->where('user_password', $password);

		return $this->db->get('user');
	}

	public function user_join($params=array())
	{
		$this->db->select('user.*, role.role');
		$this->db->join('role', 'role.role_id = user.role_id');	
		$this->db->join('pelayanan', 'pelayanan.pelayanan_id = user.pelayanan_id', 'left');

		if (isset($params['id'])) {
			$this->db->where($this->id, $params['id']);
			return $this->db->get('user')->row_array();
		}
		else
		{
			return $this->db->get($this->table)->result_array();	
		}
		
	}

}

/* End of file modelName.php */
/* Location: ./application/models/modelName.php */