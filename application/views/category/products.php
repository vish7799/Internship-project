<div class="breadcrumbs-v3 img-v1 text-center page_heading_padding" style="background: url(<?php echo site_url(); ?>assets/img/products.jpg) no-repeat; background-size: cover;   -ms-background-size: cover;   -o-background-size: cover;   -moz-background-size: cover;   -webkit-background-size: cover;">
	<div class="container content-md">
		<h1 class="page_heading_top">&nbsp;</h1>
	</div>
</div>
<div class="container content-md category_product_container" style="width: 90%;">
	<div class="row">
		<div class="col-md-qw md-margin-bottom-50">
			<div class="row">
				<div class="col-md-8 col-xs-6" >
				</div>
				<div class="col-md-4 col-xs-6 padding_left_right" >
					<form action="<?php echo site_url(); ?>category/<?php echo $cat_slug; ?>" method="post" id="sky-form3" class="sky-form sky-changes-3" novalidate="novalidate" style="border: 0px;">
						<section class="col col-3" style="float: right;">
							<label class="select">
								<select name="sorting" id="sorting" onchange="this.form.submit()">
									<option value="" <?php if($sorting == ''){ ?> selected <?php } ?>>Sort By</option>
									<option value="Name (A-Z)" <?php if($sorting == 'Name (A-Z)'){ ?> selected <?php } ?>>Name (A-Z)</option>
									<option value="Name (Z-A)" <?php if($sorting == 'Name (Z-A)'){ ?> selected <?php } ?>>Name (Z-A)</option>
									<option value="Price (Low to High)" <?php if($sorting == 'Price (Low to High)'){ ?> selected <?php } ?>>Price (Low to High)</option>
									<option value="Price (High to Low)" <?php if($sorting == 'Price (High to Low)'){ ?> selected <?php } ?>>Price (High to Low)</option>
								</select>
								
							</label>
						</section>
					</form>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-9" >
					<div class="row">
					<?php foreach($products as $product){ ?>
					<div class="col-md-4 col-xs-6" style="padding-bottom: 30px;">
						<a href="<?php echo site_url(); ?>products/<?php echo $product->slug; ?>">
						<div class="package_item">
							<div class="news-v2-badge">
								<img src="<?php echo site_url()?>assets/timthumb.php?src=<?php echo site_url()?>assets/photo/product/<?php echo $product->image;?>&w=1000&h=800&zc=1&q=90" alt="">
							</div>
							<h2 class="margin-bottom-10"><?php echo custom_echo($product->title, 75); ?></h2>
							<div class="row item_price" style="margin: 0;">
								<div class="col-md-12 onrequest">&#8377; <?php echo $product->offer_price; ?></div>
							</div>
						</div>
						</a>
					</div>
					<?php } ?>
					</div>
				</div>
				<div class="col-md-3">
					<?php $this->load->view('right_products.php'); ?>
				</div>
			</div>
		</div>
	</div>
</div>
