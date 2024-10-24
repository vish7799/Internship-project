<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include "My_controller.php";

class Blogs extends My_controller {
	
	public function __construct()
	{
		parent::__construct();	
		$this->load->model("admin/Blogs_model", "blogs");
	}

	public function index($page = 1, $sorting = ""){
		
		$searchTerm					=	"";
		$category_id				=	"";
		$status						=	"";
		if($this->input->post()){
			$post 					= 	$this->input->post();
			$searchTerm				= 	$post['searchTerm'];	
			$category_id			= 	$post['category_id'];	
			$status					= 	$post['status'];
		}
		
		$_SESSION['blog_serach']['searchTerm']			=	$searchTerm;
		$_SESSION['blog_serach']['category_id']			=	$category_id;
		$_SESSION['blog_serach']['status']				=	$status;
		
		$page_data['categories'] 	=	$this->blogs->get_active_category();
		$page_data['pages'] 		=	$this->blogs->get_blogs($page, $sorting, $searchTerm, $category_id, $status);
		$count 						=	$this->blogs->get_all_pages_count($sorting, $searchTerm, $category_id, $status);
		$page_data['pagination']	=	$this->blogs->get_pagination($count,$page,site_url().'admin/blogs/index/');
		
		$page_data['pageno']			=	$page;
		$page_data['sorting'] 			=	$sorting;
		$page_data['page_name'] 		= 	'blogs/index';
		$page_data['page_title'] 		= 	'Blogs';
		$page_data['menu']		 		= 	'Blogs';
		$this->load->view('admin/index',$page_data);
		
	}
	
