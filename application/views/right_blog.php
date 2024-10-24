<div class="headline-v2"><h2>Latest Posts</h2></div>
<!-- Latest Links -->
<?php $latest_blogs			=	get_latest_blogs(); ?>
<ul class="list-unstyled blog-latest-posts margin-bottom-50">
	<?php foreach($latest_blogs as $latest_blog){ ?>
	<li>
		<h3><a href="<?php echo site_url(); ?>blog/<?php echo $latest_blog->slug; ?>"><b><?php echo $latest_blog->title; ?></b></a></h3>
		<small><?php echo date('F d, Y', $latest_blog->created_date); ?></small>
		<p><?php echo custom_echo(strip_tags($latest_blog->description), 125); ?></p>
	</li>
	<?php } ?>
</ul>
<!-- End Latest Links -->

<div class="headline-v2"><h2>Categories</h2></div>
<!-- Tags v2 -->
<?php $category_blogs			=	get_blogs_category(); ?>
<ul class="list-unstyled blog-latest-posts margin-bottom-50">
	<?php foreach($category_blogs as $category_blog){ ?>
	<li>
		<h3><a href="<?php echo site_url(); ?>blog/category/<?php echo $category_blog->slug; ?>"><b><?php echo $category_blog->title; ?> (<?php echo get_blog_count_category_id($category_blog->id); ?>)</b></a></h3>
	</li>
	<?php } ?>
</ul>
<!-- End category v2 -->

<div class="headline-v2"><h2>Tags</h2></div>
<!-- Tags v2 -->
<ul class="list-inline tags-v2 margin-bottom-50">
	<?php $blog_tags		=	get_blogs_tags(); ?>
	<?php foreach($blog_tags as $blog_tag){ ?>
	<li><a href="<?php echo site_url(); ?>blog/tags/<?php echo $blog_tag->slug; ?>"><?php echo $blog_tag->title; ?></a></li>
	<?php } ?>
	
</ul>
