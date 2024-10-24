<style>
.form-error{
	color: red;
}
</style>
<div class="breadcrumbs-v3 img-v1 text-center page_heading_padding" style="background: url(<?php echo site_url(); ?>assets/img/contact.jpg) no-repeat; background-size: cover;   -ms-background-size: cover;   -o-background-size: cover;   -moz-background-size: cover;   -webkit-background-size: cover;">
	<div class="container content-md">
		<h1 class="page_heading_top">&nbsp;</h1>
	</div>
</div>



<div class="container content">
	<div class="row margin-bottom-30">
		<div class="col-md-9 mb-margin-bottom-30">
			<h2 style="color: #ee1a22; font-weight: bold; text-transform: capitalize; font-size: 30px;">Contact Us</h2>
			<?php if(isset($_SESSION['msg'])){ echo $_SESSION['msg']; unset($_SESSION['msg']); }?>
			<p>Have a question or need assistance? We're here to help! Contact Company DISCOUNT Shop's friendly customer service team for expert assistance with your home appliance needs. Whether you have inquiries about products, orders, or anything else, we're just a message away. Reach out to us via phone, email, or fill out the contact form below, and we'll get back to you promptly. Your satisfaction is our priority!</p>
			<form action="<?php echo site_url(); ?>contact" method="post" class="sky-form sky-changes-3">
				<fieldset>
					<div class="row">
						<section class="col col-6">
							<label class="label">Name</label>
							<label class="input">
								<i class="icon-append fa fa-user"></i>
								<input type="text" name="name" id="name" value="<?php echo set_value('name')?>">
								<?php echo form_error('name', '<span style="color:red;" class="help-block form-error">', '</span>'); ?>
							</label>
						</section>
						<section class="col col-6">
							<label class="label">E-mail</label>
							<label class="input">
								<i class="icon-append fa fa-envelope-o"></i>
								<input type="email" name="email" id="email" value="<?php echo set_value('email')?>">
								<?php echo form_error('email', '<span style="color:red;" class="help-block form-error">', '</span>'); ?>
							</label>
						</section>
					</div>
					
					<div class="row">
						<section class="col col-6">
							<label class="label">Subject</label>
							<label class="input">
								<i class="icon-append fa fa-tag"></i>
								<input type="text" name="subject" id="subject" value="<?php echo set_value('subject')?>">
								<?php echo form_error('subject', '<span style="color:red;" class="help-block form-error">', '</span>'); ?>
							</label>
						</section>
						<section class="col col-6">
							<label class="label">Phone</label>
							<label class="input">
								<i class="icon-append fa fa-tag"></i>
								<input type="text" name="mobile" id="mobile" value="<?php echo set_value('mobile')?>">
								<?php echo form_error('mobile', '<span style="color:red;" class="help-block form-error">', '</span>'); ?>
							</label>
						</section>
					</div>

					<section>
						<label class="label">Message</label>
						<label class="textarea">
							<i class="icon-append fa fa-comment"></i>
							<textarea rows="4" name="message" id="message"><?php echo set_value('message')?></textarea>
							<?php echo form_error('message', '<span style="color:red;" class="help-block form-error">', '</span>'); ?>
						</label>
					</section>

				
				</fieldset>

				<footer>
					<button type="submit" class="btn-u">Send message</button>
				</footer>
			</form>
		</div><!--/col-md-9-->

		<div class="col-md-3">
			<!-- Contacts -->
			<div class="headline"><h2>Contacts</h2></div>
			<ul class="list-unstyled who margin-bottom-30">
				<li><a href="https://www.google.com/search?q=company+discount+shop&rlz=1C1CHBD_enIN946IN946&oq=company+discount+shop&gs_lcrp=EgZjaHJvbWUqDwgAECMYJxjjAhiABBiKBTIPCAAQIxgnGOMCGIAEGIoFMhUIARAuGCcYrwEYxwEYgAQYigUYjgUyBggCEEUYQDIICAMQABgWGB4yCAgEEAAYFhgeMgYIBRBFGDwyBggGEEUYPDIGCAcQRRg8qAIAsAIA&sourceid=chrome&ie=UTF-8" target="_blank"><i class="fa fa-home"></i>a17 ahinsa marg parshwanath colony, Ajmer Rd, Jaipur, Rajasthan 302021</a></li>
				<li><a href="mailto:<?php echo get_setting('admin_email'); ?>?Subject=Hello"><i class="fa fa-envelope"></i><?php echo get_setting('admin_email'); ?></a></li>
				<li><a href="tel:<?php echo get_setting('admin_mobile'); ?>"><i class="fa fa-phone"></i><?php echo get_setting('admin_mobile'); ?></a></li>
			</ul>

			<!-- Business Hours -->
			<div class="headline"><h2>Business Hours</h2></div>
			<ul class="list-unstyled margin-bottom-30">
				<li><strong>Monday-Friday:</strong> 10AM to 8PM</li>
				<li><strong>Saturday:</strong> 10AM to 4PM</li>
				<li><strong>Sunday:</strong> Closed</li>
			</ul>

		</div>

	</div><!--/row-->
</div>
	