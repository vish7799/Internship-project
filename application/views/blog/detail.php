<div class="breadcrumbs-v3 img-v1 text-center page_heading_padding" style="background: url(<?php echo site_url(); ?>assets/img/blog.jpg) no-repeat; background-size: cover;   -ms-background-size: cover;   -o-background-size: cover;   -moz-background-size: cover;   -webkit-background-size: cover;">
	<div class="container content-md">
		<h1 class="page_heading_top">&nbsp;</h1>
	</div>
</div>

<div class="container content-sm" style="padding-top: 60px; width: 90%;">
	<div class="row">
		<div class="col-md-9">
			<?php
			$categoryarray			=	explode(',', $blog->category_id);
			$categoryarray			=	array_filter($categoryarray);
			?>
			<div class="news-v3 bg-color-white ">
				<img class="img-responsive full-width" src="<?php echo site_url(); ?>assets/photo/blogs/featured/<?php echo $blog->fimage; ?>" alt="<?php echo $blog->title; ?>">
				<div class="news-v3-in" style="padding: 10px 0px">
					<ul class="list-inline posted-info">
						<li>By <a href="#"><?php echo $blog->created_by; ?></a></li>
						<li>In 
						<?php foreach($categoryarray as $categorya){ ?>
						<a href="<?php echo site_url(); ?>blog/category/<?php echo get_blog_category_slug_by_id($categorya); ?>"><?php echo get_blog_category_by_id($categorya); ?></a>,
						<?php } ?>
						</li>
						<li>Posted <?php echo date('F d, Y', $blog->created_date); ?></li>
						<li>Views <?php echo get_blogs_views_tracker($blog->id); ?></li>
					</ul>
					<h2><a href="<?php echo site_url(); ?>blog/<?php echo $blog->slug; ?>"><?php echo $blog->title; ?></a></h2>
					<p><?php echo $blog->description; ?></p>
					
					<?php $blog_images				=	get_blogs_images($blog->id); 
					if(count($blog_images) > 0){
					?>
					
					<div class="row  margin-bottom-30">
						<?php  
						foreach($blog_images as $blog_image){ ?>
						<div class="col-sm-4" style="padding-bottom: 30px;">
							<a href="<?php echo site_url(); ?>assets/photo/blogs/other/<?php echo $blog_image->image; ?>" rel="gallery1" class="fancybox img-hover-v1" title="<?php echo $blog->title; ?>">
								<span><img class="img-responsive" src="<?php echo site_url(); ?>assets/photo/blogs/other/<?php echo $blog_image->image; ?>" alt="<?php echo $blog->title; ?>"></span>
							</a>
						</div>
						<?php } ?>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
		
		<div class="col-md-3">
			<?php $this->load->view('right_blog.php'); ?>
			<?php $this->load->view('right_products.php'); ?>
		</div>
		
	</div>
</div>

<div style="background: url(<?php echo site_url(); ?>assets/img/back.jpg) no-repeat; background-size: cover;   -ms-background-size: cover;   -o-background-size: cover;   -moz-background-size: cover;   -webkit-background-size: cover;">
<div class="container content-sm" style="padding-top: 0px; width: 90%;">
	<div class="row">
		<?php $blog_comment_count 			=	count($blog_comments); 
		if($blog_comment_count > 0){
		?>
		<h2 class="margin-bottom-20" style="color: #ee1a22; font-weight: bold;">Comments</h2>
		<div class="row blog-comments margin-bottom-30">
		<?php foreach($blog_comments as $blog_comment){ ?>
			<div class="col-sm-4">
				<div class="comments-itself">
					<h4>
						<?php echo $blog_comment->name; ?>
						<span><?php echo time_elapsed_string('@'.$blog_comment->created); ?></span>
					</h4>
					<p><?php echo $blog_comment->message; ?></p>
				</div>
			</div>
		<?php } ?>
		</div>
		<hr>
		
		<?php } ?>
		
		<h2 class="margin-bottom-20">Post a Comment</h2>
		
		<form action="<?php echo site_url(); ?>blog/<?php echo $blog->slug; ?>" method="post" class="sky-form sky-changes-3" novalidate="novalidate">
			<fieldset>
				<div class="row sky-space-30">
					<div class="col-md-6">
						<div>
							<input type="text" name="name" id="name" placeholder="Name" class="form-control">
						</div>
					</div>
					<div class="col-md-6">
						<div>
							<input type="text" name="email" id="email" placeholder="Email" class="form-control">
						</div>
					</div>
				</div>

				<div class="sky-space-30">
					<div>
						<textarea rows="8" name="message" id="message" placeholder="Write comment here ..." class="form-control"></textarea>
					</div>
				</div>
				<input type="hidden" name="blog_id" value="<?php echo $blog->id; ?>" />
				<p><button type="submit" class="btn-u">Submit</button></p>
			</fieldset>
		</form>
	</div>
</div>
</div>

<div class="container content-md" style="width: 90%;">			
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