<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include "My_controller.php";

class Home extends My_controller {
	
	public function __construct()
	{
		parent::__construct();	
		$this->load->model("Home_model", "home");
		$this->load->model("Front_model", "front");

	}

	public function index($page = 1)
	{
		
		$page_data['slider'] 			= 	$this->home->get_homepage_slider();
		$page_data['categories'] 		= 	$this->home->get_category();
		$page_data['feature_products'] 	= 	$this->home->get_feature_products();
		$page_data['new_products'] 		= 	$this->home->get_new_products();
		$page_data['testimonials'] 		= 	$this->home->get_testimonials();
		$page_data['blogs'] 			= 	$this->home->get_homepage_blogs();
		$page_data['faqs'] 				= 	$this->home->get_homepage_faqs();
		
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
		
		$page_data['page_name'] 		= 	'home/index';
		$page_data['page_title'] 		= 	'Home';
		$page_data['menu']		 		= 	'Home';
		$this->load->view('index',$page_data);	
	}
	
}
