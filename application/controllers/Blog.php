<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include "My_controller.php";

class Blog extends My_controller {
	
	public function __construct()
	{
		parent::__construct();	
		$this->load->model("Front_model", "front");
		$this->load->model("Home_model", "home");
		$this->load->library("pagination");
	}

	public function index(){
		
		$config 						= 	array();
        $config["base_url"] 			= 	site_url() . "blog/index";
        $config["total_rows"] 			= 	$this->front->get_blog_count();
        $config["per_page"] 			= 	10;
        $config["uri_segment"] 			= 	3;
	    
		$this->pagination->initialize($config);
		$page 							= 	($this->uri->segment(3))? $this->uri->segment(3) : 0;
		$page_data["links"] 			= 	$this->pagination->create_links();
		
		$page_data['blogs'] 			=	$this->front->get_blogs($config["per_page"], $page);

		$page_data['title']				=	get_setting('meta_title');
		$page_data['meta_keywords']		=	get_setting('meta_keywords');
		$page_data['meta_description']	=	get_setting('meta_description');
		
		$page_data['canonical']			=	"https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$page_data['og_url']			=	"https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$page_data['og_title']			=	get_setting('meta_title');
		$page_data['og_description']	=	get_setting('meta_description');
		$page_data['og_site_name']		=	"Company DISCOUNT Shop - Blogs";
		$page_data['og_type']			=	"website";
		$page_data['og_image']			=	site_url()."assets/img/logo.png";
		$page_data['data1']				=	$page_data['title'];
		
		$page_data['page_name'] 		= 	'blog/index';
		$page_data['page_title'] 		= 	'Blog';
		$page_data['menu']		 		= 	'Blog';
		$this->load->view('index',$page_data);
		
	}
	
	public function category($slug){
	    
		$category_id					=	get_blog_categoryId_by_slug($slug);
		$page_data['blogs'] 			=	$this->front->get_blogs_category($category_id);
		$page_data['category_id'] 		=	$category_id;

		$page_data['title']				=	get_setting('meta_title');
		$page_data['meta_keywords']		=	get_setting('meta_keywords');
		$page_data['meta_description']	=	get_setting('meta_description');
		
		$page_data['canonical']			=	"https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$page_data['og_url']			=	"https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$page_data['og_title']			=	get_setting('meta_title');
		$page_data['og_description']	=	get_setting('meta_description');
		$page_data['og_site_name']		=	"Company DISCOUNT Shop - Blogs";
		$page_data['og_type']			=	"website";
		$page_data['og_image']			=	site_url()."assets/img/logo.png";
		$page_data['data1']				=	$page_data['title'];
		
		$page_data['page_name'] 		= 	'blog/category';
		$page_data['page_title'] 		= 	'Blog';
		$page_data['menu']		 		= 	'Blog';
		$this->load->view('index',$page_data);
		
	}
	
	public function tags($slug){
	    
		$tag_id							=	get_blog_tagId_by_slug($slug);
		$page_data['blogs'] 			=	$this->front->get_blogs_tags($tag_id);
		$page_data['tag_id'] 			=	$tag_id;

		$page_data['title']				=	get_setting('meta_title');
		$page_data['meta_keywords']		=	get_setting('meta_keywords');
		$page_data['meta_description']	=	get_setting('meta_description');
		
		$page_data['canonical']			=	"https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$page_data['og_url']			=	"https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$page_data['og_title']			=	get_setting('meta_title');
		$page_data['og_description']	=	get_setting('meta_description');
		$page_data['og_site_name']		=	"Company DISCOUNT Shop - Blogs";
		$page_data['og_type']			=	"website";
		$page_data['og_image']			=	site_url()."assets/img/logo.png";
		$page_data['data1']				=	$page_data['title'];
		
		$page_data['page_name'] 		= 	'blog/tags';
		$page_data['page_title'] 		= 	'Blog';
		$page_data['menu']		 		= 	'Blog';
		$this->load->view('index',$page_data);
		
	}
	
	
	public function detail($slug){
	    
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('message', 'Message', 'required');
		
		if ($this->form_validation->run() == FALSE){
		
			$page_data['blog'] 				=	$this->front->get_blogs_info(rawurldecode($slug));
			$blog_id						=	get_blog_Id_by_slug($slug);
			$client_ip						=	get_client_ip();
			$page_data['blogs'] 			= 	$this->home->get_homepage_blogs();
			
			$page_data['blogs_views_tracker'] 	=	$this->front->get_blogs_views_tracker($blog_id, $client_ip);
			$page_data['blog_comments'] 		=	$this->front->get_blogs_comment($blog_id);
			$page_data['title']				=	$page_data['blog']->meta_title;
			$page_data['meta_keywords']		=	get_setting('meta_keywords');
			$page_data['meta_description']	=	$page_data['blog']->meta_description;
			
			$page_data['canonical']			=	"https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
			$page_data['og_url']			=	"https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
			$page_data['og_title']			=	$page_data['blog']->meta_title;
			$page_data['og_description']	=	$page_data['blog']->meta_description;
			$page_data['og_site_name']		=	"Company DISCOUNT Shop - Blogs";
			$page_data['og_type']			=	"website";
			$page_data['og_image']			=	site_url()."assets/photo/blogs/featured/".$page_data['blog']->fimage;
			$page_data['data1']				=	$page_data['title'];
			
			$page_data['page_name'] 		= 	'blog/detail';
			$page_data['page_title'] 		= 	'Blog Detail';
			$page_data['menu']		 		= 	'Blog';
			$this->load->view('index',$page_data);
			
		}else{
			
			$post 							= 	$this->input->post();
			$this->front->add_blog_comment($post);
			$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Message!</h4>Your Comment has been posted successfully.</div>');
			redirect('blog/'.$slug);
		}
		
	}
	



	
}
