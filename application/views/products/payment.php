<?php
//pr($_SESSION);
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





$encData=null;

/*$clientCode					=	'RAPPL';
$username					=	'bhabesh.jha_7219';
$password					=	'RAPPL_SP7219';
$authKey					=	'oDYX2EN8NrpSCCpB';
$authIV						=	'C39mPkwUMPw4zKaA';
*/
$clientCode					=	'LPSD1';
$username					=	'Abh789@sp';
$password					=	'P8c3WQ7ei';
$authKey					=	'x0xzPnXsgTq0QqXx';
$authIV						=	'oLA38cwT6IYNGqb3';

$payerName					=	$_SESSION['user']->firstname;
$payerEmail					=	$_SESSION['user']->email;
$payerMobile				=	$_SESSION['user']->mobile_number;
$payerAddress				=	'Patna, Bihar';

$clientTxnId				=	rand(100000000,999999999);
$amount						=	$post['TransactionAmt'];
//$amount						=	'1';
$amountType					=	'INR';
$mcc						=	5137;
$channelId					=	'W';
$callbackUrl				=	site_url().'products/SabPaisaPgResponse';
//Extra Parameter you can use 20 extra parameters(udf1 to udf20)
//$class="5";
//$rollNo="1005";

$encData					=	"?clientCode=".$clientCode."&transUserName=".$username."&transUserPassword=".$password."&amount=".$amount.
"&amountType=".$amountType."&clientTxnId=".$clientTxnId."&payerName=".$payerName."&payerMobile=".$payerMobile.
"&payerEmail=".$payerEmail."&callbackUrl=".$callbackUrl."&channelId=".$channelId."&mcc=".$mcc;//."&udf1=".$class."&udf2=".$rollNo;

$EncryptDecrypt 			= 	new EncryptDecrypt(); 
$data 						=	$EncryptDecrypt->encrypt($encData,$authIV,$authKey);







	$post['clientTxnId']				=	$clientTxnId;

	$order_id 							= 	$this->product->add_order($post);
	
	$post_status['order_status']		=	'0';
	$post_status['note']				=	'Your order was placed successfully. We will get back to you shortly';
	$post_status['customer_id']			=	$_SESSION['user']->id;
	$post_status['order_id']			=	$order_id;
	$status_id 							= 	$this->product->insert_order_status($post_status);
}



 ?>



<div class="breadcrumbs-v4 img-v1  page_heading_padding" style="background: #eae7e4;">
	<div class="container">
		<span class="page-name">Check Out</span>
		<ul class="breadcrumb-v4-in">
			<li><a href="<?php echo site_url(); ?>">Home</a></li>
			<li><a href="<?php echo site_url(); ?>products">Product</a></li>
			<li><a href="<?php echo site_url(); ?>products/checkout">Shopping Cart</a></li>
			<li class="active">Payment</li>
		</ul>
	</div>
</div>