	function get_slug($title){
		$title = urldecode($title);
		$title = strtolower($title);
		$title = str_replace(" ", "-", $title);
		$title = $this->blogs->get_slug($title);
		echo $title;die;
	}
	
	
	public function add($page = 1){
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('slug', 'Slug', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		
		if ($this->form_validation->run() == FALSE){
			$page_data['categories'] 		=	$this->blogs->get_categories();
			$page_data['tags'] 				=	$this->blogs->get_tags();
			$page_data['page_name'] 		= 	'blogs/add';
			$page_data['page_title'] 		= 	'Blogs - Add Blog';
			$page_data['menu']		 		= 	'Blogs';
			$this->load->view('admin/index',$page_data);
		
		}else{
			
			$post 			= 	$this->input->post();
			
			$other_tags 	=	explode(",",$post['other_tag']);
			
			foreach($other_tags as $other_tag){
				$post_tag['title']		=	trim($other_tag);
				$slug 							= 	urldecode($post_tag['title']);
				$slug 							= 	strtolower($slug);
				$slug 							= 	str_replace(" ", "-", $slug);
				$slug 							= 	str_replace("%", "", $slug);
				$post_tag['slug'] 				= 	$this->blogs->get_category_slug($slug);
				$post_tag['status']				=	'1';
				$post_tag['created']			=	time();
				$post_tag['modified']			=	time();
				$tag_id							=	$this->blogs->add_other_tag($post_tag);
				if(isset($tag_id) && $tag_id != ""){
					if($post['tag'] != ""){
						array_push($post['tag'], $tag_id);
					}else{
						$post['tag']	=	array($tag_id);
					}
				}
				
			}
			$post['category_id']				=	','.implode(",",$post['category_id']).',';
			$post['tag']						=	','.implode(",",$post['tag']).',';
			
			$created_date						=	$post['created_date'];
			$a 									=	explode("-",$created_date);
			$timestamp 							= 	mktime(0, 0, 0, $a['1'], $a['2'], $a['0']);
			$post['created_date']				=	$timestamp;
			
			unset($post['other_tag']);
			
			if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != ""){
				$ext 							= 	pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
				$config['upload_path']          = 	'./assets/photo/blogs';
				$config['allowed_types']        = 	'gif|jpg|png|jpeg';
				$config['file_name']           	= 	"blogs_".rand(1000,9999). "_" . time().'.'.$ext;
				
				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('image')){
					$error 						= 	array('error' => $this->upload->display_errors());
					print_r($error);
					exit;
				}else{
					$data 						= 	$this->upload->data();
					$post['image'] 				= 	$data['file_name'];
				}
			}else{
				$post['image'] 					= 	'';
			}
			
			if(isset($_FILES['fimage']['name']) && $_FILES['fimage']['name'] != ""){
				$ext 							= 	pathinfo($_FILES['fimage']['name'], PATHINFO_EXTENSION);
				$config['upload_path']          = 	'./assets/photo/blogs/featured/';
				$config['allowed_types']        = 	'gif|jpg|png|jpeg';
				$config['file_name']           	= 	"blogs_featured_".rand(1000,9999). "_" . time().'.'.$ext;
				
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ( ! $this->upload->do_upload('fimage')){
					$error 						= 	array('error' => $this->upload->display_errors());
					print_r($error);
					exit;
				}else{
					$data 						= 	$this->upload->data();
					$post['fimage'] 			= 	$data['file_name'];
				}
			}else{
				$post['fimage'] 				= 	'';
			}
			
			
			$blog_id							=	$this->blogs->add_blogs($post);
			
			
			if($blog_id){
				$other_image 							= 	$_FILES['other_image'];
				$cntr 									= 	count($other_image);
				
				for($i=0;$i<$cntr;$i++){
					if(isset($other_image['name'][$i])){
						$_FILES['image']['name']		= 	$other_image['name'][$i];
						$_FILES['image']['type']		= 	$other_image['type'][$i];
						$_FILES['image']['tmp_name']	= 	$other_image['tmp_name'][$i];
						$_FILES['image']['error']		= 	$other_image['error'][$i];
						$_FILES['image']['size']		= 	$other_image['size'][$i];
				
						$ext 							= 	pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
						$config							=	array();
						$config['upload_path']          = 	'./assets/photo/blogs/other/';
						$config['allowed_types']        = 	'gif|jpg|png|jpeg';
						$config['file_name']            = 	'blog_other_'.$blog_id.'_'.rand(1000,9999). "_" . time().'.'.$ext;
						
						$this->load->library('upload', $config);
						$this->upload->initialize($config);

						if ( ! $this->upload->do_upload('image')){
							$error = array('error' => $this->upload->display_errors());						
						}else{
							$data 						= 	$this->upload->data();
							$this->blogs->add_blog_image($blog_id, $data['file_name']);
						}
					}
				}
			}
			
			
			$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Message!</h4>Blog added successfully.</div>');
			redirect('admin/blogs');
		}
		
	}
	public function edit($page_id = 0){
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('slug', 'Slug', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		
		if ($this->form_validation->run() == FALSE){
			
			$page_data['categories'] 		=	$this->blogs->get_categories();
			$page_data['tags'] 				=	$this->blogs->get_tags();
			$page_data['page'] 				=	$this->blogs->get_blogs_info($page_id);
			$page_data['blog_images'] 		= 	$this->blogs->get_blog_images($page_id);
			
			$page_data['page_name'] 		= 	'blogs/edit';
			$page_data['page_title'] 		= 	'Blogs - Edit Blog';
			$page_data['menu']		 		= 	'Blogs';
			
			$this->load->view('admin/index',$page_data);
		
		}else{
			
			$post 						=	$this->input->post();
			
			$other_tags 	=	explode(",",$post['other_tag']);
			
			foreach($other_tags as $other_tag){
				$post_tag['title']		=	trim($other_tag);
				$slug 							= 	urldecode($post_tag['title']);
				$slug 							= 	strtolower($slug);
				$slug 							= 	str_replace(" ", "-", $slug);
				$slug 							= 	str_replace("%", "", $slug);
				$post_tag['slug'] 				= 	$this->blogs->get_category_slug($slug);
				$post_tag['status']				=	'1';
				$post_tag['created']			=	time();
				$post_tag['modified']			=	time();
				$tag_id							=	$this->blogs->add_other_tag($post_tag);
				
				if(isset($tag_id) && $tag_id != ""){
					if($post['tag'] != ""){
						array_push($post['tag'], $tag_id);
					}else{
						$post['tag']	=	array($tag_id);
					}
				}
			}
			$post['category_id']				=	','.implode(",",$post['category_id']).',';
			$post['tag']						=	','.implode(",",$post['tag']).',';
			
			$created_date						=	$post['created_date'];
			$a 									=	explode("-",$created_date);
			$timestamp 							= 	mktime(0, 0, 0, $a['1'], $a['2'], $a['0']);
			$post['created_date']				=	$timestamp;
			
			unset($post['other_tag']);
			
			$delete_img							=	array();
			if(isset($post['delete_img'])){
				$delete_img 					= 	$post['delete_img'];
				unset($post['delete_img']);
			}
			
			if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=''){
				
				$ext 							= 	pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
				$config['upload_path']          = 	'./assets/photo/blogs/';
				$config['allowed_types']        = 	'gif|jpg|png|jpeg';
				$config['file_name']           	= 	"blogs_".rand(1000,9999). "_" . time().'.'.$ext;
				
				if(file_exists($config['upload_path'].$post['old_image']) && is_file($config['upload_path'].$post['old_image'])){
					unlink($config['upload_path'].$post['old_image']);
					unset($post['old_image']);
				}else{
					$post['image'] 				= 	$post['old_image'];
					unset($post['old_image']);
				}
				
				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('image')){
					$error 						= 	array('error' => $this->upload->display_errors());
					print_r($error);
					exit;
				}else{
					$data 						= 	$this->upload->data();
					$post['image'] 				= 	$data['file_name'];
				}
			}else{
				$post['image'] 					= 	$post['old_image'];
				unset($post['old_image']);
			}
			
			if(isset($_FILES['fimage']['name']) && $_FILES['fimage']['name']!=''){
				
				$ext 							= 	pathinfo($_FILES['fimage']['name'], PATHINFO_EXTENSION);
				$config['upload_path']          = 	'./assets/photo/blogs/featured/';
				$config['allowed_types']        = 	'gif|jpg|png|jpeg';
				$config['file_name']           	= 	"blogs_featured_".rand(1000,9999). "_" . time().'.'.$ext;
				
				if(file_exists($config['upload_path'].$post['old_fimage']) && is_file($config['upload_path'].$post['old_fimage'])){
					unlink($config['upload_path'].$post['old_fimage']);
					unset($post['old_fimage']);
				}else{
					$post['fimage'] 				= 	$post['old_fimage'];
					unset($post['old_fimage']);
				}
				
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ( ! $this->upload->do_upload('fimage')){
					$error 						= 	array('error' => $this->upload->display_errors());
					print_r($error);
					exit;
				}else{
					$data 						= 	$this->upload->data();
					$post['fimage'] 				= 	$data['file_name'];
				}
			}else{
				$post['fimage'] 					= 	$post['old_fimage'];
				unset($post['old_fimage']);
			}
			
			$blog_id							=	$post['page_id'];
			
			$other_image 						= 	$_FILES['other_image'];
			$cntr 								= 	count($other_image);
			
			for($i=0;$i<$cntr;$i++){
				
				if(isset($other_image['name'][$i])){
					$_FILES['image']['name']	= 	$other_image['name'][$i];
					$_FILES['image']['type']	= 	$other_image['type'][$i];
					$_FILES['image']['tmp_name']= 	$other_image['tmp_name'][$i];
					$_FILES['image']['error']	= 	$other_image['error'][$i];
					$_FILES['image']['size']	= 	$other_image['size'][$i];
						
					$ext 						= 	pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
					$config						=	array();
					$config['upload_path']          = 	'./assets/photo/blogs/other/';
					$config['allowed_types']        = 	'gif|jpg|png|jpeg';
					$config['file_name']            = 	'blog_other_'.$blog_id.'_'.rand(1000,9999). "_" . time().'.'.$ext;
					
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					
					if ( ! $this->upload->do_upload('image')){
						$error 					= 	array('error' => $this->upload->display_errors());						
					}else{
						$data 					= 	$this->upload->data();
						$this->blogs->add_blog_image($blog_id, $data['file_name']);
					}
				}
			}
			unset($post['page_id']);
			
			$this->blogs->update_blogs($blog_id,$post);
			
			$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Message!</h4>Blog updated successfully.</div>');
			redirect('admin/blogs');
		}
	}
	
	function delete($page_id){
		$where["id"] = $page_id;
		$this->blogs->delete($where,"blogs");
		$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Message!</h4>Blog deleted successfully.</div>');
		redirect('admin/blogs');
	}
	
	function status_change($id =0, $status=""){
		
		$this->blogs->status_change($id, $status, "blogs");
		
		$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Message!</h4>Blog Status Updated Successfully.</div>');
		redirect('admin/blogs');
	}
	
	function delete_image($blog_id=0, $image_id=0){
		
		$name = $this->blogs->get_image_name($image_id);		
		if(file_exists("./assets/photo/blogs/other/".$name)){
			unlink("./assets/photo/blogs/other/".$name);
		}
		
		$where["id"] = $image_id;
		$this->blogs->delete($where,"blogs_images");
		$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Message!</h4>Image deleted successfully.</div>');
		redirect('admin/blogs/edit/'.$blog_id);
	}
	
	/***************************************** CATEGORY **********************************************/
	
	public function category($page = 1){
		
		$searchTerm					=	"";
		$parent_id				=	"";
		$status						=	"";
		if($this->input->post()){
			$post 					= 	$this->input->post();
			$searchTerm				= 	$post['searchTerm'];	
			$parent_id			= 	$post['parent_id'];	
			$status					= 	$post['status'];
		}
		
		$_SESSION['blog_serach_category']['searchTerm']				=	$searchTerm;
		$_SESSION['blog_serach_category']['parent_id']				=	$parent_id;
		$_SESSION['blog_serach_category']['status']					=	$status;
		
		$page_data['pcategories'] 	=	$this->blogs->get_parent_blog_category();
		
		$page_data['pages'] 		=	$this->blogs->get_blogs_category($page, $searchTerm, $parent_id, $status);
		$count 						=	$this->blogs->get_all_category_count($searchTerm, $parent_id, $status);
		$page_data['pagination']	=	$this->blogs->get_pagination($count,$page,site_url().'admin/blogs/category/');
		
		
		$page_data['page_name'] 		= 	'blogs/category';
		$page_data['page_title'] 		= 	'Blogs Category';
		$page_data['menu']		 		= 	'Blogs';
		$this->load->view('admin/index',$page_data);
		
	}
	
	function get_category_slug($title){
		$title = urldecode($title);
		$title = strtolower($title);
		$title = str_replace(" ", "-", $title);
		$title = str_replace("&", "", $title);
		$title = $this->blogs->get_category_slug($title);
		echo $title;die;
	}
	
	public function add_category($page = 1){
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('slug', 'Slug', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		
		if ($this->form_validation->run() == FALSE){
			$page_data['pcategories'] 		=	$this->blogs->get_parent_blog_category();
			$page_data['page_name'] 		= 	'blogs/add_category';
			$page_data['page_title'] 		= 	'Blogs - Add Category';
			$page_data['menu']		 		= 	'Blogs';
			$this->load->view('admin/index',$page_data);
		
		}else{
			
			$post 			= 	$this->input->post();
			
			$this->blogs->add_blogs_category($post);
			$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Message!</h4>Blog Category added successfully.</div>');
			redirect('admin/blogs/category');
		}
		
	}
	public function edit_category($page_id = 0){
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('slug', 'Slug', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		
		if ($this->form_validation->run() == FALSE){
			$page_data['pcategories'] 	=	$this->blogs->get_parent_blog_category();
			$page_data['page'] 			=	$this->blogs->get_blogs_category_info($page_id);
			$page_data['page_name'] 	= 	'blogs/edit_category';
			$page_data['page_title'] 	= 	'Blogs - Edit Category';
			$page_data['menu']		 	= 	'Blogs';
			
			$this->load->view('admin/index',$page_data);
		
		}else{
			$post 						=	$this->input->post();
			
			$page_id	=	$post['page_id'];
			unset($post['page_id']);
			
			$this->blogs->update_blogs_category($page_id,$post);
			
			$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Message!</h4>Blog Category updated successfully.</div>');
			redirect('admin/blogs/category');
		}
	}
	
	function category_status_change($id =0, $status=""){
		
		$this->blogs->status_change($id, $status, "blogs_category");
		
		$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Message!</h4>Blog Category Status Updated Successfully.</div>');
		redirect('admin/blogs/category');
	}
	
	/***************************************** CATEGORY **********************************************/
	
	/***************************************** BLOG TAG MANAGER **********************************************/
	
	public function tag($page = 1){
		
		$searchTerm					=	"";
		$status						=	"";
		if($this->input->post()){
			$post 					= 	$this->input->post();
			$searchTerm				= 	$post['searchTerm'];	
			$status					= 	$post['status'];
		}
		
		$_SESSION['blog_serach_tag']['searchTerm']				=	$searchTerm;
		$_SESSION['blog_serach_tag']['status']					=	$status;
		
		
		$page_data['pages'] 		=	$this->blogs->get_blogs_tag($page, $searchTerm, $status);
		$count 						=	$this->blogs->get_all_tag_count($searchTerm, $status);
		$page_data['pagination']	=	$this->blogs->get_pagination($count,$page,site_url().'admin/blogs/tag/');
		
		
		$page_data['page_name'] 		= 	'blogs/tag';
		$page_data['page_title'] 		= 	'Blogs Tag';
		$page_data['menu']		 		= 	'Blogs';
		$this->load->view('admin/index',$page_data);
		
	}
	
	function get_tag_slug($title){
		$title 							= 	urldecode($title);
		$title 							= 	strtolower($title);
		$title 							= 	str_replace(" ", "-", $title);
		$title 							= 	str_replace("%", "", $title);
		$title 							= 	$this->blogs->get_tag_slug($title);
		echo $title;die;
	}
	
	public function add_tag($page = 1){
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('slug', 'Slug', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		
		if ($this->form_validation->run() == FALSE){
			
			$page_data['page_name'] 		= 	'blogs/add_tag';
			$page_data['page_title'] 		= 	'Blogs - Add Tag';
			$page_data['menu']		 		= 	'Blogs';
			$this->load->view('admin/index',$page_data);
		
		}else{
			
			$post 							= 	$this->input->post();
			
			$this->blogs->add_blogs_tag($post);
			$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Message!</h4>Blog Tag added successfully.</div>');
			redirect('admin/blogs/tag');
		}
		
	}
	public function edit_tag($page_id = 0){
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('slug', 'Slug', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		
		if ($this->form_validation->run() == FALSE){
			
			$page_data['page'] 			=	$this->blogs->get_blogs_tag_info($page_id);
			$page_data['page_name'] 	= 	'blogs/edit_tag';
			$page_data['page_title'] 	= 	'Blogs - Edit Tag';
			$page_data['menu']		 	= 	'Blogs';
			
			$this->load->view('admin/index',$page_data);
		
		}else{
			$post 						=	$this->input->post();
			
			$page_id	=	$post['page_id'];
			unset($post['page_id']);
			
			$this->blogs->update_blogs_tag($page_id, $post);
			
			$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Message!</h4>Blog Tag updated successfully.</div>');
			redirect('admin/blogs/tag');
		}
	}
	
	function tag_status_change($id =0, $status=""){
		
		$this->blogs->status_change($id, $status, "blogs_tag");
		
		$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Message!</h4>Blog Tag Status Updated Successfully.</div>');
		redirect('admin/blogs/tag');
	}
	
	/***************************************** BLOG TAG MANAGER **********************************************/
	
	function search_reset(){
		unset($_SESSION['blog_serach']);
		redirect('admin/blogs');
	}
	function search_reset_category(){
		unset($_SESSION['blog_serach_category']);
		redirect('admin/blogs/category');
	}
	function search_reset_tag(){
		unset($_SESSION['blog_serach_tag']);
		redirect('admin/blogs/tag');
	}
	
}
