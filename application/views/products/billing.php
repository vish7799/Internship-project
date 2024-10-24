<div class="breadcrumbs-v4">
	<div class="container">
		<span class="page-name">Check Out</span>
		<ul class="breadcrumb-v4-in">
			<li><a href="<?php echo site_url(); ?>">Home</a></li>
			<li><a href="<?php echo site_url(); ?>products">Product</a></li>
			<li><a href="<?php echo site_url(); ?>products/checkout">Shopping Cart</a></li>
			<li class="active">Billing Info</li>
		</ul>
	</div>
</div>

<div class="content-md" style="padding-bottom:0px;  padding-top:20px;">
	<div class="container">
		<div class="col-md-4" style="color: #fff; background: #522215;">
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
		
		<div class="col-md-4" style="color: #fff; background: #522215; margin-left:5px;">
			<div class="col-md-2" style="padding-bottom:10px;padding-top:10px;">
			<span class="number" style="font-size: 50px;">2.</span>
			</div>
			<div class="col-md-10" style="padding-bottom:10px;padding-top:10px;">
			<div class="overflow-h">
				<h2 style="color: #fff; text-align:left;">Billing info</h2>
				<p style="color: #fff; text-align:left;">Shipping and address information</p>
			</div>
			</div>
		</div>
	</div>
</div>



<div class="content-md margin-bottom-30 shopping-cart" style="padding-bottom: 0px;">
	<form action="<?php echo site_url();?>products/billinginfo" method="post" >
	<div class="container">
		<div class="row">
		<?php //pr($data);  die;
			?>
			<?php
			$pid='';
			foreach($_SESSION['cartdata'] as $key => $cartdata){
			 	$pid .= $cartdata['product_id'].',';
			}
			$pid = rtrim($pid, ',');
			 ?>
			<input type="hidden" name="product_id" value="<?php echo $pid; ?>">
			<input type="hidden" value="<?php echo $_SESSION['item_total']; ?>" name="amount">
			<div class="col-md-6 md-margin-bottom-40">
				<h2 class="title-type">Billing Address</h2>
				<div class="billing-info-inputs checkbox-list">
					<div class="row">
						<div class="col-sm-6">
							<input id="contact-name" type="text" placeholder="First Name" name="contact_name" class="form-control required" value="<?php if(isset($data) && !empty($data)) { echo $data[0]['contact_name']; } ?>">
							<input id="contact-email" type="text" placeholder="Email" name="contact_email" class="form-control required email" value="<?php if(isset($data) && !empty($data)) { echo $data[0]['contact_email']; } ?>">
						</div>
						<div class="col-sm-6">
							<input id="contact-surname" type="text" placeholder="Last Name" name="contact_surname" class="form-control required" value="<?php if(isset($data) && !empty($data)) { echo $data[0]['contact_surname']; } ?>">
							<input id="contact-phone" type="tel" placeholder="Phone" name="contact_phone" class="form-control required" value="<?php if(isset($data) && !empty($data)) { echo $data[0]['contact_phone']; } ?>">
						</div>
					</div>
					<input id="contact-Address" type="text" placeholder="Address Line 1" name="contact_address1" class="form-control required" value="<?php if(isset($data) && !empty($data)) { echo $data[0]['contact_address1']; } ?>">
					<input id="contact-Address2" type="text" placeholder="Address Line 2" name="contact_address2" class="form-control required" value="<?php if(isset($data) && !empty($data)) { echo $data[0]['contact_address2']; } ?>">
					<div class="row">
						<div class="col-sm-6">
							<input id="contact-city" type="text" placeholder="City" name="contact_city" class="form-control required" value="<?php if(isset($data) && !empty($data)) { echo $data[0]['contact_city']; } ?>">
						</div>
						<div class="col-sm-6">
							<input id="contact-zip" type="text" placeholder="Zip/Postal Code" name="contact_zip" class="form-control required" value="<?php if(isset($data) && !empty($data)) { echo $data[0]['contact_zip']; } ?>">
						</div>
					</div>

					<label class="text-left">
						
						<a href="javascript:CopyFormFields()">Ship item to the above billing address</a>
					</label>
				</div>
			</div>
			

			<div class="col-md-6">
				<h2 class="title-type">Shipping Address</h2>
				<div class="billing-info-inputs checkbox-list" style="min-height: 320px;">
					<div class="row">
						<div class="col-sm-6">
							<input id="shipping-name" type="text" placeholder="First Name" name="shipping_name" class="form-control" value="<?php if(isset($data) && !empty($data)) { echo $data[0]['shipping_name']; } ?>">
							<input id="shipping-email" type="text" placeholder="Email" name="shipping_email" class="form-control email" value="<?php if(isset($data) && !empty($data)) { echo $data[0]['shipping_email']; } ?>">
						</div>
						<div class="col-sm-6">
							<input id="shipping-surname" type="text" placeholder="Last Name" name="shipping_surname" class="form-control" value="<?php if(isset($data) && !empty($data)) { echo $data[0]['shipping_surname']; } ?>">
							<input id="shipping-phone" type="tel" placeholder="Phone" name="shipping_phone" class="form-control" value="<?php if(isset($data) && !empty($data)) { echo $data[0]['shipping_phone']; } ?>">
						</div>
					</div>
					<input id="shipping-Address" type="text" placeholder="Address Line 1" name="shipping_address1" class="form-control" value="<?php if(isset($data) && !empty($data)) { echo $data[0]['shipping_address1']; } ?>">
					<input id="shipping-Address2" type="text" placeholder="Address Line 2" name="shipping_address2" class="form-control" value="<?php if(isset($data) && !empty($data)) { echo $data[0]['shipping_address2']; } ?>">
					<div class="row">
						<div class="col-sm-6">
							<input id="shipping-city" type="text" placeholder="City" name="shipping_city" class="form-control" value="<?php if(isset($data) && !empty($data)) { echo $data[0]['shipping_city']; } ?>">
						</div>
						<div class="col-sm-6">
							<input id="shipping-zip" type="text" placeholder="Zip/Postal Code" name="shipping_zip" class="form-control" value="<?php if(isset($data) && !empty($data)) { echo $data[0]['shipping_zip']; } ?>">
						</div>
					</div>
				</div>
			</div>
			
			
		</div>
		<?php //pr($_SESSION); ?>
