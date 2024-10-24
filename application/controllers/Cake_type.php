<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include "My_controller.php";

class Cake_type extends My_controller {
	
	public function __construct()
	{
		parent::__construct();	
		$this->load->model("Home_model", "home");
		$this->load->model("Front_model", "front");

	}

	public function index($page = 1)
	{
		$page_data['ctypes'] 			= 	$this->front->get_ctype();
		
		$page_data['title']				=	get_setting('meta_title');
		$page_data['meta_keywords']		=	get_setting('meta_keywords');
		$page_data['meta_description']	=	get_setting('meta_description');
		
		$page_data['page_name'] 		= 	'ctype/index';
		$page_data['page_title'] 		= 	'Cake Type';
		$page_data['menu']		 		= 	'Cake Type';
		$this->load->view('index',$page_data);	
	}
	
	public function products($slug){
		
		$post 							= 	$this->input->post();
		$page_data['products'] 			= 	$this->front->get_products_ctype($slug, $post);
		$page_data['ct_slug'] 			= 	$slug;
		if(isset($post['sorting'])){
			$page_data['sorting'] 			= 	$post['sorting'];
		}else{
			$page_data['sorting'] 			= 	'';
		}
		$page_data['title']				=	get_setting('meta_title');
		$page_data['meta_keywords']		=	get_setting('meta_keywords');
		$page_data['meta_description']	=	get_setting('meta_description');
		
		$page_data['page_name'] 		= 	'ctype/products';
		$page_data['page_title'] 		= 	'Cake Type';
		$page_data['menu']		 		= 	'Cake Type';
		$this->load->view('index',$page_data);	
	}
	
}
