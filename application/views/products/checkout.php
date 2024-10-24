<div class="breadcrumbs-v4 img-v1  page_heading_padding" style="background: #eae7e4;">
	<div class="container">
		<span class="page-name">Check Out</span>
		<ul class="breadcrumb-v4-in">
			<li><a href="<?php echo site_url(); ?>">Home</a></li>
			<li><a href="<?php echo site_url(); ?>category/listing">Category</a></li>
			<li><a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Product</a></li>
			<li class="active">Shopping Cart</li>
		</ul>
	</div>
</div>

<div>
		
	<div class="content-md" style="padding-bottom:0px; padding-top:60px;">
		<div class="container">
			<div class="col-md-4 col-xs-12" style="color: #fff; background: #96100f;">
				<div class="col-md-2 col-xs-2" style="padding-bottom:10px;padding-top:10px;">
				<span class="number" style="font-size: 50px;">1.</span>
				</div>
				<div class="col-md-10 col-xs-10" style="padding-bottom:10px;padding-top:10px;">
				<div class="overflow-h">
					<h2 style="color: #fff; text-align:left;">Shopping Cart</h2>
					<p style="color: #fff; text-align:left;">Review &amp; edit your product</p>
				</div>
				</div>
			</div>
		</div>
	</div>
		
		

	<div class="content-md" style="padding-bottom: 40px; padding-top:20px;">
		<div class="container">
			
				<div>
					<form class="shopping-cart" action="<?php echo site_url(); ?>products/update_cart" method="post">
					<section>
						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
										<th style="color: #96100f;">Product</th>
										<th style="color: #96100f;">Price</th>
										<th style="color: #96100f;">Qty</th>
										<th style="color: #96100f;">Total</th>
									</tr>
								</thead>
								<tbody>
								
								<?php 
								$item_total	=	0;
								$qty_total				=	0;
								foreach($_SESSION['cartdata'] as $key => $cartdata){ 
									
									$qty_total				+=	$cartdata['qty'];
								
									$main_price = 0;
									if($cartdata['product_offer_price'] != 0){ 
										$main_price = $cartdata['product_offer_price']; 
									}else{ 
										$main_price = $cartdata['product_price']; 
									}
								?>
									<input type="hidden" name="product_offer_price[]" value="<?php echo $cartdata['product_offer_price']; ?>">
									<input type="hidden" name="product_price[]" value="<?php echo $cartdata['product_price']; ?>">
									<input type="hidden" name="product_img[]" value="<?php echo $cartdata['product_img']; ?>">
									<input type="hidden" name="product_slug[]" value="<?php echo $cartdata['product_slug']; ?>">
									<input type="hidden" name="product_name[]" value="<?php echo $cartdata['product_name']; ?>">
									<input type="hidden" name="product_category[]" value="<?php echo $cartdata['product_category']; ?>">
									<input type="hidden" name="product_id[]" value="<?php echo $cartdata['product_id']; ?>">
									<input type="hidden" name="unit[]" value="<?php echo $key; ?>">
									
									<tr style="background: #fff;">
										
										<td class="product-in-table">
											<img class="img-responsive" src="<?php echo site_url();?>assets/photo/product/<?php echo $cartdata['product_img']; ?>" alt="">
											<div class="product-it-in">
												<h3 class="checkout_product_name"><?php echo $cartdata['product_name']; ?></h3>
												<span>Category: <?php echo get_product_category_title($cartdata['product_category']); ?></span><br />
												<span>Size: <span style="text-transform: uppercase;"><?php echo $cartdata['size']; ?></span></span><br />
											</div>
										</td>
										
										<td class="checkout_total">&#x20B9; <?php echo $main_price ?>.00</td>
										
										<td>
											<?php $actualPrice = $cartdata['qty']*$cartdata['product_price']; ?>
											<button type='button' class="quantity-button" name='subtract' onclick='javascript: subtractQty<?php echo $key+1; ?>();' value='-'>-</button>
											<input type='text' class="quantity-field" name='qty[]' value="<?php echo $cartdata['qty']; ?>" id='qty<?php echo $key+1; ?>'/>
											<button type='button' class="quantity-button" name='add' onclick='javascript: document.getElementById("qty<?php echo $key+1; ?>").value++;' value='+'>+</button>
										</td>
										
										<td class="checkout_total">&#x20B9; <span class="ptotaltd ptotal-td-<?php echo $key; ?>"><?php echo $cartdata['qty']*$main_price; ?></span>.00</td>
										<td>
											<a href="<?php echo site_url(); ?>products/remove_item/<?php echo $key; ?>">
												<button type="button" class="close"><i class="fa fa-trash" aria-hidden="true" style="color: #000;" alt="Remove Item" title="Remove Item"></i></button>
											</a>
										</td>
									</tr>
									<?php $item_total	+=	$cartdata['qty']*$main_price; ?>
								<?php } ?>
									
								</tbody>
							</table>
							<button type="submit" class="btn-u btn-u-sea-shop">Update Cart</button>
						</div>
					</section>
					</form>
					<?php //pr($_SESSION['coupon_discount']); ?>
					<form class="shopping-cart" action="<?php echo site_url(); ?>products/apply_coupon" method="post">
					<div class="coupon-code">
						<div class="row">
							
							<div class="col-md-6 md-margin-bottom-50">
								<h3>Discount Code</h3>
								
								<p>Enter your coupon code <a data-toggle="modal" data-target="#myModal"><small>(See Coupon Code)</small></a></p>
								
								<div class="col-md-6 col-xs-7 md-margin-bottom-50" style="padding-left:0px;">
									<?php
									if(!empty($_SESSION['coupon_discount'])){
									?>
										<input class="form-control margin-bottom-10 discount_input" name="code" type="text" value="<?php echo $_SESSION['coupon_discount']->ccode; ?>" readonly>
									<?php 
									}else{
									?>
										<input name="sub_total" type="hidden" value="<?php echo $item_total; ?>">
										<input class="form-control margin-bottom-10 discount_input" name="code" type="text">
									<?php
									}
									?>
									
								</div>
								
								<div class="col-md-6 col-xs-5 md-margin-bottom-50">
									<button type="submit" <?php if(!empty($_SESSION['coupon_discount'])){ ?> disabled <?php } ?> class="btn-u btn-u-sea-shop">Apply Coupon</button>
									
									
								</div>
								
							</div>
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
					<h4 id="myModalLabel1" class="modal-title">Coupon Code</h4>
				</div>
				<div class="modal-body">
					<?php foreach($coupons as $coupon){ ?>
						<p><b><?php echo $coupon->ccode; ?></b></p>
						<p style="padding-bottom:25px"><?php echo $coupon->description; ?></p>
					<?php } ?>
					
				</div>
				<div class="modal-footer"></div>
			</div>
		</div>
	</div>


	<?php
	if(!empty($_SESSION['coupon_discount']) && $_SESSION['coupon_discount']->ctype == 'Fix Amount'){
		
		$discounted_amount						=	$item_total - $_SESSION['coupon_discount']->cvalue;
		$discounted_value 						= 	$_SESSION['coupon_discount']->cvalue;
		
	}elseif(!empty($_SESSION['coupon_discount']) && $_SESSION['coupon_discount']->ctype == 'Percentage'){
		
		$discounted_amount						=	$item_total - ($item_total * ($_SESSION['coupon_discount']->cvalue / 100));
		$discounted_value 						= 	($item_total * ($_SESSION['coupon_discount']->cvalue / 100));
		
	}else{
		
		$discounted_amount		=	$item_total;
		$discounted_value		=	"0";
	}
	?>						
							
							
							<div class="col-md-6 md-margin-bottom-50">
								<div class="row">
									<div class="col-md-4 col-xs-6"><h4 style="color: #96100f;">Subtotal:</h4></div>
									<div class="col-md-8 col-xs-6" style="text-align: right; color: #96100f; font-size: 18px; font-weight: bold;"><span>&#8377; <span><?php echo $item_total; ?></span>.00</span></div>
								</div>
								<div class="row">
									<div class="col-md-4 col-xs-6"><h4 style="color: #96100f;">Discount:</h4></div>
									<div class="col-md-8 col-xs-6" style="text-align: right; color: #96100f; font-size: 18px; font-weight: bold;"> &#8377; <?php echo $discounted_value; ?>.00</div>
								</div>
								<div class="row">
									<div class="col-md-4 col-xs-6"><h4 style="color: #96100f;">Shipping:</h4></div>
									<?php
									
									if($qty_total > 0){
										$shipping_amount	=	'0';
									}else{
										$shipping_amount	=	get_setting('shipping_rate');
									}
									?>
									<div class="col-md-8 col-xs-6" style="text-align: right; color: #96100f; font-size: 18px; font-weight: bold;"> &#8377; <?php echo $shipping_amount; ?>.00</div>
								</div>
								<div class="row">
									<div class="col-md-12" style="border-top: 3px solid #96100f;"></div>
								</div>
								<div class="row" style="padding-bottom: 20px;">
									<div class="col-md-4 col-xs-6"><h4 style="color: #96100f;">Total:</h4></div>
									<div class="col-md-8 col-xs-6" style="text-align: right; color: #96100f; font-size: 18px; font-weight: bold;"> &#8377; <?php echo $discounted_amount + $shipping_amount; ?>.00</div>
								</div>
								<?php $_SESSION['discounted_amount'] 	= $discounted_amount; ?>
								<?php $_SESSION['item_total'] 			= $item_total; ?>
								<?php $_SESSION['shipping_amount'] 		= $shipping_amount; ?>
								<?php $_SESSION['final_amount'] 		= $discounted_amount + $shipping_amount; ?>
								
								<a href="<?php echo site_url(); ?>category" class="col-xs-6">
									<button type="button" class="btn-u btn-u-sea-shop shopping_button">
										Continue Shopping
									</button>
								</a>
								
								<a href="<?php echo site_url();?>products/address_book"  class="col-xs-6">
									<button type="button" class="btn-u btn-u-sea-shop billing_info_button">
										Billing Info
									</button>
								</a>
							</div>
						</div>
					</div>
					</form>
				</div>
			
		</div><!--/end container-->
	</div>
</div>
<script type="text/javascript">
	function subtractQty1() {
    if(document.getElementById("qty_0").value > 1) {
        if(document.getElementById("qty_0").value - 1 < 0)
            return;
        else
            document.getElementById("qty_0").value--;
    }
}
</script>