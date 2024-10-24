<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include "My_controller.php";

class Products extends My_controller {

	public function __construct()
	{
		parent::__construct();	
		$this->load->model("admin/Product_model", "product");
	}
	
	public function index($page = 1, $sorting = ""){
		
		$searchTerm					=	"";
		$category_id				=	"";
		if($this->input->post()){
			$post 					= 	$this->input->post();
			$searchTerm				= 	$post['searchTerm'];	
			$category_id			= 	$post['category_id'];	
		}
		$page_data['categories'] 	=	$this->product->get_all_category();
		$page_data['products'] 		=	$this->product->get_all_products($page, $searchTerm, $category_id, $sorting);
		$count 						=	$this->product->get_all_products_count($searchTerm, $category_id);
		$page_data['pagination']	=	$this->product->get_pagination($count,$page,site_url().'admin/products/index/');
		$page_data['pageno']		=	$page;
		$page_data['sorting'] 		=	$sorting;
		
		$page_data['page_name'] 	= 	'products/index';
		$page_data['page_title'] 	= 	'Products';
		$page_data['menu']		 	= 	'Products';
		$this->load->view('admin/index',$page_data);
	}
	
	
	
	public function add_product()
	{
		$this->form_validation->set_rules('title', 'Product Name', 'required');
		$this->form_validation->set_rules('price', 'Price', 'required');
		$this->form_validation->set_rules('description', 'Product description', 'required');
		$this->form_validation->set_rules('category_id', 'Category', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		if ($this->form_validation->run() == FALSE){
			
			$page_data['product_categories'] 	= 	$this->product->get_product_categories();
			$page_data['categories'] 			=	$this->product->get_all_parent_category();
			
			$page_data['page_name'] 			= 	'products/add_product';
			$page_data['page_title'] 			= 	'Add Product';
			$page_data['menu']		 			= 	'Products';
			$this->load->view('admin/index',$page_data);
		
		}else{
			
			$post = $this->input->post();
			$post['title']						=	lowerCaseTitle($post['title']);
			if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != ''){
				$ext 							= 	pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
				$config['upload_path']          = 	'./assets/photo/product';
				$config['allowed_types']        = 	'gif|jpg|png|jpeg';
				$config['file_name']           	= 	'product-'.rand(1000,9999). "-" . time().'.'.$ext;
				
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
			$category_id						=	$post['category_id'];
			$post['parent_category_id']			=	getParentCategoryId($category_id);
			
			$product_id = $this->product->add_product($post);
			
			if($product_id){
				$other_image 					= 	$_FILES['other_image'];
				$cntr 							= 	count($other_image);
				for($i=0;$i<$cntr;$i++){
					if(isset($other_image['name'][$i])){
						$_FILES['image']['name']		= 	$other_image['name'][$i];
						$_FILES['image']['type']		= 	$other_image['type'][$i];
						$_FILES['image']['tmp_name']	= 	$other_image['tmp_name'][$i];
						$_FILES['image']['error']		= 	$other_image['error'][$i];
						$_FILES['image']['size']		= 	$other_image['size'][$i];
				
						$ext 							= 	pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
						$config							=	array();
						$config['upload_path']          = 	'./assets/photo/product';
						$config['allowed_types']        = 	'gif|jpg|png|jpeg';
						$config['file_name']           	= 	'product-'.rand(1000,9999). "-" . time().'.'.$ext;
						
						$this->load->library('upload', $config);

						if ( ! $this->upload->do_upload('image')){
							$error 						= 	array('error' => $this->upload->display_errors());						
						}else{
							$data 						= 	$this->upload->data();
							$this->product->add_product_image($product_id, $data['file_name']);
						}
					}
				}
			}
			
			$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Message!</h4>Product added successfully.</div>');
			redirect('admin/products');
		}
	}
	
	public function edit_product($product_id = 0, $page = 1){
		
		$this->form_validation->set_rules('title', 'Product Name', 'required');
		$this->form_validation->set_rules('price', 'Price', 'required');
		$this->form_validation->set_rules('description', 'Product description', 'required');
		$this->form_validation->set_rules('category_id', 'Category', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		
		if ($this->form_validation->run() == FALSE){
			$page_data['product'] 				=	$this->product->get_product_info($product_id);
			$page_data['categories'] 			=	$this->product->get_all_parent_category();
			$page_data['product_images'] 		= 	$this->product->get_product_images($product_id);
			
			$page_data['page_name'] 			= 	'products/edit_product';
			$page_data['page_title'] 			= 	'Edit Product';
			$page_data['menu']		 			= 	'Products';
			$page_data['pageno']				=	$page;
			$this->load->view('admin/index',$page_data);
		
		}else{
			
			$post = $this->input->post();
			$post['title']						=	lowerCaseTitle($post['title']);
			if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=''){
				$ext 							= 	pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
				$config['upload_path']          = 	'./assets/photo/product/';
				$config['allowed_types']        = 	'gif|jpg|png|jpeg';
				$config['file_name']           	= 	'product-'.rand(1000,9999). "-" . time().'.'.$ext;
				
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
			
			
			$product_id							=	$post['product_id'];
			unset($post['product_id']);
			
			$other_image 						= 	$_FILES['other_image'];
			$cntr 								= 	count($other_image['name']);
			
			for($i=0;$i<$cntr;$i++){
				
				if(isset($other_image['name'][$i])){
					$_FILES['image']['name']	= 	$other_image['name'][$i];
					$_FILES['image']['type']	= 	$other_image['type'][$i];
					$_FILES['image']['tmp_name']= 	$other_image['tmp_name'][$i];
					$_FILES['image']['error']	= 	$other_image['error'][$i];
					$_FILES['image']['size']	= 	$other_image['size'][$i];
			
					$ext 						= 	pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
					$config						=	array();
					$config['upload_path']      = 	'./assets/photo/product';
					$config['allowed_types']   	= 	'gif|jpg|png|jpeg';
					$config['file_name']       	= 	rand(1000,9999). "_" . time().'.'.$ext;
					
					$this->load->library('upload', $config);

					if ( ! $this->upload->do_upload('image')){
						$error 					= 	array('error' => $this->upload->display_errors());						
					}else{
						$data 					= 	$this->upload->data();
						$this->product->add_product_image($product_id, $data['file_name']);
					}
				}
			}
			$category_id						=	$post['category_id'];
			$post['parent_category_id']			=	getParentCategoryId($category_id);
			
			$this->product->update_product($product_id, $post);			
			
			$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Message!</h4>Product updated successfully.</div>');
			redirect('admin/products/index/'.$page);
		}
	}
	
	function delete_product($product_id =0){
		$where["id"] = $product_id;
		$this->product->delete($where,"products");
		$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Message!</h4>Product deleted successfully.</div>');
		redirect('admin/products');
	}
		
	function delete_image($product_id=0,$image_id=0){
		
		$name = $this->product->get_image_name($image_id);		
		if(file_exists("./assets/photo/product/".$name)){
			unlink("./assets/photo/product/".$name);
		}
		
		$where["id"] = $image_id;
		$this->product->delete($where,"product_images");
		$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Message!</h4>Image deleted successfully.</div>');
		redirect('admin/products/edit_product/'.$product_id);
	}
	
	function get_slug($title){
		$title = urldecode($title);
		$title = strtolower($title);
		$title = str_replace(" ", "-", $title);
		$title = $this->product->get_slug_product($title);
		echo $title;die;
	}
	
	function get_slug_excel($title){
		$title = urldecode($title);
		$title = strtolower($title);
		$title = str_replace(" ", "-", $title);
		$title = $this->product->get_slug_product($title);
		return $title;
	}
	
	function status_change($id =0, $status=""){
		
		$this->product->status_change($id, $status, "products");
		
		$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Message!</h4>Product Updated Successfully.</div>');
		redirect('admin/products');
	}
	
	function featured_status_change($id =0, $status=""){
		
		$this->product->featured_status_change($id, $status, "products");
		
		$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Message!</h4>Product Updated Successfully.</div>');
		redirect('admin/products');
	}
	
	
	function getSubCat() {
		$catId = $this->input->post('catId');
		$subcate = $this->product->getsubcategory($catId);
		$html='';

		if(isset($subcate) && !empty($subcate)) {
			$html .= '<option value="">Select Sub Category</option>';
			foreach($subcate as $subcates) {
			    $html .= '<option value="'.$subcates->id.'">'.$subcates->title.'</option>';
			}
		} else {
			$html .= '<option value="">No Sub Categories</option>';
		}

		echo $html;
	}
	
	
	
	public function import_product(){
		
		if(!isset($_FILES['image']['name'])){
			
			$page_data['page_name'] 			= 	'products/import_product';
			$page_data['page_title'] 			= 	'Import Product';
			$page_data['menu']		 			= 	'Import Products';
			$this->load->view('admin/index',$page_data);
		
		}else{
			$post								=	array();
			$filename							=	$_FILES["image"]["tmp_name"];
			
			if($_FILES["image"]["size"] > 0){
				$file 							= 	fopen($filename, "r");
				$i								=	0;
				while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE){
					
				if($i > 0){	
					$post['title']					=	$emapData['0'];
					$post['slug']					=	$this->get_slug_excel($post['title']);
					$post['sku']					=	$emapData['1'];
					$post['description']			=	$emapData['2'];
					$post['category_id']			=	$emapData['3'];
					$post['price']					=	$emapData['4'];
					$post['offer_price']			=	$emapData['5'];
					$post['qty']					=	$emapData['6'];
					$post['gst']					=	$emapData['7'];
					
					if($emapData['8'] != ""){
						$url 		= 	$emapData['8']; 
						$ext 		= 	pathinfo($url, PATHINFO_EXTENSION);
						$image_name	=	'product-'.rand(1000,9999). "-" . time().'.'.$ext;
						$img 		= 	'assets/photo/product/'.$image_name; 
						file_put_contents($img, file_get_contents($url));
						$post['image']				=	$image_name;
					}else{
						$post['image']				=	"";
					}
					
					$post['status']					=	'1';
					$post['is_featured']			=	'0';
					$post['meta_title']				=	$emapData['0'];
					$post['meta_keywords']			=	$emapData['0'];
					$post['meta_description']		=	$emapData['0'];
					$post['size']					=	$emapData['10'];
					$post['color']					=	$emapData['11'];
					$post['pattern']				=	$emapData['12'];
					
					//pr($post);
					
					if($post['title'] != ""){
						$product_id = $this->product->add_product($post);
						if($emapData['9'] != ""){
							$multi_images		=	$emapData['9'];
							$multi_p_images		=	explode(',', $multi_images);
							foreach($multi_p_images as $image){
								$url 		= 	$image; 
								$ext 		= 	pathinfo($url, PATHINFO_EXTENSION);
								$image_name	=	'product-'.rand(1000,9999). "-" . time().'.'.$ext;
								$img 		= 	'assets/photo/product/'.$image_name; 
								file_put_contents($img, file_get_contents($url));
								$postdata['image']				=	$image_name;
								$this->product->add_product_image($product_id, $image_name);
							}
						}
					}
					
				}
				$i++;
				}
			}
			
			$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Message!</h4>Product added successfully.</div>');
			redirect('admin/products');
		}
	}
	
	
}
