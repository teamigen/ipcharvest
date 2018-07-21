<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
		$data['banners'] = $this->Banner_model->getallactive();
		$data['themesettings'] = $this->Theme_model->getthemedata();
		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('templates/homebanner', $data);
		$this->load->view('home');
		$this->load->view('templates/footer');
	}
}
