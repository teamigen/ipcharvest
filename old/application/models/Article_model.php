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
		$query = $this->db->query("
SELECT A.categoryName AS subcateg, B.categoryName AS parentcateg, A.id, A.categActive FROM articlecategory A, articlecategory B WHERE A.parentCategId = B.id ORDER BY A.categoryName");
        return $query->result();
	}
	public function updatecateg($data, $id){
		extract($data);
		$this->db->where('id', $id);
		$this->db->update('articlecategory', $data);
		return true;
	}
	public function getcateg($categId){
		$query = $this->db->query("
SELECT A.categoryName AS subcateg, B.categoryName AS parentcateg, A.id, A.parentCategId, A.categActive FROM articlecategory A, articlecategory B WHERE A.parentCategId = B.id AND A.id = ".$categId." ORDER BY A.categoryName");
        return $query->row();
	}

	
}
