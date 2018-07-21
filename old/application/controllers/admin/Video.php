<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends CI_Controller {

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
		redirect(base_url().'admin/video/manage/');
	}
	public function manage()
	{
		$data['pageitems'] = array(
		'browser-title' => "Manage Videos - Sanctuary Church Solutions",
		'pagehead' => "Videos - Manage Videos",
		'panelhead1' => "Manage Videos",
		);
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/topnav');
		$this->load->view('admin/templates/usernav');
		$this->load->view('admin/video/manage', $data);
		$this->load->view('admin/templates/footer');
	}
	public function create()
	{
		$data['pageitems'] = array(
		'browser-title' => "Create Videos - Sanctuary Church Solutions",
		'pagehead' => "Videos - Create",
		'panelhead1' => "New Videos",
		);
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/topnav');
		$this->load->view('admin/templates/usernav');
		$this->load->view('admin/video/create', $data);
		$this->load->view('admin/templates/footer');
	}
	public function categories()
	{
		$data['pageitems'] = array(
		'browser-title' => "Manage Video Categories - Sanctuary Church Solutions",
		'pagehead' => "Video Categories - Create & Manage",
		'panelhead1' => "Create Category",
		'panelhead2' => "Manage Category",
		);
		$this->load->view('admin/templates/header' , $data);
		$this->load->view('admin/templates/topnav');
		$this->load->view('admin/templates/usernav');
		$this->load->view('admin/articles/categories', $data);
		$this->load->view('admin/templates/footer');
	}
	
}
