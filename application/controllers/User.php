<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include "My_controller.php";

class User extends My_controller {
	
	public function __construct()
	{
		parent::__construct();	
		$this->load->model("Home_model", "home");
		$this->load->model("Front_model", "front");
		$this->load->model("User_model", "user");
		
		$this->load->library('Pdf');

	}

	public function index(){
		
		if(!isset($_SESSION['user'])){
			
			redirect(site_url()."login");
			
		}
		
		
		$page_data['title']				=	get_setting('meta_title');
		$page_data['meta_keywords']		=	get_setting('meta_keywords');
		$page_data['meta_description']	=	get_setting('meta_description');
		
		$page_data['page_name'] 		= 	'user/index';
		$page_data['page_title'] 		= 	'User';
		$page_data['menu']		 		= 	'User';
		$this->load->view('index',$page_data);	
	}
	
	
	public function wishlist(){
		
		if(!isset($_SESSION['user'])){
			$_SESSION['page']	=	"user/wishlist";
			redirect(site_url()."login");	
		}
		$user_id						=	$_SESSION['user']->id;
		$page_data['user_wishlists'] 	= 	$this->user->get_wishlist($user_id);
		
		$page_data['title']				=	get_setting('meta_title');
		$page_data['meta_keywords']		=	get_setting('meta_keywords');
		$page_data['meta_description']	=	get_setting('meta_description');
		
		$page_data['page_name'] 		= 	'user/wishlist';
		$page_data['page_title'] 		= 	'User';
		$page_data['menu']		 		= 	'User Wishlist';
		
		$this->load->view('index',$page_data);	
	}
	
	public function address_book(){
		
		if(!isset($_SESSION['user'])){
			$_SESSION['page']	=	"user/address_book";
			redirect(site_url()."login");	
		}
		$user_id						=	$_SESSION['user']->id;
		$page_data['user_address'] 		= 	$this->user->get_user_address($user_id);
		
		$page_data['title']				=	get_setting('meta_title');
		$page_data['meta_keywords']		=	get_setting('meta_keywords');
		$page_data['meta_description']	=	get_setting('meta_description');
		
		$page_data['page_name'] 		= 	'user/address_book';
		$page_data['page_title'] 		= 	'User';
		$page_data['menu']		 		= 	'User Address Book';
		
		$this->load->view('index',$page_data);	
	}
	
	public function edit_address($address_id){
			
		if(!isset($_SESSION['user'])){
			$_SESSION['page']	=	"user/address_book";
			redirect(site_url()."login");
		}
		
		$this->load->library('form_validation');
		 
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('add_line_1', 'Ad Line 1', 'required');
		$this->form_validation->set_rules('add_line_2', 'Ad Line 2', 'required');
		$this->form_validation->set_rules('pincode', 'Pincode', 'required');
		
		if ($this->form_validation->run() == FALSE){
			
			$page_data['address'] 			= 	$this->user->get_address_info($address_id);
			$page_data['address_id'] 		= 	$address_id;
			
			$page_data['title']				=	get_setting('meta_title');
			$page_data['meta_keywords']		=	get_setting('meta_keywords');
			$page_data['meta_description']	=	get_setting('meta_description');
		
			$page_data['page_name'] 		= 	'user/edit_address';
			$page_data['page_title'] 		= 	'User Edit Address';
			$page_data['menu']		 		= 	'User Address Book';
			$this->load->view('index',$page_data);	
		
		}else{
			
			$post 							= 	$this->input->post();
			$addressid						=	$post['addressid'];
			unset($post['addressid']);
			$this->user->update_address($post, $addressid);
			
			$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Message!</h4>Your Address Update successfully.</div>');
			redirect('user/address_book');
			
		}
		
	}
	
	public function wishlist_remove($product_id){
		
		if(!isset($_SESSION['user'])){
			$_SESSION['page']	=	"user/wishlist";
			redirect(site_url()."login");	
		}
		$user_id						=	$_SESSION['user']->id;
		$wishlist_remove 				= 	$this->user->wishlist_remove($product_id, $user_id);
		
		redirect(site_url()."user/wishlist");
	}
	
	
	public function orders(){
		
		if(!isset($_SESSION['user'])){
			
			redirect(site_url()."login");
			
		}
		
		$user_id						=	$_SESSION['user']->id;
		
		$page_data['user_orders'] 		= 	$this->user->get_orders($user_id);
		
		$page_data['title']				=	get_setting('meta_title');
		$page_data['meta_keywords']		=	get_setting('meta_keywords');
		$page_data['meta_description']	=	get_setting('meta_description');
		
		$page_data['page_name'] 		= 	'user/orders';
		$page_data['page_title'] 		= 	'User';
		$page_data['menu']		 		= 	'User Order';
		$this->load->view('index',$page_data);	
	}
	
