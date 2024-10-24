<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include "My_controller.php";

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();	
		$this->load->model("Login_model","login");
	}

	public function index(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|callback_check_login['.$this->input->post('email').']');
		if ($this->form_validation->run() == FALSE)
		{
			$page_data['title']				=	get_setting('meta_title');
			$page_data['meta_keywords']		=	get_setting('meta_keywords');
			$page_data['meta_description']	=	get_setting('meta_description');
			
			$page_data['page_name'] 		= 	'login';
			$page_data['page_title'] 		= 	'Login';
			$page_data['menu']		 		= 	'Login';
			$this->load->view('index',$page_data);	
		
		}else{
			if(isset($_SESSION['page']) && $_SESSION['page'] != ""){			
				redirect(site_url().$_SESSION['page']);
			}else{
				redirect(site_url().'user');
			}
		}
	}
	
	function check_login($password,$username){
		if($this->login->check_login($username,$password)){
			return true;
		}else{
			$this->form_validation->set_message('check_login', 'Username or password is wrong.');
			return false;
		}
	}
	
	
}
