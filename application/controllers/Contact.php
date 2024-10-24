<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include "My_controller.php";

class Contact extends My_controller {
	
	public function __construct()
	{
		parent::__construct();	
		$this->load->model("Front_model", "front");
	}

	public function index()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('subject', 'Subject', 'required');
		$this->form_validation->set_rules('mobile', 'Phone', 'required');
		$this->form_validation->set_rules('message', 'Message', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$page_data['title']				=	get_setting('meta_title');
			$page_data['meta_keywords']		=	get_setting('meta_keywords');
			$page_data['meta_description']	=	get_setting('meta_description');
			
			$page_data['canonical']			=	"https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
			$page_data['og_url']			=	"https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
			$page_data['og_title']			=	get_setting('meta_title');
			$page_data['og_description']	=	get_setting('meta_description');
			$page_data['og_site_name']		=	"Company DISCOUNT Shop";
			$page_data['og_type']			=	"website";
			$page_data['og_image']			=	site_url()."assets/img/logo.png";
			$page_data['data1']				=	$page_data['title'];
			
			$page_data['page_name'] 		= 	'contact/index';
			$page_data['page_title'] 		= 	"Contact US";
			$page_data['menu'] 		= 	"Contact US";
			$this->load->view('index',$page_data);
		}else{
			$post 					= 	$this->input->post();
			$this->front->save_inquiry($post);
			$html = "Hello Admin,<br><br>You have an Inquiry. Please check below:<br><br>";
			foreach($post as $k=>$p){
				$html .= ucwords(str_replace("_", " ", $k)) . ": " . $p . "<br>";
			}
			
			$html .= "<br><br>Thank you,<br>La Pearl<br>";
			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			// More headers
			$headers .= 'From: <webmaster@example.com>' . "\r\n";
			$headers .= 'Cc: myboss@example.com' . "\r\n";
			$subject	=	"You have an Inquiry!";
			
			$to	=	"ankit.kaasam@gmail.com";
			
			//mail($to,$subject,$html,$headers);
			
			//$this->session->set_flashdata('msg','<div class="form_msg_flash">Thank You for contacting us. We will get in touch with you shortly!</div>');
			$_SESSION['msg'] = '<div class="form_msg_flash">Thank You for contacting us. We will get in touch with you shortly!</div>';
			redirect(site_url()."contact");
		}
	}
	
	
}
