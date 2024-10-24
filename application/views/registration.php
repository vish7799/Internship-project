<div class="breadcrumbs-v4 img-v1  page_heading_padding" style="background: #eae7e4;">
	<div class="container">
		<span class="page-name">Registration</span>
		<ul class="breadcrumb-v4-in">
			<li><a href="<?php echo site_url(); ?>">Home</a></li>
			<li class="active">Registration</li>
		</ul>
	</div><!--/end container-->
</div>

<div class="log-reg-v3 content-md margin-bottom-30 category_product_container" style="padding-bottom:0px;">
	<div class="container">
		<div class="row">
			<div class="col-md-6 md-margin-bottom-50 desktop_display">
				<h2 class="welcome-title" style="color: #96100f; font-weight: bold;">Welcome to SREEJA</h2>
				<br>
				<div class="info-block-v2">
					<i class="icon icon-layers" style="color: #96100f"></i>
					<div class="info-block-in">
						<h3 style="color: #96100f;">Fully Customized</h3>
						<p style="color:#000;">Our products are fully customized as per your unique identity and your business vision.</p>
					</div>
				</div>
				<div class="info-block-v2">
					<i class="icon icon-settings" style="color: #96100f"></i>
					<div class="info-block-in">
						<h3 style="color: #96100f;">Latest Trends</h3>
						<p style="color:#000;">We follow the hot-n-sizzling in the world of printing, keeping you ahead in the new trends.</p>
					</div>
				</div>
				<div class="info-block-v2">
					<i class="icon icon-paper-plane" style="color: #96100f"></i>
					<div class="info-block-in">
						<h3 style="color: #96100f;">Best Prices</h3>
						<p style="color:#000;">We deal in wholesale prices, making sure you find the products at the best market price.</p>
					</div>
				</div>
			</div>

			<div class="col-md-6">
				<form id="sky-form4" class="log-reg-block sky-form" method="post" action="<?php echo site_url(); ?>registration">
					<h2 style="color: #96100f">Create New Account</h2>
					<p class="text-center" style="color:#000; padding-bottom:15px;">Already you have an account? <a href="<?php echo site_url(); ?>login">Log In</a></p>
					<div class="login-input reg-input">
						<div class="row">
							<div class="col-sm-6">
								<section>
									<label class="input">
										<input type="text" name="firstname" placeholder="First name" class="form-control" value="<?php echo set_value('firstname')?>" tabindex=1>
										<?php echo form_error('firstname', '<span style="color: red; font-size:12px;" class="help-block form-error">', '</span>'); ?>
									</label>
								</section>
							</div>
							<div class="col-sm-6">
								<section>
									<label class="input">
										<input type="text" name="lastname" placeholder="Last name" class="form-control" value="<?php echo set_value('lastname')?>" tabindex=2>
										<?php echo form_error('lastname', '<span style="color: red; font-size:12px;" class="help-block form-error">', '</span>'); ?>
									</label>
								</section>
							</div>
						</div>
						
						<div class="row">
							<div class="col-sm-6">
								<section>
									<label class="input">
										<input type="email" name="email" placeholder="Email address" class="form-control" value="<?php echo set_value('email')?>" tabindex=3>
										<?php echo form_error('email', '<span style="color: red; font-size:12px;" class="help-block form-error">', '</span>'); ?>
									</label>
								</section>
							</div>
							<div class="col-sm-6">
								<section>
									<label class="input">
										<input type="text" name="mobile_number" placeholder="Mobile Number" class="form-control" value="<?php echo set_value('mobile_number')?>" tabindex=4>
										<?php echo form_error('mobile_number', '<span style="color: red; font-size:12px;" class="help-block form-error">', '</span>'); ?>
									</label>
								</section>
							</div>
						</div>
						
						<section>
							<label class="input">
								<input type="password" name="password" placeholder="Password" id="password" class="form-control" tabindex=5>
								<?php echo form_error('password', '<span style="color: red; font-size:12px;" class="help-block form-error">', '</span>'); ?>
							</label>
						</section>
						<section>
							<label class="input">
								<input type="password" name="passwordConfirm" placeholder="Confirm password" class="form-control" tabindex=6>
								<?php echo form_error('passwordConfirm', '<span style="color: red; font-size:12px;" class="help-block form-error">', '</span>'); ?>
							</label>
						</section>
					</div>

					<label class="checkbox margin-bottom-10">
						<input type="checkbox" name="newsletter" value="1" tabindex=7/>
						<i></i>
						Subscribe to our newsletter to get the latest offers
						<?php echo form_error('newsletter', '<span style="color: red; font-size:12px;" class="help-block form-error">', '</span>'); ?>
					</label>
					<label class="checkbox margin-bottom-20">
						<input type="checkbox" name="terms_conditions" value="1" tabindex=8/>
						<i></i>
						I have read agreed with the <a href="#">terms &amp; conditions</a>
						<?php echo form_error('terms_conditions', '<span style="color: red; font-size:12px;" class="help-block form-error">', '</span>'); ?>
					</label>
					<button class="btn-u btn-u-sea-shop btn-block margin-bottom-20" type="submit">Create Account</button>
				</form>
				
			</div>
		</div><!--/end row-->
	</div><!--/end container-->
</div>