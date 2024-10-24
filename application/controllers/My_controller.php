<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class My_controller extends CI_Controller {

    function __construct()
    {
		parent::__construct();
		
		
    }
	
	function check_login(){
		
		if ($this->session->userdata('admin_login') != 1) {
            redirect(base_url().'admin/login', 'refresh');
        }
	}
}
