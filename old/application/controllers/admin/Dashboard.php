<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

public function index(){
	$this->load->view('admin/templates/header');
	$this->load->view('admin/templates/topnav');
	$this->load->view('admin/templates/usernav');
	$this->load->view('admin/dashboard/dash');
	$this->load->view('admin/templates/footer');
}



			
}
