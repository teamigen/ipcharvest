<?php
class Theme_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
	public function getthemedata(){
		$this->db->select('*');
		$this->db->from('themesettings');
		$query = $this->db->get();
		$result = $query->row_array();
		return $result;
	}
	public function updatethemedata($table, $data){
		$this->db->where('settingsid', 1);
		$this->db->update($table, $data);
		return true;
	}

}
