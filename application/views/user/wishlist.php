<div class="breadcrumbs-v4 img-v1  page_heading_padding" style="background: #eae7e4;">
	<div class="container">
		<span class="page-name">Wishlist</span>
		<ul class="breadcrumb-v4-in">
			<li><a href="<?php echo site_url(); ?>">Home</a></li>
			<li><a href="<?php echo site_url(); ?>user">User</a></li>
			<li class="active">Wishlist</li>
		</ul>
	</div>
</div>

<div style="background: url(<?php echo site_url();?>assets/img/web/back_image.png) repeat; ">
<div class="container content-md" style="padding-top:30px; padding-bottom:30px;">
	<div class="row">
	
		<?php include('left_menu.php'); ?>
		
		<div class="col-md-9">
			
			
			<?php foreach($user_wishlists as $user_wishlist){ 
				$product_detail 			=	get_product($user_wishlist->product_id);
				//pr($product_detail);
			?>
						
			<div class="testimonials-v6 testimonials-wrap">
				<div class="row margin-bottom-50">
					<div class="col-md-12 md-margin-bottom-50">
						
						<div class="testimonials-info rounded-bottom" style="border: 1px solid #21272E; ">
							
							<div class="testimonials-desc" style="padding:5px 0px;">
								<div class="col-md-2">
									<img class="margin-bottom-20 img-responsive" src="<?php echo site_url(); ?>assets/photo/product/<?php echo $product_detail->image; ?>" alt="" style="width:100%; border: 1px solid #E3E8EC; border-radius: 10%;">
								</div>
								<div class="col-md-6">
									<b><?php echo $product_detail->title; ?></b><br />
									<span>Category: <?php echo get_product_category_title($product_detail->category_id); ?></span>
									<p class="" style="font-size: 18px; line-height: 20px; font-weight: bold; color: #000;">
										<span class="product_offer_price">&#8377; <?php echo $product_detail->offer_price; ?></span>
										&nbsp;&nbsp; 
										<span class="product_main_price">&#8377; <?php echo $product_detail->price; ?></span>
										&nbsp;&nbsp;
										<span class="product_save_amount">You Save &#8377; <?php echo $product_detail->price - $product_detail->offer_price; ?></span>
									</p>
								</div>
								
								<div class="col-md-4" style="padding-top: 10px; text-align: right;">
								
								<a href="<?php echo site_url(); ?>products/<?php echo $product_detail->slug; ?>"><button type="button" class="btn-u btn-u-sea-shop btn-u-lg" style="font-size: 12px; padding: 5px 15px;">Buy Now</button></a>
								<a href="<?php echo site_url(); ?>user/wishlist_remove/<?php echo $product_detail->id; ?>">
									<button onclick="return confirm('Are you sure you want to remove this product from wishlist?')" type="button" class="btn-u btn-u-sea-shop btn-u-lg" style="font-size: 12px; padding: 5px 15px;">Remove</button>
								</a>
								
								
								</div>
							</div>
							
						</div>
						
					</div>
				</div>				
			</div>
			
			<?php } ?>
			
			
			
		</div>
				
	</div>
</div>
</div>