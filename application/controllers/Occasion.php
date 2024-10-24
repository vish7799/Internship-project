<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include "My_controller.php";

class Occasion extends My_controller {
	
	public function __construct(){
		parent::__construct();	
		$this->load->model("Home_model", "home");
		$this->load->model("Front_model", "front");
	}

	public function index($slug){		
		$post 							= 	$this->input->post();
		$page_data['products'] 			= 	$this->front->get_occasion_product($slug, $post);
		$page_data['cat_slug'] 			= 	$slug;
		if(isset($post['sorting'])){
			$page_data['sorting'] 			= 	$post['sorting'];
		}else{
			$page_data['sorting'] 			= 	'';
		}
		
		$page_data['title']				=	get_setting('meta_title');
		$page_data['meta_keywords']		=	get_setting('meta_keywords');
		$page_data['meta_description']	=	get_setting('meta_description');
		
		$page_data['page_name'] 		= 	'occasion/products';
		$page_data['page_title'] 		= 	'Occasion';
		$page_data['menu']		 		= 	'Occasion';
		$this->load->view('index',$page_data);	
	}
	
	public function listing(){
		
		$page_data['categories'] 		= 	$this->front->get_all_category();
		
		$page_data['title']				=	get_setting('meta_title');
		$page_data['meta_keywords']		=	get_setting('meta_keywords');
		$page_data['meta_description']	=	get_setting('meta_description');
		
		$page_data['page_name'] 		= 	'category/listing';
		$page_data['page_title'] 		= 	'Category Listing';
		$page_data['menu']		 		= 	'Category Listing';
		$this->load->view('index',$page_data);	
	}
	
	
	
}
