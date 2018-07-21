<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Theme extends CI_Controller {

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
		$data['pageitems'] = array(
		'browser-title' => "Theme Settings - Sanctuary Church Solutions",
		'pagehead' => "Theme Settings - Manage Theme",
		'panelhead1' => "Manage Theme",
		);
		$data['themesettings'] = $this->Theme_model->getthemedata();
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/topnav');
		$this->load->view('admin/templates/usernav');
		$this->load->view('admin/themesettings/theme', $data);
		$this->load->view('admin/templates/footer');
	}
	public function updatetheme(){
		$ow = $this->input->post('onewelcomeline');
		$ob = $this->input->post('onebigline');
		$op = $this->input->post('onesmallparagraph');
		
		//$ow = $ob = $op = "Hello";
		
		$data = array(
			'one-welcomeline' => $ow,
			'one-bigline' => $ob,
			'one-smallparagraph' => $op,
		);
		if($this->Theme_model->updatethemedata($data)){
				echo "<div class=\"alert alert-success\" style=\"margin-top:20px;\"><strong>Success! </strong>Theme Data Updated Successfully</div>";
		} else {
				echo "<div class=\"alert alert-danger\" style=\"margin-top:20px;\"><strong>Warning! </strong>Theme Data Updation Met with Some Error! Please contact the administrator</div>";
		}
	}
	public function updatepastordata(){
		$this->form_validation->set_rules('pastorsmessagetitle', 'Pastor Section Title', 'required'); 
		$this->form_validation->set_rules('pastorsname', 'Pastors Name', 'required'); 
		$this->form_validation->set_rules('desig', 'Pastors Designation', 'required'); 
		
		
		
		if ($this->form_validation->run() == FALSE){
			
		} else {
			
			/*Images*/
			
		
			if (isset($_FILES['myuploadfiles']) && is_uploaded_file($_FILES['myuploadfiles']['tmp_name'])) {
			$config['upload_path'] = 'uploads/theme/';
			if(!is_dir($config['upload_path'])) mkdir($config['upload_path'], 0777, TRUE);
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['quality'] = '60%';
			$config['max_size'] = '300';
			$config['width'] = '200';
			$config['height'] = '300';
			$filesCount = count($_FILES['myuploadfiles']['name']);
			$_FILES['file_name']['name'] = $_FILES['myuploadfiles']['name'];
			$_FILES['file_name']['type'] = $_FILES['myuploadfiles']['type'];
			$_FILES['file_name']['tmp_name'] = $_FILES['myuploadfiles']['tmp_name'];
			$_FILES['file_name']['error'] = $_FILES['myuploadfiles']['error'];
			$_FILES['file_name']['size'] = $_FILES['myuploadfiles']['size'];
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				$temp = explode(".", $_FILES["file_name"]["name"]);
				$z = strtolower($this->input->post('pastorsname'));
				$z = preg_replace('/[^a-z0-9 -]+/', '', $z);
				$z = str_replace(' ', '-', $z);
				$nn = trim($z, '-');
				$nf = $nn."-".rand(1111,9999);
				$newfilename = $nf . '.' . end($temp);
				move_uploaded_file($_FILES["file_name"]["tmp_name"], "uploads/theme/" . $newfilename);
				$imagex = $newfilename;
				$image = "uploads/theme/".$newfilename;
				$config_manip = array(
					'image_library' => 'gd2',
					'source_image'  => $image,
					'new_image'     => $image,
					'maintain_ratio'=> TRUE ,
					'create_thumb'  => TRUE ,
					'thumb_marker'  => '_thumb' ,
					'width'         => 150,
					'height'        => 150 
				);
				$this->load->library('image_lib', $config_manip);
				$this->image_lib->resize();
			} else {
				$imagex = $this->Theme_model->getthemedata()['pastorimage'];
			}
				$table = "themesettings";
				$data = array(
					'pmtitle' => $this->input->post('pastorsmessagetitle'),
					'pastorname' => $this->input->post('pastorsname'),
					'pastordesig' => $this->input->post('desig'),
					'pastorimage' => $imagex,
					'pastormessage' => $this->input->post('pastorsmessage')
				);
				
				
				$this->Theme_model->updatethemedata($table, $data);

			$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>Success!</strong>Data Successfully Saved!</div>');
			redirect('admin/theme');
		}
	}
	public function updatefounderdata(){
		$this->form_validation->set_rules('foundersmessagetitle', 'Founder Section Title', 'required'); 
		$this->form_validation->set_rules('foundersname', 'Founders Name', 'required'); 
		$this->form_validation->set_rules('founddesig', 'Founders Designation', 'required'); 
		
		
		
		if ($this->form_validation->run() == FALSE){
			
		} else {
			
			/*Images*/
			
		
			if (isset($_FILES['myuploadfiles']) && is_uploaded_file($_FILES['myuploadfiles']['tmp_name'])) {
			$config['upload_path'] = 'uploads/theme/';
			if(!is_dir($config['upload_path'])) mkdir($config['upload_path'], 0777, TRUE);
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['quality'] = '60%';
			$config['max_size'] = '300';
			$config['width'] = '200';
			$config['height'] = '300';
			$filesCount = count($_FILES['myuploadfiles']['name']);
			$_FILES['file_name']['name'] = $_FILES['myuploadfiles']['name'];
			$_FILES['file_name']['type'] = $_FILES['myuploadfiles']['type'];
			$_FILES['file_name']['tmp_name'] = $_FILES['myuploadfiles']['tmp_name'];
			$_FILES['file_name']['error'] = $_FILES['myuploadfiles']['error'];
			$_FILES['file_name']['size'] = $_FILES['myuploadfiles']['size'];
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				$temp = explode(".", $_FILES["file_name"]["name"]);
				$z = strtolower($this->input->post('pastorsname'));
				$z = preg_replace('/[^a-z0-9 -]+/', '', $z);
				$z = str_replace(' ', '-', $z);
				$nn = trim($z, '-');
				$nf = $nn."-".rand(1111,9999);
				$newfilename = $nf . '.' . end($temp);
				move_uploaded_file($_FILES["file_name"]["tmp_name"], "uploads/theme/" . $newfilename);
				$imagex = $newfilename;
				$image = "uploads/theme/".$newfilename;
				$config_manip = array(
					'image_library' => 'gd2',
					'source_image'  => $image,
					'new_image'     => $image,
					'maintain_ratio'=> TRUE ,
					'create_thumb'  => TRUE ,
					'thumb_marker'  => '_thumb' ,
					'width'         => 150,
					'height'        => 150 
				);
				$this->load->library('image_lib', $config_manip);
				$this->image_lib->resize();
			} else {
				$imagex = $this->Theme_model->getthemedata()['founderimage'];
			}
				$table = "themesettings";
				$data = array(
					'fmtitle' => $this->input->post('foundersmessagetitle'),
					'foundername' => $this->input->post('foundersname'),
					'founddesig' => $this->input->post('founddesig'),
					'founderimage' => $imagex,
					'foundermessage' => $this->input->post('foundermessage')
				);
				
				
				$this->Theme_model->updatethemedata($table, $data);

			$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>Success!</strong>Data Successfully Saved!</div>');
			redirect('admin/theme');
		}
	}
}
