<div class="breadcrumbs-v3 img-v1 text-center" style="background: url(<?php echo site_url(); ?>assets/img/breadcrumbs/background_category.jpg) no-repeat; background-position: center; padding: 150px 0;">
	<div class="container">
		<h1 style="font-weight:bolder;  text-shadow: 2px 2px #ff0000;">Featured Products</h1>
	</div>
</div>

<div class="container content-md illustration-v2" style="padding-top:40px; padding-bottom:40px;">
	<div class="row">
		<?php foreach($featured_products as $product){ ?>
		<a href="<?php echo site_url(); ?>products/<?php echo $product->slug; ?>">
		<div class="col-md-3 md-margin-bottom-50" style="padding-bottom:30px;">
			<div class="product-img">
				<img class="full-width img-responsive" src="<?php echo site_url(); ?>assets/photo/product/<?php echo $product->image; ?>" alt="<?php echo $product->title; ?>" style="border-left:2px solid #ccc; border-right:2px solid #ccc; border-top:2px solid #ccc; padding:10px; border-radius: 25px 25px 0px 0px;">
			</div>
			<div class="product-description product-description-brd">
				<h4 class="title-price"><a href="<?php echo site_url(); ?>products/<?php echo $product->slug; ?>"><?php echo custom_echo($product->title, 25); ?></a></h4>
				<div class="overflow-h margin-bottom-5">
					<div class="pull-left">
						<span class="gender text-capitalize"><?php echo get_product_category_title($product->category_id); ?></span>
					</div>
					<div class="product-price">
						<span class="title-price"><del>&#x20B9; <?php echo $product->price; ?></del></span>
						<span class="title-price">&#x20B9; <?php echo $product->offer_price; ?></span>
					</div>
				</div>
			</div>
		</div>
		</a>
		<?php } ?>
		
	</div>
</div>