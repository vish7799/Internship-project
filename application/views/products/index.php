<div class="breadcrumbs-v3 img-v1 text-center page_heading_padding" style="background: url(<?php echo site_url(); ?>assets/img/products.jpg) no-repeat; background-size: cover;   -ms-background-size: cover;   -o-background-size: cover;   -moz-background-size: cover;   -webkit-background-size: cover;">
	<div class="container content-md">
		<h1 class="page_heading_top">&nbsp;</h1>
	</div>
</div>
<div class="shop-product" style="background: transparent;">
	
	<div class="container" style="padding-top:40px; padding-bottom: 10px; width: 90%;">
		<div class="row">
			<div class="col-md-5">
				<div class="ms-showcase2-template">
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
				</div>
			</div>
			<div class="col-md-7 product_box_custom">
				<div class="row">
					<div class="shop-product-heading">
						<h2 class="p_font_size_18"><?php echo $products->title; ?></h2>
					</div>
					<div  class="col-md-12 product_size_box_pad">
						<div class="row">
							<div class="">
								<div class="col-md-12">
									<ul class="product_price_box_pad list-inline shop-product-prices font_size_price" id="product_options_price">
										<li class="shop-green">&#x20B9;<?php echo $products->offer_price; ?></li>
										<li class="line-through" style="font-size: 18px; color: #000; font-weight:bold;">&#x20B9;<?php echo $products->price; ?></li>
										<li class="" style="font-size: 18px; color: green; font-weight: bold;">You Save &#x20B9;<?php echo $products->price - $products->offer_price; ?></li>
									</ul>
								</div>
								<div class="col-md-12">
									<?php echo $products->description; ?>
								</div>
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-6 col-xs-6">
											&nbsp;
										</div>
										<div class="col-md-6 col-xs-6">
											<a href="<?php echo site_url(); ?>products/wishlist/<?php echo $products->id; ?>"><button type="button" class="btn-u btn-u-sea-shop btn-u-lg"><i class="fa fa-question"></i> Enquiry Now</button></a>
											<a target="_blank" href="https://wa.me/<?php echo get_setting('whatsapp'); ?>"><button type="button" class="btn-u btn-u-sea-shop btn-u-lg"><i class="fa fa-whatsapp"></i> Connect On Whatsapp</button></a>
										</div>
									</div>
								</div>
								
								<div class="col-md-12">
									<div class="row" style="padding-bottom: 20px; padding-top: 50px;">
										<div class="col-md-4 col-xs-6">
											<h2 class="heading-sm" style="font-size: 14px;">
												<img class="img-responsive pro_img_icon" src="<?php echo site_url();?>assets/img/cod.png">
												<span>COD Available</span>
											</h2>
										</div>
										<div class="col-md-4  col-xs-6">
											<h2 class="heading-sm" style="font-size: 14px;">
												<img class="img-responsive pro_img_icon" src="<?php echo site_url();?>assets/img/fast_deliver.png">
												<span>Fast Delivery</span>
											</h2>
										</div>
										<div class="col-md-4  col-xs-6">
											<h2 class="heading-sm" style="font-size: 14px;">
												<img class="img-responsive pro_img_icon" src="<?php echo site_url();?>assets/img/assured_quality.png">
												<span>Assured Quality</span>
											</h2>
										</div>
										<div class="col-md-4  col-xs-6">
											<h2 class="heading-sm" style="font-size: 14px;">
												<img class="img-responsive pro_img_icon" src="<?php echo site_url();?>assets/img/trusted-brand.png">
												<span>Trusted Brand</span>
											</h2>
										</div>
										<div class="col-md-4  col-xs-6">
											<h2 class="heading-sm" style="font-size: 13px;">
												<img class="img-responsive pro_img_icon" src="<?php echo site_url();?>assets/img/happy_cust.png">
												<span>Happy Customers</span>
											</h2>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>				
				</div>
			</div>
		</div>
	</div>
</div>


