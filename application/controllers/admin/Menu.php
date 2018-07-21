<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	public function index()
	{
		$data['pageitems'] = array(
		'browser-title' => "Theme Settings - Sanctuary Church Solutions",
		'pagehead' => "Theme Settings - Manage Theme",
		'panelhead1' => "Manage Theme",
		);
		$data['themesettings'] = $this->Theme_model->getthemedata();
		$data['allmenu'] = $this->Theme_model->getallmenu();
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/topnav');
		$this->load->view('admin/templates/usernav');
		$this->load->view('admin/ThemeSettings/menu-manage', $data);
		$this->load->view('admin/templates/footer');
	}
	public function activate() {
		$table = "menusettings";
		$data = array(
			'MenuActive' => 1
		);
		$id = $this->uri->segment(4);
		$this->Theme_model->activation($table, $data, $id);
		$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>Success!</strong> Successfully Activated!</div>');
		redirect('admin/menu', 'refresh');
	}
	public function inactivate() {
		$table = "menusettings";
		$data = array(
			'MenuActive' => 0
		);
		$id = $this->uri->segment(4);
		$this->Theme_model->activation($table, $data, $id);
		$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>Success!</strong> Successfully Inactivated!</div>');
		redirect('admin/menu', 'refresh');
	}
	public function delete() {
		$table1 = "menusettings";
		$id = $this->uri->segment(4);
			$id = $this->uri->segment(4);
			$this->Theme_model->delete($table1, $id);
			$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>Success!</strong> Successfully Deleted!</div>');
			redirect('admin/menu', 'refresh');
	}
	public function newmenu(){
		$data['parents'] = $this->Theme_model->getalltopmenu();
		$data['after'] = $this->Theme_model->getallmenu();

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/topnav');
		$this->load->view('admin/templates/usernav');
		$this->load->view('admin/ThemeSettings/menu-create', $data);
		$this->load->view('admin/templates/footer');
	}
	public function savemenuitem(){
		$table = "menusettings";
		$this->form_validation->set_rules('menuname','Menu Title','trim|required|is_unique[menusettings.menuname]');
		$this->form_validation->set_rules('parent','Parent Menu','trim|required');
		$this->form_validation->set_rules('after','Appear After','trim|required');
		$this->form_validation->set_rules('menulink','Menu Link','trim|required');
		
		$data['formcont'] = array(
			'menuname' => $this->input->post('menuname'),
			'parentid' => $this->input->post('parent'),
			'menuafter' => $this->input->post('after'),
			'MenuLink' => $this->input->post('menulink'),
		);
		if ($this->form_validation->run() == FALSE){
			$parent = $this->Theme_model->findthismenu($this->input->post('parent'))['menuname'];
			$after = $this->Theme_model->findthismenu($this->input->post('after'))['menuname'];
			$data['formcont'] = array(
				'menuname' => $this->input->post('menuname'),
				'parentid' => $this->input->post('parent'),
				'parent' => $parent,
				'after' => $after,
				'afterid' => $this->input->post('after'),
				'MenuLink' => $this->input->post('menulink'),
			);
			$this->session->set_flashdata('message', '<div class="alert alert-danger"><strong>Warning!</strong><br />'.validation_errors().'</div>');
			$data['parents'] = $this->Theme_model->getalltopmenu();
			$data['after'] = $this->Theme_model->getallmenu();

			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/templates/topnav');
			$this->load->view('admin/templates/usernav');
			$this->load->view('admin/ThemeSettings/menu-create', $data);
			$this->load->view('admin/templates/footer');
		} else {

			$this->Theme_model->insert($table, $data['formcont']);
			$this->session->set_flashdata('message', '<div class="alert alert-success"><strong> Awesome!</strong> Its Saved!</div>');
			redirect('admin/menu');
		}
	}
	public function updatemenu(){
		$id = $this->uri->segment(4);
		//$after = $this->Theme_model->findthismenu($this->input->post('after'))['menuname'];
		$formcont1 = $this->Theme_model->findthismenu($id);
		$sparent = $this->Theme_model->findthismenu($formcont1['parentid'])['menuname'];
		$safter = $this->Theme_model->findthismenu($formcont1['menuafter'])['menuname'];
		$formcont2 = array(
			'parent' => $sparent,
			'parentid' => $formcont1['parentid'],
			'after' => $safter,
			'afterid' => $formcont1['menuafter']
		);
		$data['formcont'] = array_merge($formcont1, $formcont2);
		$data['parents'] = $this->Theme_model->getalltopmenu();
		$data['after'] = $this->Theme_model->getallmenu();
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/topnav');
		$this->load->view('admin/templates/usernav');
		$this->load->view('admin/ThemeSettings/menu-create', $data);
		$this->load->view('admin/templates/footer');
	}
}
