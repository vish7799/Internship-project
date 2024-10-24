<div class="breadcrumbs-v3 img-v1 text-center page_heading_padding" style="background: url(<?php echo site_url(); ?>assets/img/products.jpg) no-repeat; background-size: cover;   -ms-background-size: cover;   -o-background-size: cover;   -moz-background-size: cover;   -webkit-background-size: cover;">
	<div class="container content-md">
		<h1 class="page_heading_top">&nbsp;</h1>
	</div>
</div>

<div class="container content-md category_product_container" style="width: 90%;">
	<div class="row">
		<div class="col-md-9" >
			<div class="row text-center desktop_display">
				<?php foreach($categories as $category){ ?>
				<a href="<?php echo site_url(); ?>category/<?php echo $category->slug; ?>" style="text-decoration:none;">
					<div class="col-md-3 col-xs-6 flat-service" style="padding-bottom: 35px;">
						<div class="b-img">
						<img class="cat_image" src="<?php echo site_url(); ?>assets/photo/productcategory/<?php echo $category->image; ?>" alt="<?php echo $category->title; ?>" title="<?php echo $category->title; ?>">
						<h1 class="cate_title"><?php echo $category->title; ?></h1>
						</div>
					</div>
					</a>
				<?php } ?>
			</div>
		</div>
		<div class="col-md-3">
			<?php $this->load->view('right_products.php'); ?>
		</div>
	</div>
</div>