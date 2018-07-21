<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends CI_Controller {
	public function __construct(){
	  parent::__construct();
	  $this->load->model('Banner_model');
	}
	
	
	public function create() {
		if(isset($_COOKIE['sanctuary-user'])){
		$this->load->helper('url');
		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/topnav');
		$this->load->view('admin/templates/usernav');
		$this->load->view('admin/banner/create');
        $this->load->view('admin/templates/footer');
		} else {
			redirect('admin/login');
		}
	}
	public function manage() {
		$this->load->helper('url');
		if(isset($_COOKIE['sanctuary-user'])){
		$data['banners'] = $this->Banner_model->getall();
		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/topnav');
		$this->load->view('admin/templates/usernav');
		$this->load->view('admin/banner/manage', $data);
        $this->load->view('admin/templates/footer');
		} else {
			redirect('admin/login');
		}
	}
	public function savebanner(){
		if($_POST){
			$table = "banner";
			$this->form_validation->set_rules('bannertitle','Banner Title','trim|required|is_unique[banner.bannertitle]');
			$this->form_validation->set_rules('userFiles', 'File', 'trim|xss_clean');
			
			if ($this->form_validation->run() == TRUE) 
			{
				if(isset($_FILES["userFiles"]["name"]))
				{
					$uppath = 'uploads/banners';
					$config['upload_path'] = $uppath;
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					if(!is_dir($config['upload_path'])) mkdir($config['upload_path'], 0777, TRUE);
					//var_dump($config);
					//die();
					
					
					$this->upload->initialize($config);
					//$this->upload->initialize($config);
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger"><strong>Warning!</strong><br />Hey! Did you really upload the banner?</div>');
					redirect('admin/banner/create');
				}
				 if (!$this->upload->do_upload('userFiles'))
						{
							$this->session->set_flashdata('message', $data['error'] = $this->upload->display_errors('<div class="alert alert-danger">
				<strong>Warning!</strong><br />', '</div>'));
							redirect('admin/banner/create');
						} else {
							
							$data = $this->upload->data();
							//var_dump($data);
							//die();
							
							$z = strtolower($this->input->post('bannertitle'));
							$z = preg_replace('/[^a-z0-9 -]+/', '', $z);
							$z = str_replace(' ', '-', $z);
							$nn = trim($z, '-');

							
							$config['image_library'] = 'gd2';
							$config['source_image'] = 'uploads/banners/'.$data["file_name"];
							$path = 'uploads/banners/'.$data["file_name"];
							$newName = $nn.".".pathinfo($path, PATHINFO_EXTENSION);
							$config['encrypt_name'] = TRUE;
							$config['createthumb'] = FALSE;
							$config['maintain_ratio'] = FALSE;
							$config['width'] = 1500;
							$config['height'] = 600;
							$config['quality'] = '60%';
							$config['new_image'] = $newName;
							$this->load->library('image_lib', $config);
							$this->image_lib->initialize($config);
							$this->image_lib->resize();
							unlink($path);
								if ($this->input->post('readmorelink') == "") {
									$readmore = "#";
								} else {
									$readmore = $this->input->post('readmorelink');
								}
							$data = array(
							'bannertitle' => $this->input->post('bannertitle'),
							'readmorelink' => $readmore,
							'image' => $newName
							);
							$this->Banner_model->insert($table, $data);
							$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>Success!</strong><br />File Resized and Uploaded</div>');
							redirect('admin/banner/manage');
							
							
						}
			} else {
					//Form not valid
					$this->session->set_flashdata('message', '<div class="alert alert-danger"><strong>Warning!</strong><br />'.validation_errors().'</div>');
					redirect('admin/banner/create');
			}
			} else {
echo "Error 6";
					die();
			}
				
					
						
	}
	
	
	public function activate() {
		$table = "banner";
		$data = array(
			'active' => 1
		);
		$id = $this->uri->segment(4);
		$this->Banner_model->activation($table, $data, $id);
		redirect('admin/banner/manage', 'refresh');
	}
	public function inactivate() {
		$table = "banner";
		$data = array(
			'active' => 0
		);
		$id = $this->uri->segment(4);
		$this->Banner_model->activation($table, $data, $id);
		redirect('admin/banner/manage', 'refresh');
	}
	public function delete() {
		$table = "banner";
		$id = $this->uri->segment(4);
		$this->Banner_model->delete($table, $id);
		redirect('admin/banner/manage', 'refresh');
	}
	
}
