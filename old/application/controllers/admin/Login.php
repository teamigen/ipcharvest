<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('admin/login');
	}
	public function authorize(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$count = count($this->Login_model->checklogin($username, $password));
		$user = $this->Login_model->checklogin($username, $password)['User'];
		$data['user'] = $user;
		if($count > 0){
			setcookie('sanctuary-user', $user, time() + (86400 * 30), "/");
			redirect('admin/dashboard');
		}
	}
	public function authorizeout(){
		delete_cookie('sanctuary');
        delete_cookie('sanctuary_admin');
        redirect('admin/login');
	}
}
