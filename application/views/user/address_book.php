<div class="breadcrumbs-v4 img-v1  page_heading_padding" style="background: #eae7e4;">
	<div class="container">
		<span class="page-name">Wishlist</span>
		<ul class="breadcrumb-v4-in">
			<li><a href="<?php echo site_url(); ?>">Home</a></li>
			<li><a href="<?php echo site_url(); ?>user">User</a></li>
			<li class="active">Address Book</li>
		</ul>
	</div>
</div>

<div style="background: url(<?php echo site_url();?>assets/img/web/back_image.png) repeat; ">
<div class="container content-md" style="padding-top:30px; padding-bottom:30px;">
	<div class="row">
		<div class="col-md-12">
			<span style="color:green; font-weight:bold; font-size:16px;"><?php if(isset($_SESSION['msg'])){ echo $_SESSION['msg']; unset($_SESSION['msg']); }?></span>
		</div>
		
		<?php include('left_menu.php'); ?>
		
		<div class="col-md-9">
			
			<?php foreach($user_address as $address){ ?>
						
			<div class="testimonials-v6 testimonials-wrap">
				<div class="row margin-bottom-50">
					<div class="col-md-12 md-margin-bottom-50">
						
						<div class="testimonials-info rounded-bottom" style="border: 1px solid #21272E; ">
							
							<div class="testimonials-desc" style="padding:5px 0px;">
								<div class="col-md-9">
									<b><?php echo $address->name; ?></b><br />
									<span><?php echo $address->add_line_1; ?></span><br />
									<span><?php echo $address->add_line_2; ?></span><br />
									<span><?php echo $address->pincode; ?></span>
								</div>
								
								<div class="col-md-3" style="padding-top: 10px; text-align: right;">
								
									<a href="<?php echo site_url(); ?>user/edit_address/<?php echo $address->id; ?>"><button type="button" class="btn-u btn-u-sea-shop btn-u-lg" style="font-size: 12px; padding: 5px 15px;">Edit</button></a>
								
								</div>
							</div>
							
						</div>
						
					</div>
				</div>				
			</div>
			
			<?php } ?>
			
			
			
		</div>
				
	</div>
</div>
</div>