<div class="breadcrumbs-v4 img-v1  page_heading_padding" style="background: #eae7e4;">
	<div class="container">
		<span class="page-name">My Dashboard</span>
		<ul class="breadcrumb-v4-in">
			<li><a href="<?php echo site_url(); ?>">Home</a></li>
			<li><a href="<?php echo site_url(); ?>user">User</a></li>
			<li><a href="<?php echo site_url(); ?>user/address_book">Address Book</a></li>
			<li class="active">Edit Address</li>
		</ul>
	</div>
</div>

<div style="background: url(<?php echo site_url();?>assets/img/web/back_image.png) repeat; ">
<div class="container content">
	<div class="row">
		<?php include('left_menu.php'); ?>
		<div class="col-md-9">
			<form action="<?php echo site_url(); ?>user/edit_address/<?php echo $address_id ?>" method="post" id="sky-form3" class="sky-form" novalidate="novalidate" style="box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%); transition: 0.7s;">
				<fieldset>
					<div class="row">
						<section class="col-md-12">
							<label class="label">Name</label>
							<label class="input">
								<i class="icon-append fa fa-user"></i>
								<input type="text" name="name" value="<?php echo set_value('name', $address->name); ?>" id="name">
								<?php echo form_error('name', '<span style="color:red; font-size:11px;" class="help-block form-error">', '</span>'); ?>
							</label>
						</section>
					</div>
					
					<div class="row">
						<section class="col-md-12">
							<label class="label">Add Line 1</label>
							<label class="input">
								<i class="icon-append fa fa-envelope-o"></i>
								<input type="text" name="add_line_1" value="<?php echo set_value('add_line_1', $address->add_line_1); ?>" id="add_line_1">
								<?php echo form_error('add_line_1', '<span style="color:red; font-size:11px;" class="help-block form-error">', '</span>'); ?>
							</label>
						</section>
					</div>
					
					<div class="row">
						<section class="col-md-12">
							<label class="label">Add Line 2</label>
							<label class="input">
								<i class="icon-append fa fa-envelope-o"></i>
								<input type="text" name="add_line_2" value="<?php echo set_value('add_line_2', $address->add_line_2); ?>" id="add_line_2">
								<?php echo form_error('add_line_2', '<span style="color:red; font-size:11px;" class="help-block form-error">', '</span>'); ?>
							</label>
						</section>
					</div>
					
					<div class="row">
						<section class="col-md-6">
							<label class="label">Pincode</label>
							<label class="input">
								<i class="icon-append fa fa-user"></i>
								<input type="text" name="pincode" value="<?php echo set_value('pincode', $address->pincode); ?>" id="pincode">
								<?php echo form_error('pincode', '<span style="color:red; font-size:11px;" class="help-block form-error">', '</span>'); ?>
							</label>
						</section>
						<section class="col-md-6" style="padding-top:20px;">
							<input type="hidden" name="addressid" value="<?php echo $address->id; ?>" />
							<button type="submit" class="button" style="background: #21272E;">Update Address</button>
						</section>
					</div>
					
				</fieldset>

			</form>
			
		</div>
	
		
	</div>
</div>
</div>