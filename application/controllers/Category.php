<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include "My_controller.php";

class Category extends My_controller {
	
	public function __construct()
	{
		parent::__construct();	
		$this->load->model("Home_model", "home");
		$this->load->model("Front_model", "front");

	}

	
	public function index($slug){
		
		$post 							= 	$this->input->post();
		$page_data['products'] 			= 	$this->front->get_category_product($slug, $post);
		$page_data['cat_slug'] 			= 	$slug;
		if(isset($post['sorting'])){
			$page_data['sorting'] 			= 	$post['sorting'];
		}else{
			$page_data['sorting'] 			= 	'';
		}
		
		$page_data['title']				=	get_setting('meta_title');
		$page_data['meta_keywords']		=	get_setting('meta_keywords');
		$page_data['meta_description']	=	get_setting('meta_description');
		
		$page_data['canonical']			=	"https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$page_data['og_url']			=	"https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$page_data['og_title']			=	get_setting('meta_title');
		$page_data['og_description']	=	get_setting('meta_description');
		$page_data['og_site_name']		=	"Company DISCOUNT Shop";
		$page_data['og_type']			=	"website";
		$page_data['og_image']			=	site_url()."assets/img/logo.png";
		$page_data['data1']				=	$page_data['title'];
		
		$page_data['page_name'] 		= 	'category/products';
		$page_data['page_title'] 		= 	'Category';
		$page_data['menu']		 		= 	'Category';
		$this->load->view('index',$page_data);	
	}
	
	public function listing(){
		
		$page_data['categories'] 		= 	$this->front->get_all_category();
		
		$page_data['title']				=	get_setting('meta_title');
		$page_data['meta_keywords']		=	get_setting('meta_keywords');
		$page_data['meta_description']	=	get_setting('meta_description');
		
		$page_data['canonical']			=	"https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$page_data['og_url']			=	"https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$page_data['og_title']			=	get_setting('meta_title');
		$page_data['og_description']	=	get_setting('meta_description');
		$page_data['og_site_name']		=	"Company DISCOUNT Shop";
		$page_data['og_type']			=	"website";
		$page_data['og_image']			=	site_url()."assets/img/logo.png";
		$page_data['data1']				=	$page_data['title'];
		
		$page_data['page_name'] 		= 	'category/listing';
		$page_data['page_title'] 		= 	'Category Listing';
		$page_data['menu']		 		= 	'Category Listing';
		$this->load->view('index',$page_data);	
	}
	
	
	
}