<div>
	
	<div class="content-md" style="padding-bottom:20px; padding-top:60px;">
		<div class="container ">
			<div class="col-md-4 desktop_display" style="color: #fff; background: #96100f; border-right: 5px #fff solid;">
				<div style="width:98%;">
				<div class="col-md-2" style="padding-bottom:10px;padding-top:10px;">
				<span class="number" style="font-size: 50px;">1.</span>
				</div>
				<div class="col-md-10" style="padding-bottom:10px;padding-top:10px;">
				<div class="overflow-h">
					<h2 style="color: #fff; text-align:left;">Shopping Cart</h2>
					<p style="color: #fff; text-align:left;">Review &amp; edit your product</p>
				</div>
				</div>
				</div>
			</div>
			
			<div class="col-md-4 desktop_display" style="color: #fff; background: #96100f; border-right: 5px #fff solid;">
				<div style="width:98%;">
				<div class="col-md-2 col-xs-2" style="padding-bottom:10px;padding-top:10px;">
				<span class="number" style="font-size: 50px;">2.</span>
				</div>
				<div class="col-md-10" style="padding-bottom:10px;padding-top:10px;">
				<div class="overflow-h">
					<h2 style="color: #fff; text-align:left;">Billing info</h2>
					<p style="color: #fff; text-align:left;">Shipping and address</p>
				</div>
				</div>
				</div>
			</div>
			
			<div class="col-md-4" style="color: #fff; background: #96100f;">
				<div style="width:98%;">
				<div class="col-md-2 col-xs-2" style="padding-bottom:10px;padding-top:10px;">
				<span class="number" style="font-size: 50px;">3.</span>
				</div>
				<div class="col-md-10" style="padding-bottom:10px;padding-top:10px;">
				<div class="overflow-h">
					<h2 style="color: #fff; text-align:left;">Payment</h2>
					<p style="color: #fff; text-align:left;">Select Payment method</p>
				</div>
				</div>
				</div>
			</div>
		</div>
	</div>
	

		
		
	<div class="content-md" style="padding-bottom: 30px; padding-top: 20px;">
		<div class="container shopping-cart">
			<div class="row">
				<div class="col-md-6 md-margin-bottom-50">
					
					<img class="img-responsive" src="<?php echo site_url(); ?>assets/img/web/payment_page.jpg">
					
				</div>
	<?php
	
	if(!empty($_SESSION['coupon_discount']) && $_SESSION['coupon_discount']->ctype == 'Fix Amount'){
		
		$discounted_amount						=	$_SESSION['item_total'] - $_SESSION['coupon_discount']->cvalue;
		$discounted_value 						= 	$_SESSION['coupon_discount']->cvalue;
		
	}elseif(!empty($_SESSION['coupon_discount']) && $_SESSION['coupon_discount']->ctype == 'Percentage'){
		
		$discounted_amount						=	$_SESSION['item_total'] - ($_SESSION['item_total'] * ($_SESSION['coupon_discount']->cvalue / 100));
		$discounted_value 						= 	($_SESSION['item_total'] * ($_SESSION['coupon_discount']->cvalue / 100));
		
	}else{
		
		$discounted_amount		=	$_SESSION['item_total'];
		$discounted_value		=	"0";
	}
	
	$qty_total				=	0;
	foreach($_SESSION['cartdata'] as $key => $cartdata){
		$qty_total				+=	$cartdata['qty'];
	}
	?>
				<div class="col-md-6">
					
					<ul class="list-inline total-result">
						<li>
							<h4>Subtotal:</h4>
							<div class="total-result-in">
								<span>&#8377; <?php echo $_SESSION['item_total']; ?>.00</span>
							</div>
						</li>
						<li>
							<h4>Discount:</h4>
							<div class="total-result-in">
								<span class="text-right">&#8377; <?php echo $discounted_value; ?> </span>
							</div>
						</li>
						<li>
							<h4>Shipping:</h4>
							<div class="total-result-in">
							<?php
							if($qty_total > 0){
								$shipping_amount	=	'0';
							}else{
								$shipping_amount	=	get_setting('shipping_rate');
							}
							?>
							
								<span class="text-right">&#8377; <?php echo $shipping_amount; ?>.00</span>
							</div>
						</li>
						
						<li class="divider"></li>
						<li class="total-price">
							<h4>Total:</h4>
							<div class="total-result-in">
								<span>&#8377; <?php echo $discounted_amount + $shipping_amount; ?></span>
							</div>
						</li>
					</ul>
						
						<form action="https://stage-securepay.sabpaisa.in/SabPaisa/sabPaisaInit?v=1"method="post">
							<input type="hidden" name="encData" value="<?php echo $data?>" id="frm1">
							<input type="hidden" name="clientCode" value ="<?php echo $clientCode?>" id="frm2">
							<input type="submit" style="float:right; padding:5px 25px; font-size:16px; font-weight:bold; margin-top:20px;" id="submitButton" name="submit" value="Pay Online Now >" class="btn-u btn-u-sea-shop">
						</form>
						
						
				</div>
			
			</div>
			
		</div>
		
	</div>

</div>