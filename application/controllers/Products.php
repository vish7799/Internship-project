<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include "My_controller.php";
include "Authentication.php";

class Products extends My_controller {
	
	public function __construct()
	{
		parent::__construct();	
		$this->load->model("Home_model", "home");
		$this->load->model("Front_model", "front");
		$this->load->model("Product_model", "product");
		//$this->load->model('payment');       
	}

	public function index($slug = ""){
		
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('mobile', 'Phone', 'required');
		$this->form_validation->set_rules('message', 'Message', 'required');
		if ($this->form_validation->run() == FALSE){
			$product_id			=	get_product_id_by_slug($slug);
			$cookie_name 		= 	"recent_view_product";
			if(!isset($_COOKIE['recent_view_product'])) {
				$cookie_value 				= array();
				array_push($cookie_value,$product_id);
				$cookie_final_value			=	json_encode($cookie_value);
				setcookie($cookie_name, $cookie_final_value, time() + (86400 * 30), "/"); // 86400 = 1 day
			}else{
				$cookie_json_value			=	json_decode($_COOKIE['recent_view_product']);
				if(in_array($product_id, $cookie_json_value)){
					
				}else{
					array_push($cookie_json_value, $product_id);
					$cookie_value			=	$cookie_json_value;
					$cookie_final_value		=	json_encode($cookie_value);
					setcookie($cookie_name, $cookie_final_value, time() + (86400 * 30), "/"); // 86400 = 1 day
				}
			}
			$page_data['products'] 			= 	$this->front->get_product_detail($slug);
			$category_id					=	$page_data['products']->category_id;
			$page_data['likeproducts'] 		= 	$this->front->get_like_product($category_id);
			$page_data['category_name'] 	= 	get_product_name_by_slug($slug);
			
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
			
			$page_data['page_name'] 		= 	'products/index';
			$page_data['page_title'] 		= 	'Product';
			$page_data['menu']		 		= 	'Product';
			
			$this->load->view('index',$page_data);	
		}else{
			$post 					= 	$this->input->post();
			$this->front->save_product_inquiry($post);
			$html = "Hello Admin,<br><br>You have an Inquiry. Please check below:<br><br>";
			foreach($post as $k=>$p){
				$html .= ucwords(str_replace("_", " ", $k)) . ": " . $p . "<br>";
			}
			
			$html .= "<br><br>Thank you,<br>Company DISCOUNT Shop<br>";
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
			redirect(site_url()."products/".$slug);
		}
	}
	
	public function featured_products()
	{
		$page_data['featured_products'] 			= 	$this->front->get_featured_products();
		$page_data['page_name'] 					= 	'products/featured_products';
		$page_data['page_title'] 					= 	'Product';
		$page_data['menu']		 					= 	'Featured Product';
		
		$this->load->view('index',$page_data);	
	}
	
	public function add_to_cart(){
		
		$post['cart'] 					= 	$this->input->post();
		if(isset($post['cart']['size']) && $post['cart']['size'] != ""){
			
			$post['cart']['total_amount']	=	$post['cart']['qty']*$post['cart']['product_offer_price'];	
		
			if(isset($_SESSION['cartdata'])){
				array_push($_SESSION['cartdata'],$post['cart']);
			}else{
				$_SESSION['cartdata']	=	array();
				array_push($_SESSION['cartdata'],$post['cart']);		
			}
			//pr($_SESSION['cartdata']);
			//redirect($_SERVER['HTTP_REFERER']);
			redirect('products/checkout');
			
			
			/*if(isset($_SESSION['user'])){
				redirect('products/checkout');
			}else{
				$_SESSION['page']	=	"products/checkout";
				redirect(site_url()."login");
			}*/
		
		}else{
			$_SESSION['sizemsg']	=	"Please Select Size";
			redirect(site_url()."products/".$post['cart']['product_slug']);
		}
		
	
	}
	
