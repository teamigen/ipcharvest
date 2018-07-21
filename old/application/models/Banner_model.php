<?php

class Banner_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function getallactive()
		{
			$this->db->select('*');
			$this->db->from('banner');
			$this->db->where('active', 1);
			$query = $this->db->get();
			return $query->result_array();
		}
	function getall()
		{
			$this->db->select('*');
			$this->db->from('banner');
			$query = $this->db->get();
			return $query->result_array();
		}
	public function delete($table, $id)
	{
	   $this->db->where('id', $id);
	   $this->db->delete($table); 
	}
	public function activation($table, $data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update($table, $data);
		return true;
	}
	public function insert($table, $data){
	if($this->db->insert($table, $data)){
		return true;
	} else {
		return false;
	}
	
	}
}