	public function order_detail($id){
		
		if(!isset($_SESSION['user'])){
			redirect(site_url()."login");
		}
		
		$user_id						=	$_SESSION['user']->id;
		$order_id						=	$id;
		
		$page_data['order_detail'] 		= 	$this->user->get_order_detail($order_id, $user_id);
		$page_data['categories'] 		= 	$this->home->get_category();
		$page_data['feature_products'] 	= 	$this->home->get_feature_products();
		
		$page_data['title']				=	get_setting('meta_title');
		$page_data['meta_keywords']		=	get_setting('meta_keywords');
		$page_data['meta_description']	=	get_setting('meta_description');
		
		$page_data['page_name'] 		= 	'user/order_detail';
		$page_data['page_title'] 		= 	'User';
		$page_data['menu']		 		= 	'User Order Detail';
		$this->load->view('index',$page_data);	
	}
	
	
	public function edit_profile(){
			
		if(!isset($_SESSION['user'])){
			redirect(site_url()."login");
		}
		
		$this->load->library('form_validation');
		 
		$original_value = $_SESSION['user']->email;
		if($this->input->post('email') != $original_value) {
		   $is_unique =  '|is_unique[users.email]';
		} else {
		   $is_unique =  '';
		}
		
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email'.$is_unique);
		$this->form_validation->set_rules('firstname', 'First Name', 'required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'required');
		$this->form_validation->set_rules('mobile_number', 'Mobile Number', 'required');
		
		if ($this->form_validation->run() == FALSE){
			
			$page_data['user'] 				= 	$this->user->get_user_info();
			
			$page_data['title']				=	get_setting('meta_title');
			$page_data['meta_keywords']		=	get_setting('meta_keywords');
			$page_data['meta_description']	=	get_setting('meta_description');
		
			$page_data['page_name'] 		= 	'user/edit_profile';
			$page_data['page_title'] 		= 	'User Edit Profile';
			$page_data['menu']		 		= 	'User Edit Profile';
			$this->load->view('index',$page_data);	
		
		}else{
			
			$post 							= 	$this->input->post();
			$this->user->update_user($post, $_SESSION['user']->id);
			
			$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Message!</h4>Your Profile Update successfully.</div>');
			redirect('user/edit_profile');
			
		}
		
	}
	
	
	public function change_password(){
			
		if(!isset($_SESSION['user'])){
			redirect(site_url()."login");
		}
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('new_password', 'New Password', 'required');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');
		
		if ($this->form_validation->run() == FALSE){
			
			$page_data['user'] 				= 	$this->user->get_user_info();
			
			$page_data['title']				=	get_setting('meta_title');
			$page_data['meta_keywords']		=	get_setting('meta_keywords');
			$page_data['meta_description']	=	get_setting('meta_description');
		
			$page_data['page_name'] 		= 	'user/change_password';
			$page_data['page_title'] 		= 	'User Change Password';
			$page_data['menu']		 		= 	'User Change Password';
			$this->load->view('index',$page_data);	
		
		}else{
			
			$post 							= 	$this->input->post();
			$post['password']				=	sha1($post['new_password']); 
			unset($post['new_password']);
			unset($post['confirm_password']);
			$this->user->update_user($post, $_SESSION['user']->id);
			
			$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Message!</h4>Your Profile Password chnaged successfully.</div>');
			redirect('user/edit_profile');
			
		}
		
	}
	
	
	public function feedback($product_id){
			
		if(!isset($_SESSION['user'])){
			redirect(site_url()."login");
		}
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('feedback', 'Feedback', 'required');
		
		if ($this->form_validation->run() == FALSE){
			
			$page_data['product_id'] 		= 	$product_id;
			
			$page_data['title']				=	get_setting('meta_title');
			$page_data['meta_keywords']		=	get_setting('meta_keywords');
			$page_data['meta_description']	=	get_setting('meta_description');
		
			$page_data['page_name'] 		= 	'user/feedback';
			$page_data['page_title'] 		= 	'User Feedback';
			$page_data['menu']		 		= 	'User Feedback';
			$this->load->view('index',$page_data);	
		
		}else{
			
			$post 							= 	$this->input->post();
			pr($post);
			
			$this->user->update_user($post, $_SESSION['user']->id);
			
			$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Message!</h4>Your Profile Password chnaged successfully.</div>');
			redirect('user/orders');
			
		}
		
	}
	
	
	
	function logout(){
		
		unset($_SESSION['user_login']);
		unset($_SESSION['user']);
		unset($_SESSION['cartdata']);
		unset($_SESSION['discounted_amount']);
		unset($_SESSION['item_total']);
		
		redirect(site_url());
		
	}
	
	
	function download_invoice($order_id){
		
		$user_id						=	$_SESSION['user']->id;
		$order_detail 					= 	$this->user->get_order_detail($order_id, $user_id);
		
		$pdf 							= 	new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);


		$pdf->SetCreator('A1NUTRI');
		$pdf->SetAuthor('Download');
		$pdf->SetTitle('Download Invoice');
		$pdf->SetSubject('');
		$pdf->SetKeywords('Invoice');

		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $order_detail->invoice_id.' Invoice'.' Download', 'Invoice');

		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetMargins('5', PDF_MARGIN_TOP, '5');
		$pdf->SetHeaderMargin('10');
		$pdf->SetFooterMargin('10');

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, '15');

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		
		// add a page
		$pdf->AddPage();
		
		$address			=	get_address($order_detail->AddressId);
		//pr($address);
		
		$html = '
		<table cellpadding="5" cellspacing="5" border="0">
			<tr>
				<td style="text-align:left; font-size:100%;"><img src="https://www.indicottshop.com/assets/img/logo.png"></td>
				<td style="text-align:right; font-size:100%;"><strong>Tax Invoice / Bill of Supply / Cash Memo</strong><br />(Original for Recipient)</td>
			</tr>
			
			<tr>
				<td style="text-align:left; font-size:100%;">
					<strong>Sold By :</strong><br />
					Sreeja, 178 ganesh nagar,<br />Sitapura Ind.Area,<br />Jaipur 302022
				</td>
				<td style="text-align:right; font-size:100%;">
					<strong>Billing Address :</strong><br />
					'.$address->add_line_1.'<br />
					'.$address->add_line_2.'<br />
					'.$address->locality.','.$address->pincode.'<br />
					
				</td>
			</tr>
			
			<tr>
				<td style="text-align:left; font-size:100%;">
					<strong>PAN No:</strong> CBBPS7177Q<br />
					<strong>GST Registration No:</strong> 08CBBPS7177Q1ZN
				</td>
				<td style="text-align:right; font-size:100%;">
					<strong>Order Number:</strong> '.$order_detail->invoice_id.'<br />
					<strong>Order Date:</strong> '.date("d F, Y", $order_detail->txn_date).'
				</td>
			</tr>
		
		</table><br /><br />';
		
		$itemDetail	=	json_decode($order_detail->itemDetail);
		$html	.=	'
		<table cellpadding="10" cellspacing="1" border="1" style="font-size:12px;">
			<tr style="height:50px; font-weight:bold; font-size:11px;">
				<td style="width:5%;">S. No</td>
				<td style="width:33%;">Description</td>
				<td style="width:8%;">Unit Price</td>
				<td style="width:10%; text-align:center;">Qty</td>
				<td style="width:9%; text-align:center;">Net Amount</td>
				<td style="width:8%; text-align:center;">Tax Rate</td>
				<td style="width:12%; text-align:center;">Tax Amount</td>
				<td style="">Total Amount</td>
			</tr>';
		
		$total_gst_amount		=	0;
		//pr($order_detail);
		foreach($itemDetail as $key=>$itemdetails){ 
		$key					=	$key+1;
		$gst					=	get_product_gst_by_id($itemdetails->product_id);
		$gst_amount				=	gst_calulator($itemdetails->product_offer_price, $gst);
		$unit_price				=	$itemdetails->product_offer_price - $gst_amount;
		$total_gst_amount		+=	$gst_amount;
		
		$html	.=	'
			<tr style="height:80px; font-size:9px;">
				<td style=" width:5%; text-align:center;">'.$key.'</td>
				<td style="width:33%; font-size:12px;"><strong>'.$itemdetails->product_name.'</strong><br />Category: '.get_product_category_title($itemdetails->product_category).'</td>
				<td style="width:8%; text-align:center;">'.$unit_price.'</td>
				<td style="width:10%; text-align:center;">'.$itemdetails->qty.'</td>
				<td style="width:9%; text-align:center;">'.$itemdetails->total_amount.'</td>
				<td style="width:8%; text-align:center;">5%</td>
				<td style="width:12%; text-align:center;">'.$gst_amount.'</td>
				<td style=" text-align:center;">'.$itemdetails->total_amount.'</td>
			</tr>';
		}
		
		$html	.=	'
			<tr style="height:50px; font-size:9px;">
				<td colspan="7" style=" width:85%; text-align:left; font-size:12px;">Shipping Amount</td>
				<td style=" text-align:center; font-size:12px;">'.$order_detail->shipping_amount.'</td>
			</tr>';
		
		$html	.=	'
			<tr style="height:50px; font-size:9px;">
				<td colspan="6" style=" width:73%; text-align:left; font-size:12px;"><strong>Total</strong></td>
				<td style="width:12%; text-align:center; font-size:12px;"><strong>'.$total_gst_amount.'</strong></td>
				<td style=" text-align:center; font-size:12px;"><strong>'.$order_detail->TransactionAmt.'</strong></td>
			</tr>';
			
		$html	.=	'</table>';
		// output the HTML content
		$pdf->writeHTML($html, true, false, true, false, '');

		// reset pointer to the last page
		$pdf->lastPage();

		
		//Close and output PDF document
		$pdf->Output('invoice.pdf', 'I');
		
	}
	
}
