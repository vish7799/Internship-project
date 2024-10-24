
<form name="f1" class="sky-form sky-changes-3 product-quantity sm-margin-bottom-20" method="post" action="<?php echo site_url();?>products/add_to_cart" style="width: 100%;">
		<div class="container" style="padding-top:40px; padding-bottom: 10px;">
			<div class="row">
				<div class="col-md-5">
					<div class="ms-showcase2-template">
						<!-- Master Slider -->
						<div class="master-slider ms-skin-default" id="masterslider">
							<div class="ms-slide">
								<img class="ms-brd" src="<?php echo site_url(); ?>assets/img/blank.gif" data-src="<?php echo site_url(); ?>assets/photo/product/<?php echo $products->image; ?>" alt="<?php echo $products->title; ?>">
								<img class="ms-thumb" src="<?php echo site_url(); ?>assets/photo/product/<?php echo $products->image; ?>" alt="thumb">
							</div>
							<?php foreach(get_product_images($products->id) as $pimages){ ?>
							<div class="ms-slide">
								<img class="ms-brd" src="<?php echo site_url(); ?>assets/img/blank.gif" data-src="<?php echo site_url(); ?>assets/photo/product/<?php echo $pimages->image; ?>" alt="<?php echo $products->title; ?>">
								<img class="ms-thumb" src="<?php echo site_url(); ?>assets/photo/product/<?php echo $pimages->image; ?>" alt="thumb">
							</div>
							<?php } ?>
						</div>
						<!-- End Master Slider -->
					</div>
				</div>

				<div class="col-md-7 product_box_custom">
					<div class="shop-product-heading">
						<h2 class="p_font_size_18"><?php echo $products->title; ?></h2>
					</div>
					<ul class="list-inline shop-product-prices font_size_price margin-bottom-30" id="product_options_price">
						<li class="shop-green">&#x20B9;<?php echo $products->offer_price; ?></li>
						<li class="line-through" style="font-size: 18px; color: #000; font-weight:bold;">&#x20B9;<?php echo $products->price; ?></li>
						<li class="" style="font-size: 18px; color: green; font-weight: bold;">You Save &#x20B9;<?php echo $products->price - $products->offer_price; ?></li>
					</ul>
					<div class="col-md-12" style="padding:10px 0;">
						<h3 class="shop-product-title">SKU: <?php echo $products->sku; ?></h3>
					</div>
					<div class="col-md-12" style="padding:10px 0;">
						<h3 class="shop-product-title">Size</h3>
						<?php if($products->xs_qty != 0){ ?>
						<div class="col-md-2" style="padding:10px 0; width:11%">
							<div class="cc-selector">
								<input id="xs" type="radio" name="size" value="xs" />
								<label class="drinkcard-cc" for="xs" style="padding: 8px; font-size: 20px; color: #000; background: #fff; text-align: center;">38 </label>
							</div>
						</div>
						<?php } ?>
						<?php if($products->s_qty != 0){ ?>
						<div class="col-md-2" style="padding:10px 0; width:11%">
							<div class="cc-selector">
								<input id="s" type="radio" name="size" value="s" />
								<label class="drinkcard-cc" for="s" style="padding: 8px; font-size: 20px; color: #000; background: #fff; text-align: center;">40</label>
							</div>
						</div>
						<?php } ?>
						<?php if($products->m_qty != 0){ ?>
						<div class="col-md-2" style="padding:10px 0; width:11%">
							<div class="cc-selector">
								<input id="m" type="radio" name="size" value="m" <?php if($products->m_qty > 0){ ?> checked <?php } ?> />
								<label class="drinkcard-cc" for="m" style="padding: 8px; font-size: 20px; color: #000; background: #fff; text-align: center;">42</label>
							</div>
						</div>
						<?php } ?>
						<?php if($products->l_qty != 0){ ?>
						<div class="col-md-2" style="padding:10px 0; width:11%">
							<div class="cc-selector">
								<input id="l" type="radio" name="size" value="l" />
								<label class="drinkcard-cc" for="l" style="padding: 8px; font-size: 20px; color: #000; background: #fff; text-align: center;">44</label>
							</div>
						</div>
						<?php } ?>
						<?php if($products->xl_qty != 0){ ?>
						<div class="col-md-2" style="padding:10px 0; width:11%">
							<div class="cc-selector">
								<input id="xl" type="radio" name="size" value="xl" />
								<label class="drinkcard-cc" for="xl" style="padding: 8px; font-size: 20px; color: #000; background: #fff; text-align: center;">46</label>
							</div>
						</div>
						<?php } ?>
					</div>
					
					<?php if(isset($_SESSION['sizemsg']) && $_SESSION['sizemsg'] != ""){ 
						echo '<span style="color: red;">'.$_SESSION['sizemsg'].'</span>';
						unset($_SESSION['sizemsg']);
					} ?>
					
					<h3 class="shop-product-title">Quantity</h3>
					
					<div class="margin-bottom-40">
						
						<span id="product_options_price_hidden">
							<input type="hidden" name="product_offer_price" value="<?php echo $products->offer_price; ?>">
							<input type="hidden" name="product_price" value="<?php echo $products->price; ?>">
						</span>
						<input type="hidden" name="product_img" value="<?php echo $products->image; ?>">
						<input type="hidden" name="product_slug" value="<?php echo $products->slug; ?>">
						<input type="hidden" name="product_name" value="<?php echo $products->title; ?>">
						<input type="hidden" name="product_category" value="<?php echo $products->category_id; ?>">
						<input type="hidden" name="product_id" value="<?php echo $products->id; ?>">
						
						<div class="col-md-12" style="padding:10px 0;">
							<div class="col-md-4 col-xs-6" style="padding:0px ;">
								<button type='button' class="quantity-button" name='subtract' onclick='javascript: subtractQty();' value='-'>-</button>
								<input type='text' class="quantity-field" name='qty' value="1" id='qty'/>
								<button type='button' class="quantity-button" name='add' onclick='javascript: document.getElementById("qty").value++;' value='+'>+</button>
							</div>
							<button type="submit" class="btn-u btn-u-sea-shop btn-u-lg">ADD TO CART</button>
							<a href="<?php echo site_url(); ?>products/wishlist/<?php echo $products->id; ?>"><button type="button" class="btn-u btn-u-sea-shop btn-u-lg">ADD TO WISHLIST</button></a>
						</div>						
					</div>
					
					<div class="row" style="padding-bottom: 20px; padding-top: 50px;">
						<div class="col-md-4">
							<h2 class="heading-sm">
								<img class="img-responsive pro_img_icon" src="<?php echo site_url();?>assets/img/cod.png">
								<span>COD Available</span>
							</h2>
						</div>
						<div class="col-md-4">
							<h2 class="heading-sm">
								<img class="img-responsive pro_img_icon" src="<?php echo site_url();?>assets/img/fast_deliver.png">
								<span>Fast Delivery</span>
							</h2>
						</div>
						<div class="col-md-4">
							<h2 class="heading-sm">
								<img class="img-responsive pro_img_icon" src="<?php echo site_url();?>assets/img/assured_quality.png">
								<span>Assured Quality</span>
							</h2>
						</div>
						<div class="col-md-4">
							<h2 class="heading-sm">
								<img class="img-responsive pro_img_icon" src="<?php echo site_url();?>assets/img/happy_cust.png">
								<span>8000+ Happy Customers</span>
							</h2>
						</div>
						<div class="col-md-4">
							<h2 class="heading-sm">
								<img class="img-responsive pro_img_icon" src="<?php echo site_url();?>assets/img/prefect_fit.png	">
								<span>Perfact Fit</span>
							</h2>
						</div>
						<div class="col-md-4">
							<h2 class="heading-sm">
								<img class="img-responsive pro_img_icon" src="<?php echo site_url();?>assets/img/trusted-brand.png">
								<span>Trusted Brand</span>
							</h2>
						</div>
					</div>
					
					
					
					<div class="faq_background">
						<section id="faq">
							<div class="faq" id="">
								
									<div class="row">
										<!-- Tabs -->
										<div class="col-md-12 ">
											<div class="faq-tab">
												<div class="panel-group acc-v1 plus-toggle " id="accordion-1">
													
													<div class="panel panel-default" style="background-color: transparent;">
														<div class="panel-heading" style="background-color: transparent;">
															<h4 class="panel-title">
																<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-1" href="#collapse-1">
																	Product Main Description
																</a>
															</h4>
														</div>
														<div id="collapse-1" class="panel-collapse collapse in">
															<div class="panel-body">
																<?php echo $products->description; ?>
															</div>
														</div>
													</div>
													
													<div class="panel panel-default" style="background-color: transparent;">
														<div class="panel-heading" style="background-color: transparent;">
															<h4 class="panel-title">
																<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-1" href="#collapse-2">
																	Highlights
																</a>
															</h4>
														</div>
														<div id="collapse-2" class="panel-collapse collapse">
															<div class="panel-body">
																<?php echo nl2br($products->highlights); ?>
															</div>
														</div>
													</div>
													
													<div class="panel panel-default" style="background-color: transparent;">
														<div class="panel-heading" style="background-color: transparent;">
															<h4 class="panel-title">
																<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-1" href="#collapse-3">
																	Fabric & Colour
																</a>
															</h4>
														</div>
														<div id="collapse-3" class="panel-collapse collapse">
															<div class="panel-body">
																<?php echo nl2br($products->fabriccolour); ?>
															</div>
														</div>
													</div>
													
													<div class="panel panel-default" style="background-color: transparent;">
														<div class="panel-heading" style="background-color: transparent;">
															<h4 class="panel-title">
																<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-1" href="#collapse-4">
																	Specifications
																</a>
															</h4>
														</div>
														<div id="collapse-4" class="panel-collapse collapse">
															<div class="panel-body">
																<?php echo nl2br($products->specifications); ?>
															</div>
														</div>
													</div>
													
												</div>
											</div>
										</div>
									</div>
								
							</div>
						</section>
					</div>
	
	
	
	
					
				</div>
			</div>
		</div>
	

