<div class="breadcrumbs-v4 img-v1  page_heading_padding" style="background: #eae7e4;">
	<div class="container">
		<span class="page-name">My Dashboard</span>
		<ul class="breadcrumb-v4-in">
			<li><a href="<?php echo site_url(); ?>">Home</a></li>
			<li><a href="<?php echo site_url(); ?>user">User</a></li>
			<li class="active">Edit Profile</li>
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
				
				<form action="<?php echo site_url(); ?>user/edit_profile" method="post" id="sky-form3" class="sky-form" novalidate="novalidate" style="box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%); transition: 0.7s;">
					<fieldset>
						<div class="row">
							<section class="col col-6">
								<label class="label">First Name</label>
								<label class="input">
									<i class="icon-append fa fa-user"></i>
									<input type="text" name="firstname" value="<?php echo set_value('firstname', $user->firstname); ?>" id="firstname">
									<?php echo form_error('firstname', '<span style="color:red; font-size:11px;" class="help-block form-error">', '</span>'); ?>
								</label>
							</section>
							<section class="col col-6">
								<label class="label">Last Name</label>
								<label class="input">
									<i class="icon-append fa fa-user"></i>
									<input type="text" name="lastname" value="<?php echo set_value('lastname', $user->lastname); ?>" id="lastname">
									<?php echo form_error('lastname', '<span style="color:red; font-size:11px;" class="help-block form-error">', '</span>'); ?>
								</label>
							</section>
							
						</div>
						
						<div class="row">
							<section class="col col-6">
								<label class="label">E-mail</label>
								<label class="input">
									<i class="icon-append fa fa-envelope-o"></i>
									<input type="email" name="email" value="<?php echo set_value('email', $user->email); ?>" id="email">
									<?php echo form_error('email', '<span style="color:red; font-size:11px;" class="help-block form-error">', '</span>'); ?>
								</label>
							</section>
							<section class="col col-6">
								<label class="label">Mobile Number</label>
								<label class="input">
									<i class="icon-append fa fa-envelope-o"></i>
									<input type="text" name="mobile_number" value="<?php echo set_value('mobile_number', $user->mobile_number); ?>" id="mobile_number">
									<?php echo form_error('mobile_number', '<span style="color:red; font-size:11px;" class="help-block form-error">', '</span>'); ?>
								</label>
							</section>
						</div>
						
						<div class="row">
							<section class="col col-6">
								<label class="label">Date Of Birth</label>
								<label class="input">
									<i class="icon-append fa fa-user"></i>
									<input type="date" name="dob" value="<?php echo set_value('dob', $user->dob); ?>" id="dob">
									<?php echo form_error('dob', '<span style="color:red; font-size:11px;" class="help-block form-error">', '</span>'); ?>
								</label>
							</section>
							<section class="col col-6" style="padding-top:20px;">
								<button type="submit" class="button" style="background: #21272E;">Update Profile</button>
							</section>
						</div>
						
					</fieldset>

				</form>
				
			</div>
		
			
		</div>
	</div>
</div>