<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|callback_check_login['.$this->input->post('username').']');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('admin/login');
		}
		else
		{
			redirect('admin/dashboard');
		}
		
	}
	
	function check_login($password,$username){
		if($this->crud->check_login($username,$password)){
			return true;
		}else{
			$this->form_validation->set_message('check_login', 'Username or password is wrong.');
			return false;
		}
	}
	
	function logout(){
		unset($_SESSION['admin_login']);
		unset($_SESSION['admin']);
		redirect('admin/login');
	}
	
}
