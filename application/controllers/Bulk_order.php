<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include "My_controller.php";

class Bulk_order extends My_controller {
	
	public function __construct()
	{
		parent::__construct();	
		$this->load->model("Front_model", "front");
	}

	public function index()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('category', 'Category', 'required');
		$this->form_validation->set_rules('qty', 'Qty', 'required');
		$this->form_validation->set_rules('expected_delivery_date', 'Expected Delivery Date', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		$this->form_validation->set_rules('message', 'Message', 'required');
		
		if ($this->form_validation->run() == FALSE){
			
			$page_data['title']				=	get_setting('meta_title');
			$page_data['meta_keywords']		=	get_setting('meta_keywords');
			$page_data['meta_description']	=	get_setting('meta_description');
			
			$page_data['page_name'] 		= 	'bulk_order/index';
			$page_data['page_title'] 		= 	"Bulk Order";
			$page_data['menu'] 				= 	"Bulk Order";
			$this->load->view('index',$page_data);
		
		}else{
		
			$post 					= 	$this->input->post();
			$post['status']			=	'1';
			$post['created']		=	time();
			$post['modified']		=	time();
			
			
			$this->front->save_bulk_order($post);
			
			$html 	= "Hello Admin,<br><br>You have an Bulk Order Enquiry. Please check below:<br><br>";
			$html	.=	"<b>Name: </b>".$post['name']."<br />";
			$html	.=	"<b>Email: </b>".$post['email']."<br />";
			$html	.=	"<b>Phone: </b>".$post['phone']."<br />";
			$html	.=	"<b>Category: </b>".get_product_category_name($post['category'])."<br />";
			$html	.=	"<b>Qty: </b>".$post['qty']."<br />";
			$html	.=	"<b>Expected Delivery Date: </b>".$post['expected_delivery_date']."<br />";
			$html	.=	"<b>Message: </b>".$post['message']."<br />";
			$html 	.= 	"<br><br>Thank you,<br>Team MastiKhor<br>";
			
			//pr($html);
			
			$to			=	"ankit.kaasam@gmail.com";
			$subject	=	"Mastikhor : Bulk Order Enquiry";
			
			$config = Array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.gmail.com',
				'smtp_port' => 465,
				'smtp_user' => 'mastikhorkimasti@gmail.com',
				'smtp_pass' => 'ankit3007jain',
				'mailtype'  => 'html', 
				'charset'   => 'iso-8859-1',
				'wordwrap' 	=> True
			);
			$this->load->library('email', $config);
			$this->email->from('Mastikhor','info@mastikhor.co.in');
			$this->email->to($to);
			$this->email->subject($subject);
			$this->email->message($html);
			
			$this->email->set_newline("\r\n");


			$result = $this->email->send();
			
			$_SESSION['msg'] = '<div class="form_msg_flash">Thank You for contacting us. We will get in touch with you shortly!</div>';
			redirect(site_url()."bulk_order");
		
		}
	}
	
	
}