	public function checkout(){
		
		
		$this->session->unset_userdata('page');			
		if(isset($_SESSION['cartdata'])){
			
			$page_data['coupons'] 			= 	$this->product->get_coupon();
			
			$page_data['title']				=	get_setting('meta_title');
			$page_data['meta_keywords']		=	get_setting('meta_keywords');
			$page_data['meta_description']	=	get_setting('meta_description');
			
			$page_data['page_name'] 		= 	'products/checkout';
			$page_data['page_title'] 		= 	'Checkout';
			$page_data['menu']		 		= 	'Checkout';
			
			$this->load->view('index',$page_data);
		}else{
			redirect(site_url()."login");
		}
		
	}
	
	public function wishlist($product_id){
		
		
		if(isset($_SESSION['user'])){
			
			$post['user_id']	=	$_SESSION['user']->id;
			$post['product_id']	=	$product_id;
			$product_count 		= 	$this->product->wishlist_product_count($product_id, $post['user_id']);
			
			if($product_count == '0'){
				$insert_id 			=	$this->product->wishlist_save($post);
				$product_slug		=	get_product_slug_by_id($product_id);
				redirect('products/'.$product_slug);
			}else{
				$product_slug		=	get_product_slug_by_id($product_id);
				
				redirect('products/'.$product_slug);
			}
		}else{
			$_SESSION['page']	=	"products/wishlist/".$product_id;
			redirect(site_url()."login");
		}
		
		
	}
	
	public function billing(){
		
		if(!isset($_SESSION['user'])){
			$_SESSION['page']	=	"products/billing";
			redirect('login');
		}
		
		if(isset($_SESSION['cartdata']) || isset($_SESSION['user'])){
			
			$this->form_validation->set_rules('contact-name', 'Name', 'required');
			$this->form_validation->set_rules('contact-email', 'Email', 'required|valid_email');
			
			if ($this->form_validation->run() == FALSE){
				$page_data['title']				=	get_setting('meta_title');
				$page_data['meta_keywords']		=	get_setting('meta_keywords');
				$page_data['meta_description']	=	get_setting('meta_description');
		
				$page_data['page_name'] 		= 	'products/billing';
				$page_data['page_title'] 		= 	'Billing';
				$page_data['menu']		 		= 	'Billing';
				$user_id						=	$_SESSION['user']->id;
				$page_data['data'] 				= 	$this->product->billing_address_info($user_id);
				
				if(isset($page_data['data']) && !empty($page_data['data'])) {
					$countdata = 1;
				} else {
					$countdata  = '';
				}
				$page_data['data_count']		=	$countdata;
				$this->load->view('index',$page_data);
			}else{
	
				$post 							= 	$this->input->post();
				$post['user_id']				=	$_SESSION['user']->id;
				$post['created']				=	time();
				$post['modified']				=	time();
				
				$this->product->add_address($post);
				
				redirect(site_url()."products/payment");
			}
		}else{
			redirect(site_url()."login");
		}
		
	}
	
	public function billinginfo(){
		
		$this->form_validation->set_rules('address', 'Address', 'required');
		
		if ($this->form_validation->run() == FALSE){
			$user_id						=	$this->session->userdata('user')->id;
			$page_data['user_address'] 		=	$this->product->get_user_address($user_id);
			
			$page_data['title']				=	get_setting('meta_title');
			$page_data['meta_keywords']		=	get_setting('meta_keywords');
			$page_data['meta_description']	=	get_setting('meta_description');
			
			$page_data['page_name'] 		= 	'products/address_book';
			$page_data['page_title'] 		= 	'Address Book';
			$page_data['menu']		 		= 	'Address Book';
			
			$this->load->view('index',$page_data);	
			
		}else{
			$post 							= 	$this->input->post();
			unset($post['product_id']);
			unset($post['amount']);
			
			$address_id	 					= 	$post['address'];
			$this->session->set_userdata(array('address_id'=>$address_id));
			
			redirect(site_url()."products/payment");
		}
	}
	
	public function payment(){
		
		if(isset($_SESSION['cartdata'])){
			
			
			$page_data['title']				=	get_setting('meta_title');
			$page_data['meta_keywords']		=	get_setting('meta_keywords');
			$page_data['meta_description']	=	get_setting('meta_description');
			$page_data['page_name'] 		= 	'products/payment';
			$page_data['page_title'] 		= 	'Payment';
			$page_data['menu']		 		= 	'Payment';			
			$this->load->view('index',$page_data);
		}else{
			$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Message!</h4>Something Went Wrong, please try again.</div>');
			redirect(site_url()."user");
		}
	}
	