<?php
if(!empty($_SESSION['coupon_discount']) && $_SESSION['coupon_discount']->ctype == 'Fix Amount'){
	
	$discounted_amount						=	$_SESSION['item_total'] - $_SESSION['coupon_discount']->cvalue;
	$discounted_value 						= 	$_SESSION['coupon_discount']->cvalue;
	
}elseif(!empty($_SESSION['coupon_discount']) && $_SESSION['coupon_discount']->ctype == 'Percentage'){
	
	$discounted_amount						=	$_SESSION['item_total'] - ($_SESSION['item_total'] * ($_SESSION['coupon_discount']->cvalue / 100));
	$discounted_value 						= 	($_SESSION['item_total'] * ($_SESSION['coupon_discount']->cvalue / 100));
	
}else{
	
	$discounted_amount		=	$item_total;
	$discounted_value		=	"0";
}
?>			
		<div class="coupon-code">
			<div class="row">
				<div class="col-md-6 md-margin-bottom-50">
					
				</div>
				<div class="col-md-6 md-margin-bottom-50">
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
						<li class="divider"></li>
						<li class="total-price">
							<h4>Total:</h4>
							<div class="total-result-in">
								<span>&#8377; <?php echo $discounted_amount; ?></span>
							</div>
						</li>
					</ul>
					
					<a href="<?php echo site_url();?>">
						<button style="padding:5px 25px ; font-size:16px; font-weight:bold; margin-top:20px;" type="button" class="btn-u btn-u-sea-shop">
							< Continue Shopping
						</button>
					</a>
					<button style="float:right; padding:5px 25px ; font-size:16px; font-weight:bold; margin-top:20px;"  type="submit" class="btn-u btn-u-sea-shop">Payment ></button>
					
				</div>
			</div>
			
		</div>
	</div>
	</form>
</div>
<script type="text/javascript">
function CopyFormFields()
{
    var CopyFromList = new Array( "contact-name", "contact-email", "contact-surname", "contact-phone", "contact-Address", "contact-Address2", "contact-city", "contact-zip" );
    var CopyToList = new Array( "shipping-name", "shipping-email", "shipping-surname", "shipping-phone", "shipping-Address", "shipping-Address2", "shipping-city", "shipping-zip" );
    for( var i=0; i<CopyFromList.length; i++ )
    {
        document.getElementById(CopyToList[i]).value = document.getElementById(CopyFromList[i]).value;
    }
}
</script>