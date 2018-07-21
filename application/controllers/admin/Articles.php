<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articles extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->library('image_lib');
    }

	public function index()
	{
		redirect(base_url().'admin/articles/manage/');
	}
	public function manage()
	{
		$data['pageitems'] = array(
		'browser-title' => "Manage Articles - Sanctuary Church Solutions",
		'pagehead' => "Articles - Manage Articles",
		'panelhead1' => "Manage Articles",
		);
		$data['articles'] = $this->Article_model->getallarticles();
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/topnav');
		$this->load->view('admin/templates/usernav');
		$this->load->view('admin/articles/manage', $data);
		$this->load->view('admin/templates/footer');
	}
	public function create()
	{
		$data['pageitems'] = array(
		'browser-title' => "Create Article - Sanctuary Church Solutions",
		'pagehead' => "Articles - Create Article",
		'panelhead1' => "Create Article",
		);
		$data['artcategs'] = $this->Article_model->getactivecategs();
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/topnav');
		$this->load->view('admin/templates/usernav');
		$this->load->view('admin/articles/create', $data);
		$this->load->view('admin/templates/footer');
	}
	public function categories()
	{
		$data['pageitems'] = array(
		'browser-title' => "Manage Article Categories - Sanctuary Church Solutions",
		'pagehead' => "Article Categories - Create & Manage",
		'panelhead1' => "Create Category",
		'panelhead2' => "Manage Category",
		'buttontext1' => "Save Category",
		);
		$data['categories'] = $this->Article_model->getallcategs();
		$this->load->view('admin/templates/header' , $data);
		$this->load->view('admin/templates/topnav');
		$this->load->view('admin/templates/usernav');
		$this->load->view('admin/articles/categories', $data);
		$this->load->view('admin/templates/footer');
	}
	public function savecateg()
	{
		$this->form_validation->set_rules('categoryName', 'Category Name', 'required'); 
		$infeed = array(
			'categoryName' => $this->input->post('categoryName'),
			'categActive' => 1
		);
		if ($this->form_validation->run() == TRUE){
			$this->Article_model->savecateg($infeed);
			$this->session->set_flashdata('msgdisp', "<div class=\"alert alert-success\" style=\"margin-top:20px;\"><strong>Success! </strong>Category ".$this->input->post('categoryName')." Saved Successfully</div>");
			redirect('admin/articles/categories');
		} else {
			$this->session->set_flashdata('msgdisp', "<div class=\"alert alert-danger\" style=\"margin-top:20px;\"><strong>Warning! </strong>".validation_errors()."</div>");
			redirect('admin/articles/categories');
		}
	}
	public function inactivate() {
		$data = array(
			'categActive' => 0
		);
		if($this->Article_model->updatecateg($data, $this->uri->segment(4))){
			$this->session->set_flashdata('msgdisp', "<div class=\"alert alert-success\" style=\"margin-top:20px;\"><strong>Success! </strong>Category Inactivated Successfully</div>");
			redirect('admin/articles/categories');
		} else {
			$this->session->set_flashdata('msgdisp', "<div class=\"alert alert-danger\" style=\"margin-top:20px;\"><strong>Warning! </strong>Please Try Later</div>");
			redirect('admin/articles/categories');
		}
	}
	public function activate() {
		$data = array(
			'categActive' => 1
		);
		if($this->Article_model->updatecateg($data, $this->uri->segment(4))){
			$this->session->set_flashdata('msgdisp', "<div class=\"alert alert-success\" style=\"margin-top:20px;\"><strong>Success! </strong>Category Activated Successfully</div>");
			redirect('admin/articles/categories');
		} else {
			$this->session->set_flashdata('msgdisp', "<div class=\"alert alert-danger\" style=\"margin-top:20px;\"><strong>Warning! </strong>Please Try Later</div>");
			redirect('admin/articles/categories');
		}
	}
	public function update() {
		$data['pageitems'] = array(
		'browser-title' => "Manage Article Categories - Sanctuary Church Solutions",
		'pagehead' => "Article Categories - Update Category",
		'panelhead1' => "Update Category",
		'panelhead2' => "Manage Category",
		'buttontext1' => "Update Category",
		);
		$data['thiscateg'] = $this->Article_model->getcateg($this->uri->segment(4));
		$data['categories'] = $this->Article_model->getallcategs();
		$this->load->view('admin/templates/header' , $data);
		$this->load->view('admin/templates/topnav');
		$this->load->view('admin/templates/usernav');
		$this->load->view('admin/articles/categories', $data);
		$this->load->view('admin/templates/footer');
	}
	public function updatecateg(){
		$this->form_validation->set_rules('categoryName', 'Category Name', 'required'); 
		$infeed = array(
			'categoryName' => $this->input->post('categoryName'),
			'categActive' => 1
		);
		if ($this->form_validation->run() == TRUE){
			$categId = $this->uri->segment(4);
			$this->Article_model->updatecateg($infeed, $categId);
			$this->session->set_flashdata('msgdisp', "<div class=\"alert alert-success\" style=\"margin-top:20px;\"><strong>Success! </strong>Category ".$this->input->post('categoryName')." Saved Successfully</div>");
			redirect('admin/articles/categories');
		} else {
			$this->session->set_flashdata('msgdisp', "<div class=\"alert alert-danger\" style=\"margin-top:20px;\"><strong>Warning! </strong>".validation_errors()."</div>");
			redirect('admin/articles/categories');
		}
	}
	public function deletecateg() {
		$categid = $this->uri->segment(4);
		$c = count($this->Article_model->getarticles($categid));
		if($c > 0){
			$this->session->set_flashdata('msgdisp', "<div class=\"alert alert-danger\" style=\"margin-top:20px;\"><strong>Warning! </strong>There are articles under this category and hence cannot delete</div>");
			redirect('admin/articles/categories');
		} else {
			if($this->Article_model->deletecateg($categid)){
			$this->session->set_flashdata('msgdisp', "<div class=\"alert alert-success\" style=\"margin-top:20px;\"><strong>Success! </strong>Category Deleted Successfully</div>");
			redirect('admin/articles/categories');
			}
		}
	}