	public function finish(){
		
		if(isset($_SESSION['cartdata'])){
			$post['customer_id']				=	$_SESSION['user']->id;
			$post['AddressId']					=	$_SESSION['address_id'];
			$post['PaymentType']				=	'0';
			$post['PaymentStatus']				=	'0';
			$post['txn_date']					=	time();
			$post['TransactionAmt']				=	$_SESSION['final_amount'];
			$post['shipping_amount']			=	$_SESSION['shipping_amount'];
			$post['mainAmt']					=	$_SESSION['item_total'];
			if(isset($_SESSION['coupon_discount'])){
				$post['coupon_code']				=	$_SESSION['coupon_discount']->ccode;
			}else{
				$post['coupon_code']				=	'';
			}
			$post['order_status']				=	'0';
			$post['note']						=	'Your order was placed successfully. We will get back to you shortly';
			$post['itemDetail']					=	json_encode($_SESSION['cartdata']);
			$post['order_type']					=	'ONLINE';
			$order_id 							= 	$this->product->add_order($post);
			
			$post_status['order_status']		=	'0';
			$post_status['note']				=	'Your order was placed successfully. We will get back to you shortly';
			$post_status['customer_id']			=	$_SESSION['user']->id;
			$post_status['order_id']			=	$order_id;
			$status_id 							= 	$this->product->insert_order_status($post_status);
			
			unset($_SESSION['cartdata']);
			unset($_SESSION['item_total']);
			unset($_SESSION['address_id']);
			unset($_SESSION['discounted_amount']);
			unset($_SESSION['final_amount']);
			unset($_SESSION['shipping_amount']);
			unset($_SESSION['coupon_discount']);
			unset($_SESSION['discounted_value']);
		}
		
		$order['ORDER_ID']						=	$order_id;
		$order['CUST_ID']						=	$_SESSION['user']->id;
		$order['INDUSTRY_TYPE_ID']				=	'Retail';
		$order['CHANNEL_ID']					=	'WEB';
		$order['TXN_AMOUNT']					=	$post['TransactionAmt'];
		$_SESSION['orderdata']					=	$order;
		redirect(site_url()."Payment_redirects/");
	}
	
	public function cod(){
		
		if(isset($_SESSION['cartdata'])){
			$post['customer_id']				=	$_SESSION['user']->id;
			$post['AddressId']					=	$_SESSION['address_id'];
			$post['PaymentType']				=	'0';
			$post['PaymentStatus']				=	'0';
			$post['txn_date']					=	time();
			$post['TransactionAmt']				=	$_SESSION['final_amount'];
			$post['shipping_amount']			=	$_SESSION['shipping_amount'];
			$post['mainAmt']					=	$_SESSION['item_total'];
			if(isset($_SESSION['coupon_discount'])){
				$post['coupon_code']				=	$_SESSION['coupon_discount']->ccode;
			}else{
				$post['coupon_code']				=	'';
			}
			$post['order_status']				=	'0';
			$post['note']						=	'Your order was placed successfully. We will get back to you shortly';
			$post['itemDetail']					=	json_encode($_SESSION['cartdata']);
			
			$post['order_type']					=	'COD';
			$order_id 							= 	$this->product->add_order($post);
			//update_protuct_inventory($order_id);
			
			$post_status['order_status']		=	'0';
			$post_status['note']				=	'Your order was placed successfully. We will get back to you shortly';
			$post_status['customer_id']			=	$_SESSION['user']->id;
			$post_status['order_id']			=	$order_id;
			$status_id 							= 	$this->product->insert_order_status($post_status);
			
			unset($_SESSION['cartdata']);
			unset($_SESSION['item_total']);
			unset($_SESSION['address_id']);
			unset($_SESSION['discounted_amount']);
			unset($_SESSION['final_amount']);
			unset($_SESSION['shipping_amount']);
			unset($_SESSION['coupon_discount']);
			unset($_SESSION['discounted_value']);
			
			$page_data['title']				=	get_setting('meta_title');
			$page_data['meta_keywords']		=	get_setting('meta_keywords');
			$page_data['meta_description']	=	get_setting('meta_description');
			
			$page_data['page_name'] 		= 	'products/cod_payment_success';
			$page_data['page_title'] 		= 	'Payment Success';
			$page_data['menu']		 		= 	'Payment Success';
			$this->load->view('index',$page_data);
		}
		
	
	}
	
