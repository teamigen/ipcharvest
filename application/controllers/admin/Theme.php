<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Theme extends CI_Controller {

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
		$this->load->view('admin/ThemeSettings/theme', $data);
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
	public function saveblogsection(){
		$fvb = $this->input->post('fivebigline');
		$fvw = $this->input->post('fivewelcomeline');
		$fsp = $this->input->post('fivesmallparagraph');
		$data = array(
			'fivebigline' => $fvb,
			'fivewelcomeline' => $fvw,
			'fivesmallparagraph' => $fsp,
		);
		$table = "themesettings";
		if($this->Theme_model->updatethemedata($table, $data)){
				$this->session->set_flashdata('message', '<div class=\"alert alert-success\" style=\"margin-top:20px;\"><strong>Success! </strong>Theme Data Updated Successfully</div>');
				redirect('admin/theme');
		} else {
				$this->session->set_flashdata('message', '<div class=\"alert alert-danger\" style=\"margin-top:20px;\"><strong>Warning! </strong>There was some error! Please try again</div>');
				redirect('admin/theme');
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
				$newfilename = $nn . '.' . end($temp);
				move_uploaded_file($_FILES["file_name"]["tmp_name"], "uploads/theme/" . $newfilename);
			
			
			$imagex = $newfilename;
			$imagey = $nf."_thumb.". end($temp);
			$image = "uploads/theme/".$newfilename;
			$cimage = "uploads/theme/cimage/".$newfilename;
			$timage = "uploads/theme/timage/".$newfilename;
			
			// clear config array
			$config = array();

			// create resized image
			$config['image_library'] = 'GD2';
			$config['source_image']	= $image;
			$config['new_image'] = $cimage;
			$config['create_thumb'] = false;
			$config['maintain_ratio'] = false;
			$config['width'] = 200;
			$config['height'] = 300;

			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			//$this->image_lib->display_errors();

			$this->image_lib->clear();

			$config = array();

			// create thumb
			$config['image_library'] = 'GD2';
			$config['source_image']	= $image;
			$config['new_image'] = $timage;
			$config['create_thumb'] = false;
			$config['maintain_ratio'] = true;
			$config['width'] = 150;
			$config['height'] = 150;

			$this->image_lib->initialize($config);
			$this->image_lib->resize();

			//$this->image_lib->display_errors();
			} else {
				$imagex = $this->Theme_model->getthemedata()['founderimage'];
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
			$filesCount = count($_FILES['myuploadfiles']['name']);
			$_FILES['file_name']['name'] = $_FILES['myuploadfiles']['name'];
			$_FILES['file_name']['type'] = $_FILES['myuploadfiles']['type'];
			$_FILES['file_name']['tmp_name'] = $_FILES['myuploadfiles']['tmp_name'];
			$_FILES['file_name']['error'] = $_FILES['myuploadfiles']['error'];
			$_FILES['file_name']['size'] = $_FILES['myuploadfiles']['size'];
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				$temp = explode(".", $_FILES["file_name"]["name"]);
				$z = strtolower($this->input->post('foundersname'));
				$z = preg_replace('/[^a-z0-9 -]+/', '', $z);
				$z = str_replace(' ', '-', $z);
				$nn = trim($z, '-');
				$newfilename = $nn . '.' . end($temp);
				move_uploaded_file($_FILES["file_name"]["tmp_name"], "uploads/theme/" . $newfilename);
			
			
			$imagex = $newfilename;
			$imagey = $nf."_thumb.". end($temp);
			$image = "uploads/theme/".$newfilename;
			$cimage = "uploads/theme/cimage/".$newfilename;
			$timage = "uploads/theme/timage/".$newfilename;
			
			// clear config array
			$config = array();

			// create resized image
			$config['image_library'] = 'GD2';
			$config['source_image']	= $image;
			$config['new_image'] = $cimage;
			$config['create_thumb'] = false;
			$config['maintain_ratio'] = false;
			$config['width'] = 200;
			$config['height'] = 300;

			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			//$this->image_lib->display_errors();

			$this->image_lib->clear();

			$config = array();

			// create thumb
			$config['image_library'] = 'GD2';
			$config['source_image']	= $image;
			$config['new_image'] = $timage;
			$config['create_thumb'] = false;
			$config['maintain_ratio'] = true;
			$config['width'] = 150;
			$config['height'] = 150;

			$this->image_lib->initialize($config);
			$this->image_lib->resize();

			//$this->image_lib->display_errors();
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
	public function updatesepone(){
			if (isset($_FILES['seponefiles']) && is_uploaded_file($_FILES['seponefiles']['tmp_name'])) {
			$filesCount = count($_FILES['seponefiles']['name']);
			$_FILES['file_name']['name'] = $_FILES['seponefiles']['name'];
			$_FILES['file_name']['type'] = $_FILES['seponefiles']['type'];
			$_FILES['file_name']['tmp_name'] = $_FILES['seponefiles']['tmp_name'];
			$_FILES['file_name']['error'] = $_FILES['seponefiles']['error'];
			$_FILES['file_name']['size'] = $_FILES['seponefiles']['size'];
			$temp = explode(".", $_FILES["file_name"]["name"]);
			$z = "sanctuary church solutions";
			$z = preg_replace('/[^a-z0-9 -]+/', '', $z);
			$z = str_replace(' ', '-', $z);
			$nn = trim($z, '-');
			$nf = $nn."-".rand(11111,99999);
			$newfilename = $nf . '.' . end($temp);
			move_uploaded_file($_FILES["file_name"]["tmp_name"], "uploads/theme/" . $newfilename);
			$imagex = $newfilename;
			$imagey = $nf."_thumb.". end($temp);
			$image = "uploads/theme/".$newfilename;
			$cimage = "uploads/theme/cimage/".$newfilename;
			$timage = "uploads/theme/timage/".$newfilename;
			
			// clear config array
			$config = array();

			// create resized image
			$config['image_library'] = 'GD2';
			$config['source_image']	= $image;
			$config['new_image'] = $cimage;
			$config['create_thumb'] = false;
			$config['maintain_ratio'] = false;
			$config['width'] = 1500;
			$config['height'] = 280;

			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			//$this->image_lib->display_errors();

			$this->image_lib->clear();

			$config = array();

			// create thumb
			$config['image_library'] = 'GD2';
			$config['source_image']	= $image;
			$config['new_image'] = $timage;
			$config['create_thumb'] = false;
			$config['maintain_ratio'] = true;
			$config['width'] = 150;
			$config['height'] = 150;

			$this->image_lib->initialize($config);
			$this->image_lib->resize();

			//$this->image_lib->display_errors();
			
			} else {
				$imagex = $this->Theme_model->getthemedata()['sepone'];
				$imagey = $this->Theme_model->getthemedata()['sepone_t'];
			}
				$table = "themesettings";
				$data = array(
					'sepone' => $imagex,
					'sepone_t' => $imagex
				);

				$this->Theme_model->updatethemedata($table, $data);

			$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>Success!</strong>Data Successfully Saved!</div>');
			redirect('admin/theme');

	}
	public function updateseptwo(){
			if (isset($_FILES['septwofiles']) && is_uploaded_file($_FILES['septwofiles']['tmp_name'])) {
			$filesCount = count($_FILES['septwofiles']['name']);
			$_FILES['file_name']['name'] = $_FILES['septwofiles']['name'];
			$_FILES['file_name']['type'] = $_FILES['septwofiles']['type'];
			$_FILES['file_name']['tmp_name'] = $_FILES['septwofiles']['tmp_name'];
			$_FILES['file_name']['error'] = $_FILES['septwofiles']['error'];
			$_FILES['file_name']['size'] = $_FILES['septwofiles']['size'];
			$temp = explode(".", $_FILES["file_name"]["name"]);
			$z = "sanctuary church solutions";
			$z = preg_replace('/[^a-z0-9 -]+/', '', $z);
			$z = str_replace(' ', '-', $z);
			$nn = trim($z, '-');
			$nf = $nn."-".rand(11111,99999);
			$newfilename = $nf . '.' . end($temp);
			move_uploaded_file($_FILES["file_name"]["tmp_name"], "uploads/theme/" . $newfilename);
			$imagex = $newfilename;
			$imagey = $nf."_thumb.". end($temp);
			$image = "uploads/theme/".$newfilename;
			$cimage = "uploads/theme/cimage/".$newfilename;
			$timage = "uploads/theme/timage/".$newfilename;
			
			// clear config array
			$config = array();

			// create resized image
			$config['image_library'] = 'GD2';
			$config['source_image']	= $image;
			$config['new_image'] = $cimage;
			$config['create_thumb'] = false;
			$config['maintain_ratio'] = false;
			$config['width'] = 1500;
			$config['height'] = 280;

			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			//$this->image_lib->display_errors();

			$this->image_lib->clear();

			$config = array();

			// create thumb
			$config['image_library'] = 'GD2';
			$config['source_image']	= $image;
			$config['new_image'] = $timage;
			$config['create_thumb'] = false;
			$config['maintain_ratio'] = true;
			$config['width'] = 150;
			$config['height'] = 150;

			$this->image_lib->initialize($config);
			$this->image_lib->resize();

			//$this->image_lib->display_errors();
			
			} else {
				$imagex = $this->Theme_model->getthemedata()['septwo'];
				$imagey = $this->Theme_model->getthemedata()['septwo_t'];
			}
				$table = "themesettings";
				$data = array(
					'septwo' => $imagex,
					'septwo_t' => $imagex
				);

				$this->Theme_model->updatethemedata($table, $data);

			$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>Success!</strong>Data Successfully Saved!</div>');
			redirect('admin/theme');

	}
	public function updatecontactdata(){
		$cn = $this->input->post('churchname');
		$a1 = $this->input->post('add1');
		$a2 = $this->input->post('add2');
		$a3 = $this->input->post('add3');
		$a4 = $this->input->post('add4');
		$a5 = $this->input->post('add5');
		$p1 = $this->input->post('phone1');
		$p2 = $this->input->post('phone2');
		$mail = $this->input->post('email');
		$map = $this->input->post('map');
		$data = array(
			'churchname' => $cn,
			'add1' => $a1,
			'add2' => $a2,
			'add3' => $a3,
			'add4' => $a4,
			'add5' => $a5,
			'phone1' => $p1,
			'phone2' => $p2,
			'email' => $mail,
			'map' => $map,
		);
		$table = "themesettings";
		if($this->Theme_model->updatethemedata($table, $data)){
				$this->session->set_flashdata('message', '<div class=\"alert alert-success\" style=\"margin-top:20px;\"><strong>Success! </strong>Theme Data Updated Successfully</div>');
				redirect('admin/theme');
		} else {
				$this->session->set_flashdata('message', '<div class=\"alert alert-danger\" style=\"margin-top:20px;\"><strong>Warning! </strong>There was some error! Please try again</div>');
				redirect('admin/theme');
		}
	}
	public function socialmedia(){
		$fb = $this->input->post('fb');
		$tw = $this->input->post('tw');
		$insta = $this->input->post('insta');
		$gp = $this->input->post('gp');
		$data = array(
			'fb' => $fb,
			'tw' => $tw,
			'insta' => $insta,
			'gp' => $gp,
		);
		$table = "themesettings";
		if($this->Theme_model->updatethemedata($table, $data)){
				$this->session->set_flashdata('message', '<div class=\"alert alert-success\" style=\"margin-top:20px;\"><strong>Success! </strong>Theme Data Updated Successfully</div>');
				redirect('admin/theme');
		} else {
				$this->session->set_flashdata('message', '<div class=\"alert alert-danger\" style=\"margin-top:20px;\"><strong>Warning! </strong>There was some error! Please try again</div>');
				redirect('admin/theme');
		}
	}
}
