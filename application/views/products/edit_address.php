<div class="breadcrumbs-v4 img-v1  page_heading_padding" style="background: url(<?php echo site_url(); ?>assets/img/web/page_header_back.jpg) no-repeat;">
	<div class="container">
		<span class="page-name">Check Out</span>
		<ul class="breadcrumb-v4-in">
			<li><a href="<?php echo site_url(); ?>">Home</a></li>
			<li><a href="<?php echo site_url(); ?>products">Product</a></li>
			<li><a href="<?php echo site_url(); ?>products/checkout">Shopping Cart</a></li>
			<li class="active">Edit Address</li>
		</ul>
	</div>
</div>

<div class="container content-md" style="padding:20px 0 0 0;">
	<div class="row margin-bottom-40">
		<div class="col-md-12 mb-margin-bottom-30">
			<form action="<?php echo site_url(); ?>products/edit_address/<?php echo $address->id; ?>" method="post" id="sky-form3" class="sky-form sky-changes-3" enctype="multipart/form-data" style="box-shadow: 0 0 5px #863A33;">
				
				<fieldset>
					
					<section class="col-md-12">
						<label class="label">Name</label>
						<label class="input">
							<i class="icon-append fa fa-tag"></i>
							<input type="text" name="name" id="name" placeholder="Name" value="<?php echo set_value('name', $address->name)?>">
							<?php echo form_error('name', '<span style="color:red;" class="help-block form-error">', '</span>'); ?>
						</label>
					</section>
					
					<section class="col-md-6">
						<label class="label">Address Line 1</label>
						<label class="input">
							<i class="icon-append fa fa-tag"></i>
							<input type="text" name="add_line_1" id="add_line_1" placeholder="Address Line 1" value="<?php echo set_value('add_line_1', $address->add_line_1)?>">
							<?php echo form_error('add_line_1', '<span style="color:red;" class="help-block form-error">', '</span>'); ?>
						</label>
					</section>
					
					<section class="col-md-6">
						<label class="label">Address Line 2</label>
						<label class="input">
							<i class="icon-append fa fa-tag"></i>
							<input type="text" name="add_line_2" id="add_line_2" placeholder="Address Line 2" value="<?php echo set_value('add_line_2', $address->add_line_2)?>">
							<?php echo form_error('add_line_2', '<span style="color:red;" class="help-block form-error">', '</span>'); ?>
						</label>
					</section>

					
					
					<section class="col-md-6">
						<label class="label">Pincode</label>
						<label class="input">
							<i class="icon-append fa fa-tag"></i>
							<input type="text" name="pincode" id="pincode" placeholder="Pincode" value="<?php echo set_value('pincode', $address->pincode)?>">
							<?php echo form_error('pincode', '<span style="color:red;" class="help-block form-error">', '</span>'); ?>
						</label>
					</section>
				</fieldset>

				<footer>
					<button type="submit" class="btn-u">Submit</button>
				</footer>

				<div class="message">
					<i class="rounded-x fa fa-check"></i>
					<p>Your message was successfully sent!</p>
				</div>
			</form>
		</div>
	</div>
</div>