<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include "My_controller.php";

class Productcategory extends My_controller {
	
	public function __construct()
	{
		parent::__construct();	
		$this->load->model("admin/Category_model", "category");
	}
	
	public function index($page = 1)
	{
		$searchTerm	=	"";
		if($this->input->post()){
			$post 		= $this->input->post();
			$searchTerm	= $post['searchTerm'];	
		}
		
		$page_data['productcategory'] 			=	$this->category->get_all_category($page,$searchTerm);
		$count 									=	$this->category->get_all_category_count($searchTerm);
		$page_data['pagination']				=	$this->category->get_pagination($count,$page,site_url().'admin/productcategory/index/');
		
		$page_data['page_name'] 				= 	'productcategory/index';
		$page_data['page_title'] 				= 	'Product Category';
		$page_data['menu']		 				= 	'Product Category';
		$this->load->view('admin/index',$page_data);
	}
	
	public function add_productcategory()
	{
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		if (empty($_FILES['image']['name'])){
			$this->form_validation->set_rules('image', 'Image', 'required');
		}
		if ($this->form_validation->run() == FALSE){
			
			$page_data['page_name'] 			= 	'productcategory/add_productcategory';
			$page_data['page_title'] 			= 	'Add Product Category';
			$page_data['menu']		 			= 	'Product Category';
			$this->load->view('admin/index',$page_data);
			
		}else{
			$post 								= 	$this->input->post();
			if(isset($_FILES['image']['name'])){
				$ext 							= 	pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
				$config['upload_path']          = 	'./assets/photo/productcategory';
				$config['allowed_types']        = 	'gif|jpg|png|jpeg';
				/* $config['max_size']             = 1024;
				$config['max_width']            = 1024;
				$config['max_height']           = 768; */
				$config['file_name']           	= 	rand(1000,9999). "_" . time().'.'.$ext;
				
				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('image')){
					$error 						= 	array('error' => $this->upload->display_errors());
					print_r($error);
					exit;
				}
				else
				{
					$data 						= 	$this->upload->data();
					$post['image'] 				= 	$data['file_name'];
				}
			}else{
				$post['image'] 					= 	'';
			}
			$category_id						=	$post['category_id'];
			$post['parent_category_id']			=	getParentCategoryId($category_id);
			$this->category->add_category($post);
			$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Message!</h4>Product Category added successfully.</div>');
			redirect('admin/productcategory');
		}
	}
	
	public function edit_productcategory($productcategory_id = 0){
		$this->form_validation->set_rules('title', 'Title', 'required');
		// $this->form_validation->set_rules('slug', 'Slug', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$page_data['productcategory'] 		=	$this->category->get_category_info($productcategory_id);
			$page_data['product_categories'] 	= 	$this->category->get_categories();
			
			$page_data['page_name'] 	= 	'productcategory/edit_productcategory';
			$page_data['page_title'] 	= 	'Edit Product Category';
			$page_data['menu']		 	= 	'Product Category';
			
			$this->load->view('admin/index',$page_data);
		}
		else
		{
			$post 						= 	$this->input->post();
			
			
			if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=''){
				$ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
				$config['upload_path']          = './assets/photo/productcategory/';
				$config['allowed_types']        = 'gif|jpg|png|jpeg';
				/* $config['max_size']             = 1024;
				$config['max_width']            = 1024;
				$config['max_height']           = 768; */
				$config['file_name']           = rand(1000,9999). "_" . time().'.'.$ext;
				
				if(file_exists($config['upload_path'].$post['old_image']) && is_file($config['upload_path'].$post['old_image'])){
					unlink($config['upload_path'].$post['old_image']);
					unset($post['old_image']);
				}else{
					$post['image'] = $post['old_image'];
					unset($post['old_image']);
				}
				
				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('image'))
				{
					$error = array('error' => $this->upload->display_errors());
					print_r($error);
					exit;
				}
				else
				{
					$data = $this->upload->data();
					$post['image'] = $data['file_name'];
				}
			}else{
				$post['image'] = $post['old_image'];
				unset($post['old_image']);
			}
			
			
			$productcategory_id	=	$post['productcategory_id'];
			unset($post['productcategory_id']);
			
			$this->category->update_category($productcategory_id,$post);
			$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Message!</h4>Product Category updated successfully.</div>');
			redirect('admin/productcategory');
		}
	}
	
	function delete_productcategory($productcategory_id =0){
		$where["id"] = $productcategory_id;
		$this->category->delete($where,"product_categories");
		$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Message!</h4>Product Category deleted successfully.</div>');
		redirect('admin/productcategory');
	}
	
	function get_slug($title){
		$title = urldecode($title);
		$title = strtolower($title);
		$title = str_replace(" ", "-", $title);
		$title = $this->category->get_slug($title);
		echo $title;die;
	}
	
	function status_change($id =0, $status=""){		
		$this->category->status_change($id, $status, "product_categories");
		
		$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Message!</h4>Category Updated Successfully.</div>');
		redirect('admin/productcategory');
	}
}