</form>

	<div class="container content-md" style="padding-bottom: 10px; width: 95%;">
		<div class="text-center" style="padding-bottom:10px;">
				<h2 class="main_header">Product You May Also Like</h2>
			</div>
		
		<div class="row" style="padding:25px;">
			<div class="owl-carousel-v4">
				<div class="owl-slider-v5">
					<?php foreach($likeproducts as $likeproduct){ ?>
					<div class="item">
						<a href="<?php echo site_url(); ?>products/<?php echo $likeproduct->slug; ?>">
							<div class="product_box" >
								<img class="margin-bottom-20 product_image" src="<?php echo site_url(); ?>assets/photo/product/<?php echo $likeproduct->image; ?>" alt="<?php echo $likeproduct->title; ?>" style="width: 100%; height: 100%;">
								
								<h2 class="title-v3-md margin-bottom-10 text-center" style="color: #378D36;"><?php echo custom_echo($likeproduct->title, 25); ?></h2>
								<p class="text-center" style="font-size: 18px; line-height: 20px; font-weight: bold; color: #000;">
									<span style="text-decoration: color: #000;">&#8377; <?php echo $likeproduct->offer_price; ?></span>&nbsp;&nbsp; 
									<span style="font-size:12px; text-decoration: line-through; color: red;">&#8377; <?php echo $likeproduct->price; ?></span>&nbsp;&nbsp;<span style="font-size:12px; color: green;">You Save &#8377; <?php echo $likeproduct->price - $likeproduct->offer_price; ?></span>
								</p>
							</div>
						</a>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
		
	</div>



<?php
if(isset($_COOKIE['recent_view_product'])){
$recent_view_products		=	json_decode($_COOKIE['recent_view_product']);
//pr($recent_view_product);
//setcookie("recent_view_product", "", time() - 3600);
?>

	<div class="container content-md" style="padding-top:20px; padding-bottom: 10px;  width: 95%;">
		<div class="text-center" style="padding-bottom:10px;">
				<h2 class="main_header">Recently Viewed Products</h2>
			</div>
		
		<div class="row" style="padding:25px;">
			<div class="owl-carousel-v4">
				<div class="owl-slider-v5">
					<?php 
					$recent_view		=	\array_diff($recent_view_products, ["-"]);
					
					foreach($recent_view as $recent_view_product){ 
					if($recent_view_product != ''){
					$recent_product 			=	get_product_info($recent_view_product);
					
					?>
					<div class="item">
						<a href="<?php echo site_url(); ?>products/<?php echo $recent_product->slug; ?>">
							<div class="product_box" >
								<img class="margin-bottom-20 product_image" src="<?php echo site_url(); ?>assets/photo/product/<?php echo $recent_product->image; ?>" alt="<?php echo $recent_product->title; ?>" style="width: 100%; height: 100%;">
								
								<h2 class=" margin-bottom-10 text-center product_title"><?php echo custom_echo($recent_product->title, 27); ?></h2>
								<p class="text-center" style="font-size: 18px; line-height: 20px; font-weight: bold; color: #000;">
									<span style="text-decoration: color: #000;">&#8377; <?php echo $recent_product->offer_price; ?></span>&nbsp;&nbsp; 
									<span style="font-size:12px; text-decoration: line-through; color: red;">&#8377; <?php echo $recent_product->price; ?></span>&nbsp;&nbsp;<span style="font-size:12px; color: green;">You Save &#8377; <?php echo $recent_product->price - $recent_product->offer_price; ?></span>
								</p>
							</div>
						</a>
					</div>
					<?php } } ?>
				</div>
			</div>
		</div>
		
	</div>
<?php } ?>