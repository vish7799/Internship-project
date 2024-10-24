	<div class="container content-md" style="padding-top:20px; padding-bottom: 10px; width: 95%; ">
		<div class="row">
			<div class="col-md-qw md-margin-bottom-50">
				<div class="row">
					<div class="col-md-8" >
						<h1 class="page_heading">Most Love</h1>
					</div>
					<div class="col-md-4 padding_left_right" >
						<form action="<?php echo site_url(); ?>mostloved" method="post" id="sky-form3" class="sky-form sky-changes-3" novalidate="novalidate" style="border: 0px;">
							<section class="col col-3" style="float: right;">
								<label class="select">
									<select name="sorting" id="sorting" onchange="this.form.submit()">
										<option value="" <?php if($sorting == ''){ ?> selected <?php } ?>>Sort By</option>
										<option value="Name (A-Z)" <?php if($sorting == 'Name (A-Z)'){ ?> selected <?php } ?>>Name (A-Z)</option>
										<option value="Name (Z-A)" <?php if($sorting == 'Name (Z-A)'){ ?> selected <?php } ?>>Name (Z-A)</option>
										<option value="Price (Low to High)" <?php if($sorting == 'Price (Low to High)'){ ?> selected <?php } ?>>Price (Low to High)</option>
										<option value="Price (High to Low)" <?php if($sorting == 'Price (High to Low)'){ ?> selected <?php } ?>>Price (High to Low)</option>
									</select>
									<?php echo form_error('subject', '<span style="color:red;" class="help-block form-error">', '</span>'); ?>
								</label>
							</section>
						</form>
					</div>
				</div>
				<?php foreach($products as $product){ ?>
				<div class="item col-md-3" style="padding-bottom: 30px; ">
					<a href="<?php echo site_url(); ?>products/<?php echo $product->slug; ?>">
						<div class="product_box" >
							<div class="geeks">
							<img class="product_image desktop_display" src="<?php echo site_url(); ?>assets/photo/product/<?php echo $product->image; ?>" alt="<?php echo $product->title; ?>" title="<?php echo $product->title; ?>" style="width: 412px; height: 618px;">
							<img class="product_image mobile_display" src="<?php echo site_url(); ?>assets/photo/product/<?php echo $product->image; ?>" alt="<?php echo $product->title; ?>" title="<?php echo $product->title; ?>" style="width: 302px; height: 453px;">
							</div>
							<div class="shop-rgba-red rgba-banner">
								<a href="<?php echo site_url(); ?>products/wishlist/<?php echo $product->id; ?>">
									<i class="fa fa-heart" aria-hidden="true" style="color: #ff0000; font-size: 20px;"></i>
								</a>
							</div>
							<?php if($product->qty == 0){ ?>
							<div class="shop-rgba-red rgba-banner">Out of stock</div>
							<?php } ?>
							<h2 class=" margin-bottom-10 product_title" style="padding-left: 10px;"><?php echo custom_echo($product->title, 27); ?></h2>
							<p class="" style="font-size: 18px; line-height: 20px; font-weight: bold; color: #000; padding-left: 10px;">
								<span class="product_offer_price">&#8377; <?php echo $product->offer_price; ?></span>
								&nbsp;&nbsp; 
								<span class="product_main_price">&#8377; <?php echo $product->price; ?></span>
								&nbsp;&nbsp;
								<span class="product_save_amount">You Save &#8377; <?php echo $product->price - $product->offer_price; ?></span>
							</p>
						</div>
					</a>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