public function savearticle(){
	if($_POST){
			$table = "articles";
			$data['pageitems'] = array(
				'browser-title' => "Create Article - Sanctuary Church Solutions",
				'pagehead' => "Articles - Create Article",
				'panelhead1' => "Create Article",
			);
			$this->form_validation->set_rules('atitle','Article Title','trim|required');
			//$this->form_validation->set_rules('articleslug','Article Title Slug','trim|required|is_unique[designs.slug]');
			$this->form_validation->set_rules('aauthor','Author','trim|required');
			$this->form_validation->set_rules('acontent','Article Content','trim|required');
			$this->form_validation->set_rules('acateg','Article Category','trim|required');
			$date = date("d M Y");
			$data['formcont'] = array(
				'articleTitle' => $this->input->post('atitle'),
				'articleAuthor' => $this->input->post('aauthor'),
				'articleContent' => $this->input->post('acontent'),
				'articleActive' => 0,
				'articleDate' => $date
			);
			$data['artcategs'] = $this->Article_model->getactivecategs();
			if ($this->form_validation->run() == FALSE){
				$this->session->set_flashdata('message', '<div class="alert alert-danger"><strong>Warning!</strong><br />'.validation_errors().'</div>');
				$this->load->view('admin/templates/header' , $data);
				$this->load->view('admin/templates/topnav');
				$this->load->view('admin/templates/usernav');
				$this->load->view('admin/articles/create', $data);
				$this->load->view('admin/templates/footer');
			} else {
				/*Save to Database and return id*/
					if($inid = $this->Article_model->insert($table, $data['formcont'])){
						/*Images*/
						$config['upload_path'] = 'uploads/articles/';
						$config['allowed_types'] = 'gif|jpg|png|jpeg';
						$config['quality'] = '60%';
						$config['max_size'] = '300';
						$config['max_width'] = '1024';
						$config['max_height'] = '768';
						$filesCount = count($_FILES['articlefile']['name']);
						//$filesCount = $filesCount - 1;
						for($i = 0; $i < $filesCount; $i++){
								//echo "Hello";
								//die();
								$_FILES['file_name']['name'] = $_FILES['articlefile']['name'];
								$_FILES['file_name']['type'] = $_FILES['articlefile']['type'];
								$_FILES['file_name']['tmp_name'] = $_FILES['articlefile']['tmp_name'];
								$_FILES['file_name']['error'] = $_FILES['articlefile']['error'];
								$_FILES['file_name']['size'] = $_FILES['articlefile']['size'];
								$this->load->library('upload', $config);
								$this->upload->initialize($config);
									$temp = explode(".", $_FILES["file_name"]["name"]);
									$z = strtolower($this->input->post('atitle'));
									$z = preg_replace('/[^a-z0-9 -]+/', '', $z);
									$z = str_replace(' ', '-', $z);
									$nn = trim($z, '-');
									$nf = $nn."-".rand(1111,9999);
									$newfilename = $nf . '.' . end($temp);

									move_uploaded_file($_FILES["file_name"]["tmp_name"], "uploads/articles/" . $newfilename);
									$config['image_library'] = 'gd2';
									$config['source_image'] = 'uploads/articles/'.$newfilename;
									
							
									$config['wm_type'] = 'overlay';
									$config['wm_overlay_path'] = 'uploads/logo.png';
									//the overlay image

									$config['wm_opacity'] = 100;
									//$config['wm_padding'] = 50;
									$config['wm_vrt_alignment'] = 'bottom';
									$config['wm_hor_alignment'] = 'left';
									$this->image_lib->initialize($config);
									$this->image_lib->watermark();
									$image = $newfilename;
									$data['articleimg'] = array(
										'articleImage' => $image
									);
									$this->Article_model->updateimage($table, $data['articleimg'], $inid);
									}
									$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>Success!</strong>Data Successfully Saved!</div>');
									redirect('admin/articles/manage');
						}
						/*Images*/
					}
				/*Save to Database*/
				
			}
	}
}