	public function SabPaisaPgResponse(){
		$query 					= 	$_REQUEST['encResponse'];

		$authKey 				= 	"x0xzPnXsgTq0QqXx";
		$authIV 				= 	"oLA38cwT6IYNGqb3";

		$decText 				= 	null;
		$EncryptDecrypt 		= 	new EncryptDecrypt();
		$decText 				= 	$EncryptDecrypt -> decrypt($query, $authIV, $authKey); 
		//echo $decText;
		$token = strtok($decText,"&");
		//echo $token;
		$i=0;

		while ($token !== false){
			$i						=		$i+1;
			$token1					=		strchr($token, "=");

			$token					=		strtok("&");
			$fstr						=		ltrim($token1,"=");
			//echo "<br>";
			//echo "i-". $i . '='. $fstr;
			//echo '<br>';

			if($i==2)
				$payerEmail=$fstr;
			if($i==3)
				$payerMobile=$fstr;
			if($i==4)
				$clientTxnId=$fstr;
			if($i==5)
				$payerAddress=$fstr;
			if($i==6)
				$amount=$fstr;
			if($i==7)
				$clientCode=$fstr;
			if($i==8)
				$paidAmount=$fstr;
			if($i==9)
				$paymentMode=$fstr;
			if($i==10)
				$bankName=$fstr;
			if($i==11)
				$amountType=$fstr;
			if($i==12)
				$status=$fstr;  
			if($i==13)
				$statusCode=$fstr; 
			if($i==14)
				$challanNumber=$fstr;
			if($i==15)
				$sabpaisaTxnId=$fstr;
			if($i==16)
				$sabpaisaMessage=$fstr;
			if($i==17)
				$bankMessage=$fstr;
			if($i==18)
				$bankErrorCode=$fstr;
			if($i==19)
				$sabpaisaErrorCode=$fstr;
			if($i==20)
				$bankTxnId=$fstr;				
			if($i==21)
				$transDate=$fstr;
	
		}
		
		$post['PaymentType']				=	$paymentMode.' -- '.$bankName;
		$post['PaymentStatus']				=	$status;
		$post['payment_transaction_no']		=	$sabpaisaTxnId;
		$post['respmsg']					=	$sabpaisaMessage.' -- '.$bankMessage;
		$post['payment_json_data']			=	$decText;

		$insert								=	$this->payment->update_customer_order($post, $clientTxnId); 
		
		unset($_SESSION['cartdata']);
		unset($_SESSION['item_total']);
		unset($_SESSION['address_id']);
		unset($_SESSION['discounted_amount']);
		unset($_SESSION['final_amount']);
		unset($_SESSION['shipping_amount']);
		unset($_SESSION['coupon_discount']);
		unset($_SESSION['discounted_value']);

		redirect(site_url()."products/payment_success");
	}
	
	
	public function payment_success(){
		$page_data['title']				=	get_setting('meta_title');
		$page_data['meta_keywords']		=	get_setting('meta_keywords');
		$page_data['meta_description']	=	get_setting('meta_description');

		$page_data['page_name'] 		= 	'products/payment_success';
		$page_data['page_title'] 		= 	'Payment Success';
		$page_data['menu']		 		= 	'Payment Success';
		$this->load->view('index',$page_data);
	}
	
	public function apply_coupon(){
		$post 						= 	$this->input->post();
		
		$coupon_discount			=	get_coupon_info_by_code($post['code']);
		$_SESSION['coupon_discount'] 			= 	$coupon_discount;
		
		redirect(site_url()."products/checkout");
	}
	
