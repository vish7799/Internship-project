<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include "My_controller.php";
class Faq extends My_controller {
	public function __construct(){
		parent::__construct();	
		$this->load->model("Front_model", "front");
		$this->load->model("Home_model", "home");
	}

	public function index(){
		$page_data['faqs'] 				= 	$this->front->get_faqs();
		$page_data['page_name'] 		= 	'faq/index';
		$page_data['page_title'] 		= 	'Faq';
		$page_data['menu']		 		= 	'Faq';
		$page_data['title']				=	get_setting('meta_title');
		$page_data['meta_keywords']		=	get_setting('meta_keywords');
		$page_data['meta_description']	=	get_setting('meta_description');
		
		$page_data['canonical']			=	"https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$page_data['og_url']			=	"https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$page_data['og_title']			=	get_setting('meta_title');
		$page_data['og_description']	=	get_setting('meta_description');
		$page_data['og_site_name']		=	"Company DISCOUNT Shop - Faq";
		$page_data['og_type']			=	"website";
		$page_data['og_image']			=	site_url()."assets/img/logo.png";
		$page_data['data1']				=	$page_data['title'];
		
		$this->load->view('index',$page_data);
	}	
}