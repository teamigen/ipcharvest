<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data['banners'] = $this->Banner_model->getallactive();
		$data['themesettings'] = $this->Theme_model->getthemedata();
		$data['topmenuitems'] = $this->Theme_model->gettopmenu();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/homebanner');
		$this->load->view('home');
		$this->load->view('templates/footer');
	}
}
