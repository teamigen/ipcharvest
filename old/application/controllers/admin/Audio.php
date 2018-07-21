<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Audio extends CI_Controller {

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
		redirect(base_url().'admin/audio/manage/');
	}
	public function manage()
	{
		$data['pageitems'] = array(
		'browser-title' => "Manage Audios - Sanctuary Church Solutions",
		'pagehead' => "Audio - Manage Audio",
		'panelhead1' => "Manage Audio",
		);
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/topnav');
		$this->load->view('admin/templates/usernav');
		$this->load->view('admin/audio/manage', $data);
		$this->load->view('admin/templates/footer');
	}
	public function create()
	{
		$data['pageitems'] = array(
		'browser-title' => "Create Audio - Sanctuary Church Solutions",
		'pagehead' => "Audio - New",
		'panelhead1' => "New Audio",
		'buttontext1' => "Save Audio File",
		);
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/topnav');
		$this->load->view('admin/templates/usernav');
		$this->load->view('admin/audio/create', $data);
		$this->load->view('admin/templates/footer');
	}
	public function categories()
	{
		$data['pageitems'] = array(
		'browser-title' => "Manage Audio Categories - Sanctuary Church Solutions",
		'pagehead' => "Audio Categories - Create & Manage",
		'panelhead1' => "Create Category",
		'panelhead2' => "Manage Category",
		'buttontext1' => "Save Category",
		);
		$this->load->view('admin/templates/header' , $data);
		$this->load->view('admin/templates/topnav');
		$this->load->view('admin/templates/usernav');
		$this->load->view('admin/audio/categories', $data);
		$this->load->view('admin/templates/footer');
	}
	
}
