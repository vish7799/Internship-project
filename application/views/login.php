<div class="breadcrumbs-v4 img-v1  page_heading_padding" style="background: #eae7e4;">
	<div class="container">
		<span class="page-name">Log In</span>
		<ul class="breadcrumb-v4-in">
			<li><a href="<?php echo site_url(); ?>">Home</a></li>
			<li class="active">Log In</li>
		</ul>
	</div><!--/end container-->
</div>

		<!--=== Login ===-->
		<div class="log-reg-v3 content-md category_product_container" style="padding-bottom:0px;">
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
						<form id="sky-form1" action="<?php echo site_url(); ?>login" method="post" class="log-reg-block sky-form">
							<h2 style="color: #96100f">Log in to your account</h2>
							<?php if(isset($_SESSION['msg']) &&  $_SESSION['msg'] != ""){ ?>
							<p style="text-align:center; font-size:15px; color:green; padding-top:20px;">
								<?php echo $_SESSION['msg']; $_SESSION['msg'] = "";  ?>
								<?php echo form_error('password', '<div style="color:red; text-align:center; font-size:14px;">', '</div>'); ?>
							</p>
							<?php } ?>
							<section class="pd40">
								<label class="input login-input">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user"></i></span>
										<input type="email" placeholder="Email Address" name="email" class="form-control">
									</div>
								</label>
							</section>
							<section style="padding-top:20px;">
								<label class="input login-input no-border-top">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-lock"></i></span>
										<input type="password" placeholder="Password" name="password" class="form-control">
									</div>
								</label>
							</section>
							<div class="row margin-bottom-5" style="padding-top:20px;">
								<div class="col-xs-6">
									<label class="checkbox">
										<input type="checkbox" name="checkbox"/>
										<i></i>
										Remember me
									</label>
								</div>
								<div class="col-xs-6 text-right">
									<a href="#">Forget your Password?</a>
								</div>
							</div>
							<button class="btn-u btn-u-sea-shop btn-block margin-bottom-20" type="submit" style="margin-top:20px;">Log in</button>

							<p class="text-center" style="color:#000;">Don't have account yet? Learn more and <a href="<?php echo site_url(); ?>registration">Registration</a></p>
						</form>

						<div class="margin-bottom-20"></div>
					</div>
				</div><!--/end row-->
			</div><!--/end container-->
		</div>
		<!--=== End Login ===-->
