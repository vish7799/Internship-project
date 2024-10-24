<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include "My_controller.php";

class Coupon_discount extends My_controller {
	
	public function __construct()
	{
		parent::__construct();	
		$this->load->model("admin/Coupon_discount_model", "coupon_discount");
	}
	
	public function index($page = 1)
	{
		$searchTerm	=	"";
		if($this->input->post()){
			$post 		= $this->input->post();
			$searchTerm	= $post['searchTerm'];	
		}
		
		$page_data['coupons'] 					=	$this->coupon_discount->get_all_coupon_discount($page,$searchTerm);
		$count 									=	$this->coupon_discount->get_all_coupon_discount_count($searchTerm);
		$page_data['pagination']				=	$this->coupon_discount->get_pagination($count,$page,site_url().'admin/coupon_discount/index/');
		
		$page_data['page_name'] 				= 	'coupon_discount/index';
		$page_data['page_title'] 				= 	'Coupon Discount';
		$page_data['menu']		 				= 	'Coupon Discount';
		$this->load->view('admin/index',$page_data);
	}
	
	public function add()
	{
		$this->form_validation->set_rules('ctype', 'Coupon Type', 'required');
		$this->form_validation->set_rules('cvalue', 'Coupon Value', 'required');
		$this->form_validation->set_rules('ccode', 'Coupon Code', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		
		if ($this->form_validation->run() == FALSE){
			
			$page_data['page_name'] 			= 	'coupon_discount/add';
			$page_data['page_title'] 			= 	'Add Coupon Discount';
			$page_data['menu']		 			= 	'Coupon Discount';
			$this->load->view('admin/index',$page_data);
			
		}else{
			
			$post 								= 	$this->input->post();
			$post['created']					=	time();
			
			$this->coupon_discount->add_coupon_discount($post);
			$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Message!</h4>Coupon Discount added successfully.</div>');
			redirect('admin/coupon_discount');
		}
	}
	
	public function edit($coupon_discount_id = 0){
		
		$this->form_validation->set_rules('ctype', 'Coupon Type', 'required');
		$this->form_validation->set_rules('cvalue', 'Coupon Value', 'required');
		$this->form_validation->set_rules('ccode', 'Coupon Code', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		
		if ($this->form_validation->run() == FALSE){
			
			$page_data['coupon_discount'] 		=	$this->coupon_discount->get_coupon_discount_info($coupon_discount_id);
			$page_data['page_name'] 			= 	'coupon_discount/edit';
			$page_data['page_title'] 			= 	'Edit Coupon Discount';
			$page_data['menu']		 			= 	'Coupon Dscount';
			
			$this->load->view('admin/index',$page_data);
		
		}else{
			
			$post 						= 	$this->input->post();
			
			$id			=	$post['id'];
			unset($post['id']);
			
			$this->coupon_discount->update_coupon_discount($id, $post);
			$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Message!</h4>Coupon Discount updated successfully.</div>');
			redirect('admin/coupon_discount');
		}
	}
	
	function delete($id =0){
		$where["id"] 			= 	$id;
		$this->coupon_discount->delete($where, "coupon_discount");
		
		$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Message!</h4>Coupon Discount deleted successfully.</div>');
		redirect('admin/coupon_discount');
	}
	
	function status_change($id =0, $status){
		
		$this->coupon_discount->status_change($id, $status, "coupon_discount");
		
		$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Message!</h4>Coupon Discount Updated Successfully.</div>');
		redirect('admin/coupon_discount');
	}
}
