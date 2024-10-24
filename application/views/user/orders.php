<div class="breadcrumbs-v4 img-v1  page_heading_padding" style="background: #eae7e4;">
	<div class="container">
		<span class="page-name">My Orders</span>
		<ul class="breadcrumb-v4-in">
			<li><a href="<?php echo site_url(); ?>">Home</a></li>
			<li><a href="<?php echo site_url(); ?>user">User</a></li>
			<li class="active">Orders</li>
		</ul>
	</div>
</div>

<div class=""  style="background: url(<?php echo site_url();?>assets/img/web/back_image.png) repeat; ">
	<div class="container content-md" style="padding-top:30px; padding-bottom:30px;">
		<div class="row">
		
			<?php include('left_menu.php'); ?>
			
			<div class="col-md-9">
				
				
				<?php foreach($user_orders as $user_order){ ?>
							
				<div class="testimonials-v6 testimonials-wrap">
					<div class="row margin-bottom-50">
						<div class="col-md-12 md-margin-bottom-50">
							
							<div class="testimonials-info rounded-bottom" style="border: 1px solid #96100f; ">
								
								<div class="testimonials-desc bg-color-light" style="padding: 10px 0px;">
									<div class="col-md-3" style="color: #fff; font-weight: bold; font-size: 14px;">
										<span style="font-size: 11px; color: #fff;">ORDER PLACED</span><br />
										<?php echo date('d F, Y', $user_order->txn_date); ?>
									</div>
									<div class="col-md-2" style="color: #fff; font-weight: bold; font-size: 14px;">
										<span style="font-size: 11px; color: #fff;">TOTAL</span><br />
										<?php echo '&#8377; '.$user_order->TransactionAmt;?>
									</div>
									<div class="col-md-3" style="color: #fff; font-weight: bold; font-size: 14px;">
										<span style="font-size: 11px; color: #fff;">SHIP TO</span><br />
										<?php $customer 	=	get_user_by_id($user_order->customer_id);
										echo ucfirst($customer->firstname).' '.ucfirst($customer->lastname);
										?>
									</div>
									
									<div class="col-md-4" style="text-align:right; color: #fff; font-weight: bold; font-size: 14px;">
										<span style="font-size: 11px; color: #fff;">ORDER # <?php echo $user_order->invoice_id; ?></span><br />
										<a href="<?php echo site_url(); ?>user/order_detail/<?php echo $user_order->id; ?>">View Order Details</a> | <a target="_blank" href="<?php echo site_url(); ?>user/download_invoice/<?php echo $user_order->id; ?>">Invoice </a>
									</div>
								</div>
								<?php
								$itemDetail	=	json_decode($user_order->itemDetail);
								foreach($itemDetail as $key=>$itemdetails){ 
								//pr($itemdetails);
								?>
								<div class="testimonials-desc" style="padding:5px 0px;">
									<div class="col-md-2">
										<img class="margin-bottom-20 img-responsive" src="<?php echo site_url(); ?>assets/photo/product/<?php echo $itemdetails->product_img; ?>" alt="" style="width:60%; border: 1px solid #E3E8EC; border-radius: 10%;">
									</div>
									<div class="col-md-6">
										<b style="color: #96100f;"><?php echo $itemdetails->product_name; ?></b><br />
										<span>Category: <?php echo get_product_category_title($itemdetails->product_category); ?></span><br />
										<span>Size: <?php echo strtoupper($itemdetails->size); ?></span>
									</div>
									<div class="col-md-2"><?php echo $itemdetails->qty; ?> Piece(s)</div>
									<div class="col-md-2">Feedback</div>
								</div>
								
								<?php } ?>
								<?php $order_status			=	get_order_status($user_order->id); 
								if(!empty($order_status)){
								?>
								<div class="testimonials-desc" style="padding:5px 0px; border-top: 2px solid #96100f;">
									<div style="padding-left:10px;">
										<h2 class="small_heading">Track Order</h2>
									</div>
									<?php foreach($order_status as $key=>$orders){ 
									$ostatus					=	$orders->order_status;
									if($orders->order_status != '5'){
									?>
										<div class="col-md-12" style="padding: 0px 0px 25px 10px; border-left: 10px solid #96100f; margin:10px 0px 0px 10px; ">
											<?php 
											if($orders->order_status == '0'){
												$order_status_name		=	"Order Placed";
												
											}elseif($orders->order_status == '1'){
												$order_status_name		=	"Order Accepted";
											}elseif($orders->order_status == '2'){
												$order_status_name		=	"Order In Process";
											}elseif($orders->order_status == '3'){
												$order_status_name		=	"Order Shipped";
											}elseif($orders->order_status == '4'){
												$order_status_name		=	"Order Completed";
											}
											?>
											<p style="margin:0px; line-height:1.5; color: #96100f; font-weight: bold;"><i class="fa fa-check-square" aria-hidden="true"></i> <?php echo $order_status_name.' | '.date('d F, Y', $orders->created); ?></p>
											<p style="margin:0px; line-height:2; font-size: 13px;"><?php echo $orders->note; ?></p>
											
										</div>
									<?php }else{ ?>
										<div class="col-md-12" style="padding: 0px 0px 25px 10px; border-left: 10px solid #96100f; margin:10px 0px 0px 10px; ">
											<p style="margin:0px; line-height:1.5; color: #96100f; font-weight: bold;"><i class="fa fa-check-square" aria-hidden="true"></i> <?php echo 'Order Cancelled'.' | '.date('d F, Y', $orders->created); ?></p>
											<p style="margin:0px; line-height:2; font-size: 13px;"><?php echo $orders->note; ?></p>
										</div>
									<?php }  ?>
										
										
									<?php } ?>
								
								<?php if($ostatus != '5'){ ?>
									<?php if($key < 1 ){ ?>
									<div class="col-md-12" style="padding: 0px 0px 25px 10px; border-left: 10px dashed #000; margin:10px 0px 0px 10px; ">
										<p style="margin:0px; line-height:1.5; color: #000; font-weight: bold;"> Order Accepted </p>
										<p style="margin:0px; line-height:2; font-size: 13px;">----</p>
									</div>
									<?php } ?>
									
									<?php if($key < 2 ){ ?>
									<div class="col-md-12" style="padding: 0px 0px 25px 10px; border-left: 10px dashed #000; margin:10px 0px 0px 10px; ">
										<p style="margin:0px; line-height:1.5; color: #000; font-weight: bold;"> Order In Process</p>
										<p style="margin:0px; line-height:2; font-size: 13px;">----</p>
									</div>
									<?php } ?>
									
									<?php if($key < 3 ){ ?>
									<div class="col-md-12" style="padding: 0px 0px 25px 10px; border-left: 10px dashed #000; margin:10px 0px 0px 10px; ">
										<p style="margin:0px; line-height:1.5; color: #000; font-weight: bold;"> Order Shipped </p>
										<p style="margin:0px; line-height:2; font-size: 13px;">----</p>
									</div>
									<?php } ?>
									
									<?php if($key < 4 ){ ?>
									<div class="col-md-12" style="padding: 0px 0px 25px 10px; border-left: 10px dashed #000; margin:10px 0px 0px 10px; ">
										<p style="margin:0px; line-height:1.5; color: #000; font-weight: bold;"> Order Completed </p>
										<p style="margin:0px; line-height:2; font-size: 13px;">----</p>
									</div>
									<?php } ?>
								<?php } ?>
										
								</div>
								
								<?php } ?>
							
							</div>
							
						</div>
					</div>				
				</div>
				
				<?php } ?>
				
				
				
			</div>
					
		</div>
	</div>
</div>