	public function update_cart(){
		$post 						= 	$this->input->post();
		unset($_SESSION['cartdata']);
		//pr($post);
		
		for($k=0;$k<=sizeof($post['unit'])-1;$k++){
				
			$item_data['product_offer_price']				=	$post['product_offer_price'][$k];	
			$item_data['product_price']						=	$post['product_price'][$k];	
			$item_data['product_img']						=	$post['product_img'][$k];	
			$item_data['product_slug']						=	$post['product_slug'][$k];	
			$item_data['product_name']						=	$post['product_name'][$k];	
			$item_data['product_category']					=	$post['product_category'][$k];	
			$item_data['product_id']						=	$post['product_id'][$k];	
			$item_data['color']								=	$post['color'][$k];	
			$item_data['size']								=	$post['size'][$k];	
			$item_data['qty']								=	$post['qty'][$k];	
			$item_data['unit']								=	$post['unit'][$k];	
			$item_data['total_amount']						=	$post['qty'][$k]*$post['product_offer_price'][$k];

			if(isset($_SESSION['cartdata'])){
				array_push($_SESSION['cartdata'],$item_data);
			}else{
				$_SESSION['cartdata']	=	array();
				array_push($_SESSION['cartdata'],$item_data);		
			}				
			
		}
		
		redirect(site_url()."products/checkout");
	}
	
