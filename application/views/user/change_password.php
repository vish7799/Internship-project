<div class="breadcrumbs-v4 img-v1  page_heading_padding" style="background: #eae7e4;">
	<div class="container">
		<span class="page-name">My Dashboard</span>
		<ul class="breadcrumb-v4-in">
			<li><a href="<?php echo site_url(); ?>">Home</a></li>
			<li><a href="<?php echo site_url(); ?>user">User</a></li>
			<li class="active">Change Password</li>
		</ul>
	</div>
</div>

<div style="background: url(<?php echo site_url();?>assets/img/web/back_image.png) repeat; ">
<div class="container content">
	<div class="row">
		<div class="col-md-12">
			<span style="color:green; font-weight:bold; font-size:16px;"><?php if(isset($_SESSION['msg'])){ echo $_SESSION['msg']; unset($_SESSION['msg']); }?></span>
		</div>
		
		<?php include('left_menu.php'); ?>
		
		<div class="col-md-9">
			
			<form action="<?php echo site_url(); ?>user/change_password" method="post" id="sky-form3" class="sky-form" novalidate="novalidate" style="box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%); transition: 0.7s;">
				
				<fieldset>
					
						<section>
							<label class="label">New Password</label>
							<label class="input">
								<i class="icon-append fa fa-user"></i>
								<input type="password" name="new_password" value="<?php echo set_value('new_password'); ?>" id="new_password">
								<?php echo form_error('new_password', '<span style="color:red; font-size:11px;" class="help-block form-error">', '</span>'); ?>
							</label>
						</section>
						<section>
							<label class="label">Confirm Password</label>
							<label class="input">
								<i class="icon-append fa fa-envelope-o"></i>
								<input type="password" name="confirm_password" value="<?php echo set_value('confirm_password'); ?>" id="confirm_password">
								<?php echo form_error('confirm_password', '<span style="color:red; font-size:11px;" class="help-block form-error">', '</span>'); ?>
							</label>
						</section>
					
					
					<div class="row">
						<section class="col col-6" style="float: right;">
							<button type="submit" class="button" style="background: #21272E;">Change Password</button>
						</section>
					</div>
					
				</fieldset>

			</form>
			
		</div>
		
		
		
	</div>
</div>
</div>