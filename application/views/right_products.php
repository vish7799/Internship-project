<?php if($menu != 'About Us' && $menu != 'Testimonials' && $menu != 'Faq'){ ?>
<form action="<?php echo site_url(); ?>search" method="post" id="sky-form3" class="sky-form sky-changes-3" novalidate="novalidate" style="border: none;">
<?php 
$cat_id								=	get_category_id_by_slug($cat_slug); 
$child_cat_count 					=	getChildCategoryCount($cat_id); 
?>
<?php if($cat_id == 1 || $cat_id == 2 || $child_cat_count > 0){ ?>
<div class="headline-v2"><h2>Search</h2></div>
<?php if($child_cat_count > 0){ ?>
<h3>Filter By Sub Catgories</h3>
<?php 
$childsubcategories 				=	getChildCategoryById($cat_id);
//pr($childsubcategories);
?>
<section>
	<?php foreach($childsubcategories as $childsubcategory){ ?>
	<label class="checkbox"><input type="checkbox" name="sub_cat[]" value="<?php echo $childsubcategory->id; ?>"><i></i><?php echo $childsubcategory->title; ?></label>
	<?php } ?>
</section>
<?php } ?>
<?php if($cat_id == 1 || $cat_id == 2){ ?>
<h3>Filter By Star Rating</h3>
<section>
	<label class="checkbox"><input type="checkbox" name="star_rating[]" value="3 Star"><i></i>3 Star</label>
	<label class="checkbox"><input type="checkbox" name="star_rating[]" value="4 Star"><i></i>4 Star</label>
	<label class="checkbox"><input type="checkbox" name="star_rating[]" value="5 Star"><i></i>5 Star</label>
	<label class="checkbox"><input type="checkbox" name="star_rating[]" value="Non Invertor"><i></i>Non Invertor</label>
</section>
<?php } ?>
<footer>
	<button type="submit" class="btn-u" style="float: right;">Search</button>
</footer>
</form>
<?php } } ?>

<div class="headline-v2"><h2>Best Selling Items</h2></div>
<!-- Latest Links -->
<div class="product_right">
<?php $featured_products			=	get_featured_product(); ?>
<?php foreach($featured_products as $featured_product){ ?>
<div class="row blog-latest-posts product_right_box">
	<div class="col-md-3">
		<img src="<?php echo site_url()?>assets/timthumb.php?src=<?php echo site_url()?>assets/photo/product/<?php echo $featured_product->image;?>&w=1000&h=600&zc=1&q=90" alt="">
	</div>
	<div class="col-md-9">
		<h3><a href="<?php echo site_url(); ?>products/<?php echo $featured_product->slug; ?>"><b><?php echo $featured_product->title; ?></b></a></h3>
		<div class="row" style="margin: 0;">
			<div class="col-md-12 side_onrequest">&#8377; <?php echo $featured_product->offer_price; ?></div>
		</div>
	</div>
</div>	
<?php } ?>
</div>
<div class="headline-v2"><h2>Categories</h2></div>
<!-- Tags v2 -->
<?php $categoryies			=	getParentCategory(); ?>
<ul class="list-unstyled blog-latest-posts margin-bottom-50">
	<?php foreach($categoryies as $categorys){ ?>
	<li>
		<h3><a href="<?php echo site_url(); ?>category/<?php echo $categorys->slug; ?>"><b><?php echo $categorys->title; ?> (<?php echo get_product_count_category_id($categorys->id); ?>)</b></a></h3>
	</li>
	<?php } ?>
</ul>