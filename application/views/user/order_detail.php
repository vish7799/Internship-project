<div class="breadcrumbs-v4 img-v1  page_heading_padding" style="background: #eae7e4;">
	<div class="container">
		<span class="page-name">My Orders</span>
		<ul class="breadcrumb-v4-in">
			<li><a href="<?php echo site_url(); ?>">Home</a></li>
			<li><a href="<?php echo site_url(); ?>user">User</a></li>
			<li><a href="<?php echo site_url(); ?>user/orders">Orders</a></li>
			<li class="active">Order Detail</li>
		</ul>
	</div>
</div>


<div class="container content-md" style="padding-top:30px; padding-bottom:30px;">
	<div class="row">
		<?php include('left_menu.php'); ?>
		<div class="col-md-9">
			<div class="testimonials-v6 testimonials-wrap">
				<div>
					<h2 class="main_header" style="text-align: left;">Order Details</h2>
					<p style="font-size: 12px;">Ordered on <?php echo date('d F, Y', $order_detail->txn_date); ?> | Order# <?php echo $order_detail->invoice_id ?> | <a target="_blank" href="<?php echo site_url(); ?>user/download_invoice/<?php echo $order_detail->id; ?>"><b>Download Invoice</b></a></p>
				</div>
				<div class="row margin-bottom-50">
					<div class="col-md-12 md-margin-bottom-50">
						<div class="testimonials-info" style="border: 1px solid #378D36; border-radius: 7px; margin-bottom: 20px; ">
							<div class="" style="padding:5px 0px; overflow: hidden;">
								<div class="col-md-4">
									<?php $address	=	get_address($order_detail->AddressId); ?>
									<p class="order_detail_heading">Shipping Address</p>
									<p class="order_detail_content" style="font-weight: bold;"><?php echo $address->name; ?></p>
									<p class="order_detail_content"><?php echo $address->add_line_1; ?></p>
									<p class="order_detail_content"><?php echo $address->add_line_2; ?></p>
									<p class="order_detail_content"><?php echo $address->locality.', '.$address->pincode; ?></p>
								</div>
								<div class="col-md-4">
									<p class="order_detail_heading">Payment Method</p>
									<p class="order_detail_content" style="font-weight: bold;"><?php echo $order_detail->PaymentStatus; ?></p>
									<p class="order_detail_content"><?php echo $order_detail->PaymentType; ?></p>
									<?php if($order_detail->respmsg != ""){ ?>
										<p class="order_detail_content"><?php echo $order_detail->PaymentType; ?></p>
									<?php } ?>
								</div>
								<div class="col-md-4">
									<p class="order_detail_heading">Order Summary</p>
									<div class="col-md-6" style="padding: 0px; line-height: 2;">Item(s) Subtotal:</div>
									<div class="col-md-6" style="padding: 0px; line-height: 2;"><?php echo $order_detail->mainAmt; ?>.00</div>
									<div class="col-md-6" style="padding: 0px; line-height: 2;">Shipping:</div>
									<div class="col-md-6" style="padding: 0px; line-height: 2;"><?php echo $order_detail->shipping_amount; ?>.00</div>
									<div class="col-md-6" style="padding: 0px; line-height: 2;">Total:</div>
									<div class="col-md-6" style="padding: 0px; line-height: 2;"><?php echo $order_detail->TransactionAmt; ?></div>
									<div class="col-md-6" style="padding: 0px; font-weight:bold; line-height: 2;">Grand Total:</div>
									<div class="col-md-6" style="padding: 0px; line-height: 2;"><?php echo $order_detail->TransactionAmt; ?></div>
								</div>
							</div>
						</div>
						<div class="testimonials-info" style="border: 1px solid #378D36; border-radius: 7px; ">
							<?php
							$itemDetail	=	json_decode($order_detail->itemDetail);
							foreach($itemDetail as $key=>$itemdetails){ 
							
							?>
							<div class="testimonials-desc" style="padding:15px 0px 5px;">
								<div class="col-md-2">
									<img class="margin-bottom-20 img-responsive" src="<?php echo site_url(); ?>assets/photo/product/<?php echo $itemdetails->product_img; ?>" alt="" style="width:60%; border: 1px solid #E3E8EC; border-radius: 10%;">
								</div>
								<div class="col-md-4">
									<b><?php echo $itemdetails->product_name; ?></b><br />
									<span>Category: <?php echo get_product_category_title($itemdetails->product_category); ?></span>
								</div>
								<div class="col-md-2"><?php echo $itemdetails->qty; ?> Piece(s)</div>
								<div class="col-md-4">
									<a href="<?php echo site_url(); ?>user/feedback/<?php echo $itemdetails->product_id; ?>"><button type="button" class="btn-u btn-u-sea-shop btn-u-lg" style="font-size: 12px; padding: 5px 15px;">Feedback</button></a>&nbsp;&nbsp;&nbsp;
									<a href="<?php echo site_url(); ?>products/<?php echo $itemdetails->product_slug; ?>"><button type="button" class="btn-u btn-u-sea-shop btn-u-lg" style="font-size: 12px; padding: 5px 15px;">BUY It Again</button></a>
								</div>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>				
			</div>
		</div>		
	</div>
</div>

<div class=""  style="background: url(<?php echo site_url();?>assets/img/web/3.png) repeat; ">
	<?php if(isset($_COOKIE['recent_view_product'])){ ?>
	<div class="container content-md" style="padding-top:20px; padding-bottom: 0px; width:90%">
		<div>
			<h2 class="main_header">Your browsing history</h2>
		</div>
		<div class="row" style="padding:25px;">
			<div class="owl-carousel-v4">
				<div class="owl-slider-v5">
					<?php $recent_views		=	json_decode($_COOKIE['recent_view_product']); 
					$recent_views			=	array_diff($recent_views, array('-'));
					foreach($recent_views as $recent_view){
						$product_detail		=	get_product($recent_view);
					?>
						<div class="item" style="padding-bottom: 30px; margin: 0px 10px;">
							<a href="<?php echo site_url(); ?>products/<?php echo $product_detail->slug; ?>">
							<div class="product_box" >
							<img class="margin-bottom-20 product_image" src="<?php echo site_url(); ?>assets/photo/product/<?php echo $product_detail->image; ?>" alt="<?php echo $product_detail->title; ?>">
							
							<h2 class="title-v3-md margin-bottom-10 text-center" style="color: #E7338A;"><?php echo custom_echo($product_detail->title, 20); ?></h2>
							<p class="text-center" style="font-size: 18px; line-height: 20px; font-weight: bold; color: #000;">
								<span style="text-decoration:none; color: #4456A2;">&#8377; <?php echo $product_detail->offer_price; ?></span>&nbsp;&nbsp; 
								<span style="font-size:13px; text-decoration: line-through; color: #E7338A;">&#8377; <?php echo $product_detail->price; ?></span><br /><span style="font-size:13px; color: green;">You Save &#8377;<?php echo $product_detail->price - $product_detail->offer_price; ?></span>
							</p>
							</div>
							</a>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
	
	<div class="container content-md" style="padding-top:20px; padding-bottom: 10px;">
		<div class="row text-center">
			<div class="text-center " style="padding-bottom:30px;">
				<h2 class="main_header">SHOP BY CATEGORIES</h2>
			</div>
			
			<?php foreach($categories as $category){ ?>
			<a href="<?php echo site_url(); ?>category/<?php echo $category->slug; ?>" style="text-decoration:none;">
			<div class="col-md-3 col-xs-6 flat-service" style="padding-bottom: 15px;">
				<div class="b-img">
				<img class="image_border" src="<?php echo site_url(); ?>assets/photo/productcategory/<?php echo $category->image; ?>" alt="">
				<h1 class="service_heading_text"><?php echo $category->title; ?></h1>
				</div>
			</div>
			</a>
			<?php } ?>
		</div>
	</div>
	
	<div class="container content-md" style="padding-top:20px; padding-bottom: 0px; width:90%">
		<div>
			<h2 class="main_header">More to consider</h2>
		</div>
		<div class="row" style="padding:25px;">
			<div class="owl-carousel-v4">
				<div class="owl-slider-v5">
					<?php foreach($feature_products as $fproduct){ ?>
						<div class="item" style="padding-bottom: 30px; margin: 0px 10px;">
							<a href="<?php echo site_url(); ?>products/<?php echo $fproduct->slug; ?>">
							<div class="product_box" >
							<img class="margin-bottom-20 product_image" src="<?php echo site_url(); ?>assets/photo/product/<?php echo $fproduct->image; ?>" alt="<?php echo $fproduct->title; ?>">
							
							<h2 class="title-v3-md margin-bottom-10 text-center" style="color: #E7338A;"><?php echo custom_echo($fproduct->title, 20); ?></h2>
							<p class="text-center" style="font-size: 18px; line-height: 20px; font-weight: bold; color: #000;">
								<span style="text-decoration:none; color: #4456A2;">&#8377; <?php echo $fproduct->offer_price; ?></span>&nbsp;&nbsp; 
								<span style="font-size:13px; text-decoration: line-through; color: #E7338A;">&#8377; <?php echo $fproduct->price; ?></span><br /><span style="font-size:13px; color: green;">You Save &#8377;<?php echo $fproduct->price - $fproduct->offer_price; ?></span>
							</p>
							</div>
							</a>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>