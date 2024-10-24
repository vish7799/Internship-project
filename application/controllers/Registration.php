<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include "My_controller.php";

class Registration extends CI_Controller {

	function __construct(){
		parent::__construct();	
		$this->load->model("Registration_model","registration");
	}

	public function index()
	{
		if($this->session->userdata('user')){
			redirect('/');
		}
		
		$this->form_validation->set_rules('firstname', 'First Name', 'required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'required');
		$this->form_validation->set_rules('mobile_number', 'Mobile Number', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
		$this->form_validation->set_rules('passwordConfirm', 'Confirm Password', 'required|min_length[6]|matches[password]');
		$this->form_validation->set_rules('terms_conditions', 'Terms and conditions', 'required');
		
		if ($this->form_validation->run() == FALSE){
			
			$page_data['title']				=	get_setting('meta_title');
			$page_data['meta_keywords']		=	get_setting('meta_keywords');
			$page_data['meta_description']	=	get_setting('meta_description');
			
			$page_data['page_name'] 		= 	'registration';
			$page_data['page_title'] 		= 	'Registration';
			$page_data['menu']		 		= 	'Registration';
			$this->load->view('index',$page_data);	
			
		}else{
			
			$post = $this->input->post();
			
			$post['status']							=	1;
			$post['is_verified']					=	1;
			$post['created']						=	time();
			$post['modified']						=	time();
			$post['password']						=	sha1($post['password']);
			
			unset($post['passwordConfirm']);
			unset($post['terms_conditions']);
			$this->registration->add_user($post);
			
			$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Message!</h4>You are Register successfully, Please login.</div>');
			
			redirect(site_url()."login");
		}
	}
	
	
}
