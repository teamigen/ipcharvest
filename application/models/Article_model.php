<?php
class Article_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
	public function savecateg($infeed){
		$this->db->insert('articlecategory', $infeed);
        return $this->db->insert_id();
	}
	public function getallcategs(){
		$this->db->select('*');
		$this->db->from('articlecategory');
		$this->db->order_by('categoryName');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function updatecateg($data, $id){
		extract($data);
		$this->db->where('id', $id);
		$this->db->update('articlecategory', $data);
		return true;
	}
	public function getcateg($categId){
		$this->db->select('*');
		$this->db->from('articlecategory');
		$this->db->where('id', $categId);
		$query = $this->db->get();
        return $query->row();
	}
	public function getarticles($id){
		$this->db->select('*');
		$this->db->from('articles');
		$this->db->where('articleCateg', $id);
		$query = $this->db->get();
        return $query->result();
	}
	public function getallarticles(){
		$this->db->select('*');
		$this->db->from('articles');
		$this->db->order_by('articleid', 'DESC');
		
		$query = $this->db->get();
        return $query->result();
	}
	public function getactivecategs(){
		$this->db->select('*');
		$this->db->from('articlecategory');
		$this->db->where('categActive', 1);
		$this->db->order_by('categoryName');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function deletecateg($id){
		$this->db->where('id', $id);
		$this->db->delete('articlecategory');
		return true;
	}
	public function insert($table, $data){
	if($this->db->insert($table, $data)){
		return true;
	} else {
		return false;
	}
	
	}
	public function update($table, $data, $id){
		$this->db->where('id', $id);
		$this->db->update($table, $data);
		return true;
	}
	public function delete($table, $id){
	   $this->db->where('id', $id);
	   $this->db->delete($table); 
	}
	public function updateimage($table, $data, $inid){
		$this->db->where('articleid', $inid);
		$this->db->update($table, $data);
		return true;
	}
}
