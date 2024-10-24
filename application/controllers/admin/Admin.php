<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include "My_controller.php";

class Admin extends My_controller {

	function __construct(){
		parent::__construct();	
		$this->load->model("admin/Admin_model","admin");
	}
	public function index($page = 1)
	{
		$this->form_validation->set_rules('current_password', 'Current Password', 'required|callback_password_check');
		$this->form_validation->set_rules('new_password', 'New Password', 'required');
		$this->form_validation->set_rules('new_password2', 'Repeat Password', 'required|matches[new_password]');
		if ($this->form_validation->run() == FALSE)
		{
			$page_data['page_name'] = 'admin/index';
			$page_data['page_title'] = 'Admin';
			$page_data['menu']		 	= 'Admin';
			$this->load->view('admin/index',$page_data);
		}else{
			$post = $this->input->post();
			$this->admin->update_password($post);
			$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Message!</h4>Password changed successfully.</div>');
			redirect('admin/admin');
		}
	}
	
	function password_check($str){
		$data = $this->admin->check_password($str);
		if (!$data)
		{
				$this->form_validation->set_message('password_check', 'The {field} is not valid.');
				return FALSE;
		}
		else
		{
				return TRUE;
		}
	}
		
}
