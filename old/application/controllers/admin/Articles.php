<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articles extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
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
		$this->form_validation->set_rules('parentCategId','Parent Category','required');
		$infeed = array(
			'categoryName' => $this->input->post('categoryName'),
			'parentCategId' => $this->input->post('parentCategId'),
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
		$this->form_validation->set_rules('parentCategId','Parent Category','required');
		$infeed = array(
			'categoryName' => $this->input->post('categoryName'),
			'parentCategId' => $this->input->post('parentCategId'),
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
}
