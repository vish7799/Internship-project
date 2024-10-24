<div class="breadcrumbs-v4 img-v1  page_heading_padding" style="background: #eae7e4;">
	<div class="container">
		<span class="page-name">Check Out</span>
		<ul class="breadcrumb-v4-in">
			<li><a href="<?php echo site_url(); ?>">Home</a></li>
			<li><a href="<?php echo site_url(); ?>products">Product</a></li>
			<li><a href="<?php echo site_url(); ?>products/checkout">Shopping Cart</a></li>
			<li class="active">Billing Info</li>
		</ul>
	</div>
</div>
<div>
	
	<div class="content-md" style="padding-bottom:0px;  padding-top:60px;">
		<div class="container">
			<div class="row">
			<div class="col-md-4 desktop_display" style="color: #fff; background: #96100f; margin-bottom: 20px;">
				<div class="col-md-2 col-xs-2" style="padding-bottom:10px;padding-top:10px;">
				<span class="number" style="font-size: 50px;">1.</span>
				</div>
				<div class="col-md-10" style="padding-bottom:10px;padding-top:10px;">
				<div class="overflow-h">
					<h2 style="color: #fff; text-align:left;">Shopping Cart</h2>
					<p style="color: #fff; text-align:left;">Review &amp; edit your product</p>
				</div>
				</div>
			</div>
			<div class="col-md-4" style="color: #fff; background: #96100f;">
				<div class="col-md-2 col-xs-2" style="padding-bottom:10px;padding-top:10px;">
				<span class="number" style="font-size: 50px;">2.</span>
				</div>
				<div class="col-md-10" style="padding-bottom:10px;padding-top:10px;">
				<div class="overflow-h">
					<h2 style="color: #fff; text-align:left;">Billing info</h2>
					<p style="color: #fff; text-align:left;">Shipping and address information</p>
				</div>
				</div>
			</div>
			</div>
				
		</div>
	</div>


	<form action="<?php echo site_url(); ?>products/billinginfo" method="post">
		<div class="container content-md" style="padding-top:20px;">
			<div class="headline">
				<a href="<?php echo site_url(); ?>products/add_address"><button class="btn-u" type="button" style="float:right;">Add New Address</button></a>
			</div>
			<ul class="row list-row margin-bottom-30">
				<?php foreach($user_address as $address){ ?>
				<li class="col-md-6 md-margin-bottom-30" style="padding-bottom:25px;">
					<div class="content-boxes-v3 block-grid-v1 rounded">
						<input <?php if($address->by_default == 1){ ?>checked<?php } ?> type="radio" id="address<?php echo $address->id; ?>" name="address" value="<?php echo $address->id; ?>">
						<label for="address<?php echo $address->id; ?>">
							<div class="content-boxes-in-v3">
								<h3 style="margin-bottom:10px; color: #96100f;">
									<a href="<?php echo site_url(); ?>products/edit_address/<?php echo $address->id; ?>">
										<i class="fa fa-pencil-square-o" aria-hidden="true" style="color: #96100f;"></i>
									</a>
									<?php echo $address->name; ?>
									<?php if($address->by_default == 1){ ?>
										<small> (Default)</small>
									<?php } ?>
								</h3>
								

								<p style="margin: 0 0 0px; font-size: 14px; font-weight: normal;"><?php echo $address->add_line_1; ?></p>
								<p style="margin: 0 0 0px; font-size: 14px; font-weight: normal;"><?php echo $address->add_line_2; ?></p>
								<p style="margin: 0 0 0px; font-size: 14px; font-weight: normal;"><?php echo $address->pincode; ?></p>
								
							</div>
						</label>
					</div>
				</li>
				<?php } ?>
			</ul>
			<?php echo form_error('address', '<span style="color:red;" class="help-block form-error">', '</span>'); ?>
			<footer>
					<button type="submit" class="btn-u" style="float:right;">Submit</button>
				</footer>
		</div>
	</form>
</div>
