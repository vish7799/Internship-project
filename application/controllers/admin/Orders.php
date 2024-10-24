<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include "My_controller.php";

class Orders extends My_controller {
	
	public function __construct()
	{
		parent::__construct();	
		$this->load->library('Pdf');

	}

	public function index()
	{
		$post = $this->input->post();
		if(isset($post['submit']) && $post['submit']== 'yes'){
			$order_id				=	$post['order_id'];
			$customer_name			=	$post['customer_name'];
			$order_status			=	$post['order_status'];
			$page_data['orders'] 	= 	$this->crud->advanceOrderSearch($order_id, $customer_name, $order_status);
			//echo "<pre>";
			//print_r($page_data['orders']);
			//echo "</pre>";
			//die;
			$page_data['page_name'] 	= 	'orders/index';
			$page_data['page_title'] 	= 	'Orders';
			$page_data['menu']		 	= 	'Orders';
			$this->load->view('admin/index',$page_data);
			
		}else{
		
			//pr($this->input->post);
			$page_data['orders'] 		=	$this->crud->get_all_orders();
			// echo "<pre>";
			// print_r($page_data['orders']);
			// echo "</pre>";
			$page_data['page_name'] 	= 	'orders/index';
			$page_data['page_title'] 	= 	'Orders';
			$page_data['menu']		 	= 	'Orders';
			$this->load->view('admin/index',$page_data);
		}
	}
	
	public function edit_order($id = 0){
		$this->form_validation->set_rules('note', 'Note', 'required');
		
		if ($this->form_validation->run() == FALSE){
			$page_data['orders'] 		=	$this->crud->get_order_info($id);
			
			$page_data['page_name'] 	= 	'orders/edit_order';
			$page_data['page_title'] 	= 	'Update Order';
			$page_data['menu']		 	= 	'Customer';
			
			$this->load->view('admin/index',$page_data);
		
		}else{
			
			$post 						= 	$this->input->post();
			$order_id					=	$post['order_id'];
			$customer_id				=	$post['customer_id'];
			
			unset($post['order_id']);
			unset($post['customer_id']);
			
			$customer 		=	$this->crud->get_users_info($customer_id);
			
			$this->crud->update_order($order_id,$post);
			$this->crud->insert_order_status($order_id, $customer_id, $post);
			$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Message!</h4>Order updated successfully.</div>');
			redirect('admin/orders');
		}
	}

	
	public function view_bill_old($id = 0){
		
		$page_data['orders'] 		=	$this->crud->get_order_info($id);
		//pr($page_data);
		$this->load->view('admin/orders/view_bill',$page_data);
		
	}
	
	function view_bill($order_id){
		
		$order_detail 					= 	$this->crud->get_order_info($order_id);
		
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
				<td style="text-align:left; font-size:100%;"><img src="https://www.sreejaa.com/assets/img/logo.png"></td>
				<td style="text-align:right; font-size:100%;"><strong>Tax Invoice / Bill of Supply / Cash Memo</strong><br />(Original for Recipient)</td>
			</tr>
			
			<tr>
				<td style="text-align:left; font-size:100%;">
					<strong>Sold By :</strong><br />
					SREEJAA,<br />87, kushal nagar,behind sdc apartments,<br />Jaipur - 302029, Rajasthan (08), India<br />
					Ph No: 08955368696
				</td>
				<td style="text-align:right; font-size:100%;">
					<strong>Billing Address :</strong><br />
					<b>'.get_user_name($address->user_id).'</b><br />
					'.$address->add_line_1.'<br />
					'.$address->add_line_2.'<br />
					'.$address->locality.','.$address->pincode.'<br />
					Ph No: '.get_user_mobile($address->user_id).'<br />
					
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
				<td style="width:33%; font-size:12px;"><strong>'.$itemdetails->product_name.'</strong><br />Category: '.get_product_category_title($itemdetails->product_category).'<br />Product Code: '.get_product_sku($itemdetails->product_id).'</td>
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
				<td colspan="7" style=" width:85%; text-align:right; font-size:12px;" >Shipping Amount</td>
				<td style=" text-align:center; font-size:12px;">'.$order_detail->shipping_amount.'</td>
			</tr>';
		
		$html	.=	'
			<tr style="height:50px; font-size:9px;">
				<td colspan="6" style=" width:73%; text-align:left; font-size:12px;"><strong>Total</strong></td>
				<td style="width:12%; text-align:center; font-size:12px;"><strong>'.$total_gst_amount.'</strong></td>
				<td style=" text-align:center; font-size:12px;"><strong>'.$order_detail->TransactionAmt.'</strong></td>
			</tr>';
		
		$html	.=	'
			<tr style="height:50px; font-size:9px;">
				<td colspan="8" style=" width:85%; text-align:left; font-size:12px;">Amount Chargeable (in words): <b>'.numberTowords(sprintf("%.2f", $order_detail->TransactionAmt)).'</b></td>
				
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
