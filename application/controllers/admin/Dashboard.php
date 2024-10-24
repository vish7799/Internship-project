<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include "My_controller.php";

class Dashboard extends My_controller {

	
	public function __construct()
	{
		parent::__construct();	
		$this->load->model("admin/Crud_model", "crud");
	}

	public function index()
	{
		$page_data['page_name'] = 'dashboard/index';
		$page_data['page_title'] = 'Dashboard';
		$page_data['menu']		 	= 'Dashboard';
		$this->load->view('admin/index',$page_data);
	}
	
	
	public function inquiry($page = 1)
	{
		$page_data['inquires'] 		=	$this->crud->get_inquiry($page);
		$count 						=	$this->crud->get_all_inquiry_count();
		$page_data['pagination']	=	$this->crud->get_pagination($count,$page,site_url().'dashboard/inquiry/');
		
		
		$page_data['page_name'] 		= 	'dashboard/inquiry';
		$page_data['page_title'] 		= 	'Contact Us Inquiry';
		$page_data['menu']		 		= 	'Contact Us Inquiry';
		$this->load->view('admin/index',$page_data);
		
	}
	
	public function enquiry($page = 1)
	{
		$page_data['inquires'] 		=	$this->crud->get_enquiry($page);
		$count 						=	$this->crud->get_all_enquiry_count();
		$page_data['pagination']	=	$this->crud->get_pagination($count,$page,site_url().'dashboard/enquiry/');
		
		
		$page_data['page_name'] 		= 	'dashboard/enquiry';
		$page_data['page_title'] 		= 	'Enquiry';
		$page_data['menu']		 		= 	'Enquiry';
		$this->load->view('admin/index',$page_data);
		
	}
	
	public function consultation($page = 1)
	{
		$page_data['inquires'] 		=	$this->crud->get_consultation($page);
		$count 						=	$this->crud->get_all_consultation_count();
		$page_data['pagination']	=	$this->crud->get_pagination($count,$page,site_url().'dashboard/consultation/');
		
		
		$page_data['page_name'] 		= 	'dashboard/consultation';
		$page_data['page_title'] 		= 	'Consultation';
		$page_data['menu']		 		= 	'Consultation';
		$this->load->view('admin/index',$page_data);
		
	}
	
	function settings(){
		$this->form_validation->set_rules('limit', 'Limit Per Page', 'required');
		$this->form_validation->set_rules('admin_email', 'Admin Email', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$page_data['page_name'] = 'dashboard/settings';
			$page_data['page_title'] = 'Settings';
			$page_data['menu']		 	= 'Dashboard';
			$this->load->view('admin/index',$page_data);
		}else{
			$this->crud->update_settings();
			$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Message!</h4>Settings updated successfully.</div>');
			redirect('admin/dashboard/settings');
		}
	}
	
	function show_date_time(){
		date_default_timezone_set('asia/kolkata');
		echo $timestamp = date('d M, Y h:i:s A');
		die;
	}
}
