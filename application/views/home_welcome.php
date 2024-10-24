<div class="tp-banner-container">
	<div class="tp-banner">
		<ul>
			<?php foreach($slider as $sliders){?>
			<li class="revolution-mch-1"   data-masterspeed="1000">
				<img src="<?php echo site_url();?>assets/photo/slider/<?php echo $sliders->image?>" data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
			</li>
			<?php } ?>
		</ul>
		<div class="tp-bannertimer tp-bottom"></div>
	</div>
</div>

<?php $home_about				=	get_cmspage_by_id('2') ?>
<div class="container content-md content-md-bottom0" style="width: 98%;">
	<div class="heading-v13 heading-v13--center text-center g-pt-10 g-mb-30">
		<span class="heading-v13__block-name">Company DISCOUNT Shop</span>
		<h1 class="heading-v13__title font-main">Unlock Savings, Elevate Comfort, Your Home Appliance Destination!</h1>
	</div>
	<div class="row">
		<div class="col-md-12 about_content"><?php echo $home_about->description; ?></div>
	</div>
	
	<div class="row">
		<div class="owl-carousel-v4">
			<div class="owl-slider-v5">
				<?php foreach($categories as $h_cat){ ?>
				<div class="item">
					<a href="<?php echo site_url(); ?>category/<?php echo $h_cat->slug; ?>">
						<div class="service-block service-block-default" style="margin: 0px 0px;">
							<img class="image-md cat_image" src="<?php echo site_url(); ?>assets/photo/productcategory/<?php echo $h_cat->image; ?>" alt="<?php echo $h_cat->title; ?>" title="<?php echo $h_cat->title; ?>">
							<h2 class="heading-md cate_title"><?php echo $h_cat->title; ?></h2>
						</div>
					</a>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>

<div class="container content-md" style="width: 100%; padding: 0;">
	<img class="" src="<?php echo site_url(); ?>assets/img/banner-1.jpg" alt="Company DISCOUNT Shop" title="Company DISCOUNT Shop">
</div>


<div class="container content-md" style="padding-top:40px; padding-bottom: 0px; width: 98%;">
	
	<div class="heading-v13 heading-v13--center text-center g-pt-10 g-mb-30">
		<span class="heading-v13__block-name">Best Selling Items</span>
		<h1 class="heading-v13__title font-main">Top Rated Items For you</h1>
	</div>
	
	<div class="row news-v2">
		<?php foreach($feature_products as $fproduct){ ?>
		<div class="col-md-3 col-xs-6 p_b_30_10 padding_box">
			<a href="<?php echo site_url(); ?>products/<?php echo $fproduct->slug; ?>">
			<div class="package_item">
				<div class="news-v2-badge">
					<img src="<?php echo site_url()?>assets/timthumb.php?src=<?php echo site_url()?>assets/photo/product/<?php echo $fproduct->image;?>&w=1000&h=600&zc=1&q=90" alt="">
				</div>
				<h2 class="margin-bottom-10 desktop_display"><?php echo custom_echo($fproduct->title, 85); ?></h2>
				<h2 class="margin-bottom-10 mobile_display"><?php echo custom_echo($fproduct->title, 40); ?></h2>
				<div class="row item_price" style="margin: 0;">
					<div class="col-md-12 onrequest">&#8377; <?php echo $fproduct->offer_price; ?></div>
				</div>
			</div>
			</a>
		</div>
		
		<?php } ?>
	</div>
</div>

<div class="container content-md" style="width: 100%; padding: 0;">
	<a href="<?php echo site_url(); ?>blog/factory-seconds-vs-second-hand-products" target="_blank">
		<img class="" src="<?php echo site_url(); ?>assets/img/banner3.jpg" alt="Company DISCOUNT Shop" title="Company DISCOUNT Shop">
	</a>
</div>

<div class="bg-color-light" style="background-color: #f7f7f7 !important;">
	<div class="container content-md content-md-bottom0" style="width: 90%;">
		<div class="heading-v13 heading-v13--center text-center g-pt-10 g-mb-30">
			<span class="heading-v13__block-name">Testimonials</span>
			<h1 class="heading-v13__title font-main">What Our Clients Say About Us</h1>
		</div>
		<div class="row">
			<div class="owl-carousel-v4">
				<div class="owl-slider-v3">
					<?php foreach($testimonials as $testimonial){ ?>
					<div class="item">
						<div class="testimonials-v4 md-margin-bottom-50">
							<div class="testimonials-v4-in">
								<span><?php echo custom_echo(strip_tags($testimonial->description), 100); ?></span>
								<span class="testimoniacustom_echo($fproduct->ls_span"><?php echo $testimonial->name; ?></span><br>
								<em class="testimonials_em"><?php echo $testimonial->post; ?></em>
							</div>
							
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div><!--/end container-->
</div>

<div class="bg-color-light" style="background-color: #f7f7f7 !important;">
	<div class="container content-md content-md-top0" style="width: 98%;">
		<div class="text-center margin-bottom-60">
			<div class="heading-v13 heading-v13--center text-center g-pt-10 g-mb-30">
				<span class="heading-v13__block-name">WHAT WE OFFER</span>
				<h1 class="heading-v13__title font-main">Why we are different from others</h1>
			</div>
		</div>

		<div class="row margin-bottom-30">
			<div class="col-sm-4 sm-margin-bottom-50  fadeIn wow animated" data-wow-duration="1.5s" style="visibility: visible; animation-duration: 1.5s; animation-name: fadeIn;">
				<div class="service-block-v8">
					<div class="service-block-desc">
						<h3>DISCOUNT Shop</h3>
						<p>Our mission is to provide top-quality products at significantly lower costs, ensuring you get the best value for your money.Her you may Discover amazing deals on factory seconds home appliances at unbeatable prices from time to time. Browse our collection today and experience the thrill of savings with expert guidance and after sales service.</p>
					</div>
				</div>
			</div>
			<div class="col-sm-4 sm-margin-bottom-20  fadeIn wow animated" data-wow-duration="1.5s" data-wow-delay="0.8s" style="visibility: visible; animation-duration: 1.5s; animation-delay: 0.8s; animation-name: fadeIn;">
				<div class="service-block-v8">
					<div class="service-block-desc">
						<h3>100% Authentic Brand</h3>
						<p>People often assume that cheaper products are either unreliable or compromised on quality, but we're here to challenge that notion!""Rest assured, our products are directly sourced from manufacturers and come with the same warranties as those sold elsewhere, so you get the same quality and peace of mind at a fraction of the cost</p>
					</div>
				</div>
			</div>
			<div class="col-sm-4 sm-margin-bottom-50  fadeIn wow animated" data-wow-duration="1.5s" data-wow-delay="0.5s" style="visibility: visible; animation-duration: 1.5s; animation-delay: 0.5s; animation-name: fadeIn;">
				<div class="service-block-v8">
					<div class="service-block-desc">
						<h3>One Stop Shop</h3>
						<p>Think of our store as your one-stop shop for all your home appliance needs. Refrigeration is our core competency  We offer a wide range of factory seconds Air conditioners and other products at discounted prices, making it easy for you to find what you need in one convenient place. No more hopping from store to store - just quality products, great prices, and hassle-free shopping with us.</p>
					</div>
				</div>
			</div>
		</div>
		<!-- End Service Block v8 -->
	</div>
</div>


<div class="parallax-counter-v1 parallaxBg" style="background-position: 50% 42px;">
	<div class="container" style="width: 90%;">
		<h2 class="title-v2 title-light title-center">SOME FACTS AND SERVICES</h2>
		<div class="margin-bottom-40"></div>

		<div class="row margin-bottom-10">
			<div class="col-sm-3 col-xs-6 box-m-b">
				<div class="counters">
					<span class="counter">10629</span>
					<h4>Satisfied Clients</h4>
				</div>
			</div>
			<div class="col-sm-3 col-xs-6 box-m-b">
				<div class="counters">
					<span class="counter">14</span>
					<h4>Brands</h4>
				</div>
			</div>
			<div class="col-sm-3 col-xs-6 box-m-b">
				<div class="counters">
					<span class="counter">8</span>
					<h4>Working Years</h4>
				</div>
			</div>
			<div class="col-sm-3 col-xs-6 box-m-b">
				<div class="counters">
					<span class="counter">250</span>
					<h4>Products</h4>
				</div>
			</div>
		</div>
	</div>
</div>
		
		

<?php /* ?><div class="container content-md" style="width: 90%;">			
	<div class="container-fluid no-padding pattern-v1">
		<div class="">
			<div class="heading-v13 heading-v13--center text-center g-pt-10 g-mb-30">
				<span class="heading-v13__block-name">Our Blog</span>
				<h1 class="heading-v13__title font-main">Unlock a world of inspiration and knowledge in our captivating blog!</h1>
			</div>
			
			<div class="row">
				<div class="owl-carousel-v4">
					<div class="owl-slider-v3">
						<?php foreach($blogs as $blog){ ?>
						<div class="item" style="padding: 0 10px;">
							<div class="thumbnails-v1">
								<div class="thumbnail-img">
									<img class="img-responsive" src="<?php echo site_url(); ?>assets/photo/blogs/featured/<?php echo $blog->fimage; ?>" alt="" style="border-radius: 10px;">
								</div>
								<div class="caption">
									<div class="meta-wrapper post-cats-author">
										<span class="blog-post_meta-categories">
											<span>
											<?php 
											$categoryarray			=	explode(',', $blog->category_id);
											$categoryarray			=	array_filter($categoryarray);
											
											foreach($categoryarray as $categorya){
											?>
												<a href="" style="color: #3184c6; font-size: 13px; font-weight: normal;  text-transform: capitalize;"><?php echo get_blog_category_by_id($categorya); ?>, </a>
											<?php } ?>
											</span>
										</span>
										<span class="author_post" style="color: #000; font-size: 13px; font-weight: normal;  text-transform: capitalize;"> / by <?php echo $blog->created_by; ?></a>
										</span>
										<span class="author_post" style="color: #000; font-size: 13px; font-weight: normal;  text-transform: capitalize;"> / <?php echo date('M d, Y', $blog->created_date); ?></a>
										</span>
									</div>
									<h3 class="blog-post_title"><a href="" class="blog-post_title"><?php echo $blog->title; ?></a></h3>
									<p><?php echo custom_echo(strip_tags($blog->description), 130); ?></p>
									<p class="read-more-wrap" style="text-align: right;"><a class="button-read-more" href="">Read More</a></p>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php */ ?>

<section id="faq">
	<div class="faq" id="">
		<div class="container content-md" style="width: 90%;">			
			<div class="row">
				<!-- Tabs -->
				<div class="col-md-5" >
					<div class="faq-img">
						<img src="<?php echo site_url(); ?>assets/img/faq.jpg" alt="" class="img-responsive">
					</div>
				</div>
				<div class="col-md-7 ">
					<div class="faq-tab">
						<div id="iguru_dlh_614c8b02c818e" class="iguru_module_double_headings aleft ">
							<div class="dlh_subtitle" >
								<span class="dlh_subtitle_line">FAQ</span>
							</div>
							<div class="dlh_title">
								<div class="dlh_title_mobile">
									<span style="color: #000;">Know about Company DISCOUNT Shop</span>
								</div>
							</div>
						</div>
						<br />
						<div class="panel-group acc-v1 plus-toggle " id="accordion-1">
							<?php foreach($faqs as $key=>$faq){ ?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a class="accordion-toggle <?php if($key != '0'){ ?>collapsed<?php } ?>" data-toggle="collapse" data-parent="#accordion-1" href="#collapse-<?php echo $faq->id; ?>">
											<?php echo $faq->title; ?>
										</a>
									</h4>
								</div>
								<div id="collapse-<?php echo $faq->id; ?>" class="panel-collapse collapse <?php if($key == '0'){ ?>in<?php } ?> ">
									<div class="panel-body">
										<?php echo $faq->description; ?>
									</div>
								</div>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- FAQ Frequently Asked Questions -->	