	public function remove_item($key){
		array_splice($_SESSION['cartdata'], $key, 1);
		//pr($_SESSION['cartdata']);
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	
	function getproduct_options() {
		$optionId 		= $this->input->post('optionId');
		$options		=	get_option_value_by_id($optionId);
		//$html='ankit';
		
		$html= '<div class="col-md-6 col-xs-6" style="padding-left:0px;">
			<p class="wishlist-category p_font_size_12"><strong style="color:#000;">Serves:</strong> '.$options->serves.'</p>
		</div>
		
		<div class="col-md-6 col-xs-6" style="padding-left:0px;">
			<p class="wishlist-category p_font_size_12"><strong style="color:#000;">Weight:</strong> '.$options->weight.' '.$options->unit.'</p>
		</div>
		
		<div class="col-md-6 col-xs-6" style="padding-left:0px;">
			<p class="wishlist-category p_font_size_12"><strong style="color:#000;">Size:</strong> '.$options->size.'</p>
		</div>';
		
		echo $html;
	}
	
	function getproduct_options_val() {
		$optionId 		= $this->input->post('type');
		$options		=	get_option_value_by_id_null($optionId);
		//$html= pr($options);
		
		$html= '<div class="col-md-6 col-xs-6" style="padding-left:0px;">
			<p class="wishlist-category p_font_size_12"><strong style="color:#000;">Serves:</strong> '.$options->serves.'</p>
		</div>
		
		<div class="col-md-6 col-xs-6" style="padding-left:0px;">
			<p class="wishlist-category p_font_size_12"><strong style="color:#000;">Weight:</strong> '.$options->weight.' '.$options->unit.'</p>
		</div>
		
		<div class="col-md-6 col-xs-6" style="padding-left:0px;">
			<p class="wishlist-category p_font_size_12"><strong style="color:#000;">Size:</strong> '.$options->size.'</p>
		</div>';
		
		echo $html;
	}
	
	function getproduct_options_price() {
		$optionId 		= 	$this->input->post('optionId');
		$options		=	get_option_value_by_id($optionId);
		//$html='ankit';
		$save 			=	$options->price - $options->offer_price;
		
		$html= '<li class="shop-green">&#x20B9; '.$options->offer_price.'</li>
				<li class="line-through" style="font-size: 13px;">&#x20B9; '.$options->price.'</li>
				<li class="" style="font-size: 13px; color: green;">You Save &#x20B9;'.$save.'</li>';
		
		echo $html;
	}
	
	function getproduct_options_price_hidden() {
		$optionId 		= $this->input->post('optionId');
		$options		=	get_option_value_by_id($optionId);
		//$html='ankit';
		
		$html= '<input type="hidden" name="product_offer_price" value="'.$options->offer_price.'">
				<input type="hidden" name="product_price" value="'.$options->price.'">';
		
		echo $html;
	}
	
	function getproduct_price() {
		$pid 			= 	$this->input->post('type');
		$options		=	get_product_by_id($pid);
		//$html='ankit';
		$save 			=	$options->price - $options->offer_price;
		
		$html= '<li class="shop-green">&#x20B9; '.$options->offer_price.'</li>
				<li class="line-through" style="font-size: 13px;">&#x20B9; '.$options->price.'</li>
				<li class="" style="font-size: 13px; color: green;">You Save &#x20B9;'.$save.'</li>';
		
		echo $html;
	}
	
	function getproduct_price_hidden() {
		$pid 		= 	$this->input->post('type');
		$options		=	get_product_by_id($pid);
		//$html='ankit';
		
		$html= '<input type="hidden" name="product_offer_price" value="'.$options->offer_price.'">
				<input type="hidden" name="product_price" value="'.$options->price.'">';
		
		echo $html;
	}
	
	
	public function address_book(){
		
		if(!isset($_SESSION['user'])){
			$_SESSION['page']	=	"products/address_book";
			redirect('login');
		}
		
		$user_id						=	$this->session->userdata('user')->id;
		$page_data['user_address'] 		=	$this->product->get_user_address($user_id);
		
		if(!empty($page_data['user_address'])){
			$page_data['title']				=	get_setting('meta_title');
			$page_data['meta_keywords']		=	get_setting('meta_keywords');
			$page_data['meta_description']	=	get_setting('meta_description');
			
			$page_data['page_name'] 		= 	'products/address_book';
			$page_data['page_title'] 		= 	'Address Book';
			$page_data['menu']		 		= 	'Address Book';
			
			$this->load->view('index',$page_data);	
				
		}else{
			redirect(site_url()."products/add_address");
		}
		
	}
	
	
	public function add_address(){
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('add_line_1', 'Address Line 1', 'required');
		$this->form_validation->set_rules('add_line_2', 'Address Line 2', 'required');
		$this->form_validation->set_rules('pincode', 'Pincode', 'required');
		
		if ($this->form_validation->run() == FALSE){
			
			$page_data['title']				=	get_setting('meta_title');
			$page_data['meta_keywords']		=	get_setting('meta_keywords');
			$page_data['meta_description']	=	get_setting('meta_description');
		
			$page_data['page_name'] 		= 	'products/add_new_address';
			$page_data['page_title'] 		= 	'User - Add Address';
			$page_data['menu']		 		= 	'Address Book';
			
			$this->load->view('index',$page_data);
			
		}else{
			
			$post 							=	$this->input->post();
			$userData						=	$this->session->userdata('user');
			$post['user_id'] 				= 	$userData->id;
			
			$this->product->add_address($post);
			$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Message!</h4>Address added successfully.</div>');
			redirect(site_url()."products/address_book");
		}
		
	}
	
	
	public function edit_address($add_id){
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('add_line_1', 'Address Line 1', 'required');
		$this->form_validation->set_rules('add_line_2', 'Address Line 2', 'required');
		$this->form_validation->set_rules('pincode', 'Pincode', 'required');
		
		if ($this->form_validation->run() == FALSE){
			
			$page_data['address'] 			=	$this->product->get_address($add_id);
			
			$page_data['title']				=	get_setting('meta_title');
			$page_data['meta_keywords']		=	get_setting('meta_keywords');
			$page_data['meta_description']	=	get_setting('meta_description');
		
			$page_data['page_name'] 		= 	'products/edit_address';
			$page_data['page_title'] 		= 	'User - Edit Address';
			$page_data['menu']		 		= 	'Address Book';
			
			$this->load->view('index',$page_data);
			
		}else{
			
			$post 							=	$this->input->post();
			$userData						=	$this->session->userdata('user');
			$post['user_id'] 				= 	$userData->id;
			
			$this->product->update_address($add_id, $post);
			$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Message!</h4>Address Edited successfully.</div>');
			redirect(site_url()."products/address_book");
		}
		
	}

	
}