<div style="background: url(<?php echo site_url(); ?>assets/img/background.jpg) no-repeat; background-size: cover;   -ms-background-size: cover;   -o-background-size: cover;   -moz-background-size: cover;   -webkit-background-size: cover;">
<div class="container content" >
	<div class="row margin-bottom-30">
		<div class="col-md-4 mb-margin-bottom-30"></div>
		<div class="col-md-8 mb-margin-bottom-30">
			<h2 style="color: #ee1a22; font-weight: bold; text-transform: capitalize; font-size: 30px;">Enquiry Now</h2>
			<?php if(isset($_SESSION['msg'])){ echo $_SESSION['msg']; unset($_SESSION['msg']); }?>
			<p>Have a question or need assistance? We're here to help! Contact Company DISCOUNT Shop's friendly customer service team for expert assistance with your home appliance needs. Whether you have inquiries about products, orders, or anything else, we're just a message away. Reach out to us via phone, email, or fill out the contact form below, and we'll get back to you promptly. Your satisfaction is our priority!</p>
			<form action="<?php echo site_url(); ?>products/<?php echo $products->slug; ?>" method="post" class="sky-form sky-changes-3">
				<fieldset>
					<div class="row">
						<section class="col col-4">
							<label class="label">Name</label>
							<label class="input">
								<i class="icon-append fa fa-user"></i>
								<input type="text" name="name" id="name" value="<?php echo set_value('name')?>">
								<?php echo form_error('name', '<span style="color:red;" class="help-block form-error">', '</span>'); ?>
							</label>
						</section>
						<section class="col col-4">
							<label class="label">E-mail</label>
							<label class="input">
								<i class="icon-append fa fa-envelope-o"></i>
								<input type="email" name="email" id="email" value="<?php echo set_value('email')?>">
								<?php echo form_error('email', '<span style="color:red;" class="help-block form-error">', '</span>'); ?>
							</label>
						</section>
						<section class="col col-4">
							<label class="label">Phone</label>
							<label class="input">
								<i class="icon-append fa fa-tag"></i>
								<input type="text" name="mobile" id="mobile" value="<?php echo set_value('mobile')?>">
								<?php echo form_error('mobile', '<span style="color:red;" class="help-block form-error">', '</span>'); ?>
							</label>
						</section>
					</div>
					
					<section>
						<label class="label">Message</label>
						<label class="textarea">
							<i class="icon-append fa fa-comment"></i>
							<textarea rows="4" name="message" id="message"><?php echo set_value('message')?></textarea>
							<?php echo form_error('message', '<span style="color:red;" class="help-block form-error">', '</span>'); ?>
						</label>
					</section>
				</fieldset>
				<footer>
					<input type="hidden" name="product_id" id="product_id" value="<?php echo $products->id; ?>">
					<button type="submit" class="btn-u">Send message</button>
				</footer>
			</form>
		</div>
		
	</div><!--/row-->
</div>
</div>
	


<div>
	<div class="container content-md" style="padding-bottom: 10px; width: 90%;">
		<div class="text-center" style="padding-bottom:10px;">
				<h2 class="main_header">Product You May Also Like</h2>
			</div>
		
		<div class="row" style="padding:25px;">
			<div class="owl-carousel-v4">
				<div class="owl-slider-v4">
					<?php foreach($likeproducts as $likeproduct){ ?>
					<div class="item">
						<a href="<?php echo site_url(); ?>products/<?php echo $likeproduct->slug; ?>">
						<div class="package_item">
							<div class="news-v2-badge">
								<img src="<?php echo site_url()?>assets/timthumb.php?src=<?php echo site_url()?>assets/photo/product/<?php echo $likeproduct->image;?>&w=1000&h=600&zc=1&q=90" alt="">
							</div>
							<h2 class="margin-bottom-10"><?php echo $likeproduct->title; ?></h2>
							<p><?php echo custom_echo($likeproduct->description, 100); ?></p>
							<div class="row item_price" style="margin: 0;">
								<div class="col-md-12 onrequest">&#8377; <?php echo $likeproduct->offer_price; ?></div>
							</div>
						</div>
						</a>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
		
	</div>