<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include "My_controller.php";

class Slider extends My_controller {
	
	public function __construct()
	{
		parent::__construct();	
		$this->load->model("admin/Slider_model", "slider");
	}

	public function index($page = 1)
	{
		$this->form_validation->set_rules('id', 'ID', 'required');
		if(isset($_FILES['image']) && $_FILES['image']['name'][0]=="")
		{
			$this->form_validation->set_rules('image', 'Image', 'required');
			
		}
		if ($this->form_validation->run() == FALSE)
		{
			$page_data['images']			=	$this->slider->getImages();
			$page_data['page_name'] 		= 	'slider/index';
			$page_data['page_title'] 		= 	'Homepage Slider';
			$page_data['menu']		 		= 	'Slider';
			$this->load->view('admin/index',$page_data);
			
		}else{
			
			$other_image = $_FILES['image'];
			$cntr = count($other_image);
			for($i=0;$i<$cntr;$i++){
				
				if(isset($other_image['name'][$i])){
					$_FILES['image']['name']= $other_image['name'][$i];
					$_FILES['image']['type']= $other_image['type'][$i];
					$_FILES['image']['tmp_name']= $other_image['tmp_name'][$i];
					$_FILES['image']['error']= $other_image['error'][$i];
					$_FILES['image']['size']= $other_image['size'][$i];
			
			
					$ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
					$config	=	array();
					$config['upload_path']          = './assets/photo/slider';
					$config['allowed_types']        = 'gif|jpg|png|jpeg';
					$config['file_name']            = "slider_".rand(1000,9999). "_" . time().'.'.$ext;
					
					$this->load->library('upload', $config);

					if ( ! $this->upload->do_upload('image'))
					{
						$error = array('error' => $this->upload->display_errors());						
					}
					else
					{
						$data = $this->upload->data();
						$this->slider->add_slider_image($data['file_name']);
					}
				}
			}
			$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Message!</h4>image(s) added successfully.</div>');
			redirect('admin/slider');
			
			
		}
	}
	
	public function edit($page_id = 0){
		$this->form_validation->set_rules('status', 'Status', 'required');
		
		if ($this->form_validation->run() == FALSE){
			$page_data['page'] 			=	$this->slider->get_image_info($page_id);
			$page_data['page_name'] 	= 	'slider/edit';
			$page_data['page_title'] 	= 	'Slider - Edit';
			$page_data['menu']		 	= 	'Slider';
			
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
				$ext 							= 	pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
				$config['upload_path']          = 	'./assets/photo/slider/';
				$config['allowed_types']        = 	'gif|jpg|png|jpeg';
				$config['file_name']           	= 	"slider_".rand(1000,9999). "_" . time().'.'.$ext;
				
				if(file_exists($config['upload_path'].$post['old_image']) && is_file($config['upload_path'].$post['old_image'])){
					unlink($config['upload_path'].$post['old_image']);
					unset($post['old_image']);
				}else{
					$post['image'] = $post['old_image'];
					unset($post['old_image']);
				}
				
				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('image')){
					$error = array('error' => $this->upload->display_errors());
					print_r($error);
					exit;
				}else{
					$data 			= 	$this->upload->data();
					$post['image'] 	= 	$data['file_name'];
				}
			}else{
				$post['image'] = $post['old_image'];
				unset($post['old_image']);
			}
			
			
			if(isset($_FILES['mimage']['name']) && $_FILES['mimage']['name']!=''){
				$ext 							= 	pathinfo($_FILES['mimage']['name'], PATHINFO_EXTENSION);
				$config['upload_path']          = 	'./assets/photo/slider/';
				$config['allowed_types']        = 	'gif|jpg|png|jpeg';
				$config['file_name']           	= 	"mobile_slider_".rand(1000,9999). "_" . time().'.'.$ext;
				
				if(file_exists($config['upload_path'].$post['old_mimage']) && is_file($config['upload_path'].$post['old_mimage'])){
					unlink($config['upload_path'].$post['old_mimage']);
					unset($post['old_mimage']);
				}else{
					$post['mimage'] = $post['old_mimage'];
					unset($post['old_mimage']);
				}
				
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				
				if ( ! $this->upload->do_upload('mimage')){
					$error = array('error' => $this->upload->display_errors());
					print_r($error);
					exit;
				}else{
					$data 			= 	$this->upload->data();
					$post['mimage'] 	= 	$data['file_name'];
				}
			}else{
				$post['mimage'] = $post['old_mimage'];
				unset($post['old_mimage']);
			}
			
			
			
			$page_id	=	$post['page_id'];
			unset($post['page_id']);
			//pr($post);
			$this->slider->update_image($page_id,$post);
			
			$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Message!</h4>Slider updated successfully.</div>');
			redirect('admin/slider');
		}
	}
	
	function delete($image_id){
		
		$image = $this->slider->get_image_info($image_id);
		if(file_exists("./assets/photo/slider/".$image->image)){
			unlink("./assets/photo/slider/".$image->image);
		}
		
		$where["id"] = $image_id;
		$this->slider->delete($where,"slider");
		$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Message!</h4>Image deleted successfully.</div>');
		redirect('admin/slider');
	}
	
	function status_change($id =0, $status=""){
		
		$this->slider->status_change($id, $status, "slider");
		
		$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Message!</h4>Slider Updated Successfully.</div>');
		redirect('admin/slider');
	}
	
}
