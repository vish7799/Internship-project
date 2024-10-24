<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include "My_controller.php";

class Testimonials extends My_controller {
	
	public function __construct()
	{
		parent::__construct();	
		$this->load->model("admin/Testimonials_model", "testimonials");
	}

	public function index($page = 1)
	{
		$page_data['pages'] 		=	$this->testimonials->get_testimonials($page);
		$count 						=	$this->testimonials->get_all_pages_count();
		$page_data['pagination']	=	$this->testimonials->get_pagination($count,$page,site_url().'testimonials/index/');
		
		
		$page_data['page_name'] 		= 	'testimonials/index';
		$page_data['page_title'] 		= 	'Testimonials';
		$page_data['menu']		 		= 	'Testimonials';
		$this->load->view('admin/index',$page_data);
		
	}
	
	function get_slug($title){
		$title = urldecode($title);
		$title = strtolower($title);
		$title = str_replace(" ", "_", $title);
		$title = $this->cms->get_slug($title);
		echo $title;die;
	}
	
	
	public function add($page = 1)
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('post', 'Post', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		if(empty($_FILES['image']['name']))
		{
			$this->form_validation->set_rules('image', 'Image', 'required');
		}
		if ($this->form_validation->run() == FALSE)
		{
		
			$page_data['page_name'] 		= 	'testimonials/add';
			$page_data['page_title'] 		= 	'Testimonials - Add';
			$page_data['menu']		 		= 	'Testimonials';
			
			$this->load->view('admin/index',$page_data);
		}else{
			
			
			$post = $this->input->post();
			
			if(isset($_FILES['image']['name'])){
				$ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
				$config['upload_path']          = './assets/photo/testimonials';
				$config['allowed_types']        = 'gif|jpg|png|jpeg';
				$config['file_name']           = "testimonials_".rand(1000,9999). "_" . time().'.'.$ext;
				
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
				$post['image'] = '';
			}
			
			
			$this->testimonials->add_testimonials($post);
			$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Message!</h4>CMS page added successfully.</div>');
			redirect('admin/testimonials');
		}
		
	}
	public function edit($page_id = 0){
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('post', 'Post', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$page_data['page'] 			=	$this->testimonials->get_page_info($page_id);
			$page_data['page_name'] 	= 	'testimonials/edit';
			$page_data['page_title'] 	= 	'Testimonials Edit';
			$page_data['menu']		 	= 	'Testimonials';
			
			$this->load->view('admin/index',$page_data);
		}
		else
		{
			$post = $this->input->post();
			
			$delete_img	=	array();
			if(isset($post['delete_img'])){
				$delete_img = $post['delete_img'];
				unset($post['delete_img']);
			}
			
			
			if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=''){
				$ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
				$config['upload_path']          = './assets/photo/testimonials/';
				$config['allowed_types']        = 'gif|jpg|png|jpeg';
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
			
			
			$page_id	=	$post['page_id'];
			unset($post['page_id']);
			
			$this->testimonials->update_testimonial($page_id,$post);
			
			$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Message!</h4>Testimonial Edit successfully.</div>');
			redirect('admin/testimonials');
		}
	}
	function status_change($id =0, $status=""){
		
		$this->testimonials->status_change($id, $status, "testimonials");
		
		$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Message!</h4>Blog Status Updated Successfully.</div>');
		redirect('admin/testimonials');
	}
	
	function delete($page_id){
		$where["id"] = $page_id;
		$this->testimonials->delete($where,"testimonials");
		$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Message!</h4>Testimonial deleted successfully.</div>');
		redirect('admin/testimonials');
	}
	
}
