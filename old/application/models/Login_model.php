<?php
class Login_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
	public function checklogin($u, $p){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('userName', $u);
		$this->db->where('userPwd', $p);
		$query = $this->db->get();
		$result = $query->row_array();
		return $result;
	}

}
