<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include "My_controller.php";

class Mostloved extends My_controller {
	
	public function __construct()
	{
		parent::__construct();	
		$this->load->model("Home_model", "home");
		$this->load->model("Front_model", "front");

	}

	
	public function index(){
		
		$post 							= 	$this->input->post();
		$page_data['products'] 			= 	$this->front->get_mostloved($post);
		if(isset($post['sorting'])){
			$page_data['sorting'] 			= 	$post['sorting'];
		}else{
			$page_data['sorting'] 			= 	'';
		}
		
		$page_data['title']				=	get_setting('meta_title');
		$page_data['meta_keywords']		=	get_setting('meta_keywords');
		$page_data['meta_description']	=	get_setting('meta_description');
		
		$page_data['page_name'] 		= 	'mostloved/index';
		$page_data['page_title'] 		= 	'Most Love';
		$page_data['menu']		 		= 	'Most Love';
		$this->load->view('index',$page_data);	
	}
	
}
