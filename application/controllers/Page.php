<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include "My_controller.php";

class Page extends My_controller {
	
	public function __construct()
	{
		parent::__construct();	
		$this->load->model("Home_model", "home");
		$this->load->model("Front_model", "front");
	}

	public function cms($slug = ""){
	    $page_data['cat_slug'] 			= 	'';
		$page_data['page'] 				= 	$this->front->get_page_info($slug);

		$page_data['canonical']			=	"https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$page_data['og_url']			=	"https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$page_data['og_title']			=	get_setting('meta_title');
		$page_data['og_description']	=	get_setting('meta_description');
		$page_data['og_site_name']		=	"Company DISCOUNT Shop";
		$page_data['og_type']			=	"website";
		$page_data['og_image']			=	site_url()."assets/img/logo.png";
		$page_data['data1']				=	$page_data['page']->title;
		
		$page_data['title']				=	$page_data['page']->meta_title;
		$page_data['meta_keywords']		=	$page_data['page']->meta_keywords;
		$page_data['meta_description']	=	$page_data['page']->meta_description;
		
		$page_data['page_name'] 		= 	'page/index';
		$page_data['menu']		 		= 	$page_data['page']->title;	
		$this->load->view('index',$page_data);
		
	}
	
	
}
