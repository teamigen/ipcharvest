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
	public function gettopmenu() {
		$this->db->select('*');
		$this->db->from('menusettings');
		$this->db->where('MenuActive', 1);
		$this->db->where('parentid', 0);
		$this->db->order_by('menuafter');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	public function getalltopmenu() {
		$this->db->select('*');
		$this->db->from('menusettings');
		$this->db->where('parentid', 0);
		$this->db->order_by('menuafter');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	public function getsubmenu($id){
		$this->db->select('*');
		$this->db->from('menusettings');
		$this->db->where('MenuActive', 1);
		$this->db->where('parentid', $id);
		$this->db->order_by('menuafter');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	public function getallmenu(){
		
		//$this->db->select('dateandtime AS date, order_detials.id as lineid,  designs.id AS designid, designs.dress_title AS design, ds.member_id AS membid, ds.member_firstname AS designer, br.member_firstname AS buyer, order_detials.size AS size, order_detials.quantity AS quantity, order_detials.amount AS amount, order_detials.order_id AS orderid, order_detials.status AS status, order_detials.transaction_id AS payid');
		//$this->db->from('order_detials');
		//$this->db->join('designs', 'designs.id = order_detials.product_id', 'left');
		//$this->db->join('register as ds', 'designs.user_id = ds.member_id', 'left');
		//$this->db->join('register as br', 'order_detials.user_id = br.member_id', 'left');
		//$this->db->where('order_id', $id);
		
		$this->db->select('menusettings.menuname as menuname, ms1.menuname as parent, menusettings.menuid as menuid, menusettings.MenuActive as MenuActive');
		$this->db->from('menusettings');
		$this->db->join('menusettings as ms1', 'menusettings.parentid = ms1.menuid', 'left');
		$this->db->order_by('menusettings.menuid');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	public function activation($table, $data, $id)
	{
		$this->db->where('menuid', $id);
		$this->db->update($table, $data);
		return true;
	}

	public function delete($table, $id)
	{
	   $this->db->where('menuid', $id);
	   $this->db->delete($table); 
	}
	public function insert($table, $data){
	if($this->db->insert($table, $data)){
		return true;
	} else {
		return false;
	}
	
	}
	public function findthismenu($id){
		$this->db->select('*');
		$this->db->from('menusettings');
		$this->db->where('menuid', $id);
		$query = $this->db->get();
		$result = $query->row_array();
		return $result;
	}

}
