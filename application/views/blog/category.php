<div class="breadcrumbs-v3 img-v1 text-center page_heading_padding" style="background: url(<?php echo site_url(); ?>assets/img/blog.jpg) no-repeat; background-size: cover;   -ms-background-size: cover;   -o-background-size: cover;   -moz-background-size: cover;   -webkit-background-size: cover;">
	<div class="container content-md">
		<h1 class="page_heading_top">&nbsp;</h1>
	</div>
</div>
		

<div class="container content-sm" style="padding-top: 60px; width: 90%;">
	<div class="row">
		
		<div class="col-md-9">
			<div class="row">
				<!-- Blog Posts -->
				<?php foreach($blogs as $blog){ 
				$categoryarray			=	explode(',', $blog->category_id);
				$categoryarray			=	array_filter($categoryarray);
				?>
			
				<div class="col-md-6">
					<div class="news-v3 bg-color-white margin-bottom-60">
						<img class="img-responsive full-width" src="<?php echo site_url(); ?>assets/photo/blogs/featured/<?php echo $blog->fimage; ?>" alt="<?php echo $blog->title; ?>">
						<div class="news-v3-in">
							<ul class="list-inline posted-info">
								<li>By <a href="#"><?php echo $blog->created_by; ?></a></li>
								<li>In 
								<?php foreach($categoryarray as $categorya){ ?>
								<a href="<?php echo site_url(); ?>blog/category/<?php echo get_blog_category_slug_by_id($categorya); ?>"><?php echo get_blog_category_by_id($categorya); ?></a>,
								<?php } ?>
								</li>
								<li>Posted <?php echo date('F d, Y', $blog->created_date); ?></li>
							</ul>
							<h2><a href="<?php echo site_url(); ?>blog/<?php echo $blog->slug; ?>"><?php echo $blog->title; ?></a></h2>
							<p><?php echo custom_echo(strip_tags($blog->description), 300); ?> <a href="<?php echo site_url(); ?>blog/<?php echo $blog->slug; ?>">Read More</a></p>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
		
		<div class="col-md-3">
			<?php $this->load->view('right_blog.php'); ?>
		</div>
		<!-- End Blog Sidebar -->
	</div>
</div>