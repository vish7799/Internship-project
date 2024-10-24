<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include "My_controller.php";

class Faq extends My_controller {
	
	public function __construct()
	{
		parent::__construct();	
		$this->load->model("admin/Faq_model", "faq");
	}

	public function index($page = 1)
	{
		$page_data['faqs'] 		=	$this->faq->get_faqs($page);
		$count 						=	$this->faq->get_all_pages_count();
		$page_data['pagination']	=	$this->faq->get_pagination($count,$page,site_url().'faq/index/');
		
		
		$page_data['page_name'] 		= 	'faq/index';
		$page_data['page_title'] 		= 	'FAQ';
		$page_data['menu']		 		= 	'FAQ';
		$this->load->view('admin/index',$page_data);
		
	}
	
	public function add($page = 1){
		
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		if ($this->form_validation->run() == FALSE){
		
			$page_data['page_name'] 		= 	'faq/add';
			$page_data['page_title'] 		= 	'FAQ - Add FAQ';
			$page_data['menu']		 		= 	'FAQ';
			
			$this->load->view('admin/index',$page_data);
		}else{
			
			$post = $this->input->post();
			$this->faq->add_faq($post);
			$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Message!</h4>FAQ added successfully.</div>');
			redirect('admin/faq');
		}
		
	}
	public function edit($page_id = 0){
		
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		
		if ($this->form_validation->run() == FALSE){
			$page_data['faq'] 			=	$this->faq->get_faq_info($page_id);
			$page_data['page_name'] 	= 	'faq/edit';
			$page_data['page_title'] 	= 	'FAQ - Edit FAQ';
			$page_data['menu']		 	= 	'FAQ';
			$this->load->view('admin/index',$page_data);
		}else{
			
			$post = $this->input->post();
			$page_id	=	$post['page_id'];
			unset($post['page_id']);
			
			$this->faq->update_faq($page_id,$post);
			
			$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Message!</h4>FAQ updated successfully.</div>');
			redirect('admin/faq');
		}
	}
	
	function delete($faq_id){
		$where["id"] = $faq_id;
		$this->faq->delete($where,"faq");
		$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Message!</h4>CMS page deleted successfully.</div>');
		redirect('admin/faq');
	}
	
	function status_change($id =0, $status=""){
		
		$this->faq->status_change($id, $status, "faq");
		
		$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Message!</h4>FAQ Updated Successfully.</div>');
		redirect('admin/faq');
	}
	
}
