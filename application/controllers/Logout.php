<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include "My_controller.php";

class Logout extends My_controller {
	
	public function __construct()
	{
		parent::__construct();	
		
	}

	public function index($page = 1){
		if(!$this->session->userdata('user')){
			$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Invalid access.</div>');
			
			redirect('/');
		}else{
			$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>You have logout successfully.</div>');
			$this->session->unset_userdata('user');			
			$this->session->unset_userdata('cartdata');			
			$this->session->unset_userdata('page');			
			$this->session->unset_userdata('user_login');			
			redirect('/');
		}
	}
}
