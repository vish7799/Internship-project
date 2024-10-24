<style>
.form-error{
	color: red;
}
</style>
<div class="breadcrumbs-v3 img-v1 text-center page_heading_padding" style="background: url(<?php echo site_url(); ?>assets/img/bg/bulk.jpg) no-repeat;">
	<div class="container">
		<h1 class="page_heading">Bulk Orders & Corporate T-Shirts</h1>
	</div>
</div>


<div class="container content" style="padding-bottom:0px; ">
	<div class="row margin-bottom-30">
		
		
		<h2 style="color: #4255A3; font-weight: bold; text-transform: uppercase; font-size: 20px;">
			Corporate T-shirts & Bulk Order
		</h2>
		
		<p>We also do corporate and bulk t-shirts printing apart from online retail. The following are the products that we do custom t-shirt printing on. We have worked with some of the top MNCs, Institutions and Organizations over the past 3 years to provide some of the best quality corporate merchandises all over India. E-mail us to bulkorder@mastikhor.in or fill below form for quotes, price & time-frame.</p>
		
		<h2 style="color: #4255A3; font-weight: bold; text-transform: uppercase; font-size: 20px;">
			Products & Colors: 
		</h2>
		
		<h2 style="color: #4255A3; font-weight: bold; text-transform: uppercase; font-size: 16px;">
			1. Round Neck t-shirts: 
		</h2>
		<p>For both Men & Women. (*note that Men's is considered Unisex). Colors available: BLACK, BLUE, NAVY, RED, GREY MELANGE and many more.</p>
		
		<h2 style="color: #4255A3; font-weight: bold; text-transform: uppercase; font-size: 16px;">
			2. Collar or Polo t-shirt:
		</h2>
		<p>Colors available: Black, Blue, White, Grey Melange and Many More.</p>
		
		<h2 style="color: #4255A3; font-weight: bold; text-transform: uppercase; font-size: 20px;">
			Minimum Quantity:
		</h2>
		
		<p>The minimum quantity for any kind of custom t-shirt printing is 15 units. </p>
		
		<h2 style="color: #4255A3; font-weight: bold; text-transform: uppercase; font-size: 20px;">
			Cost:
		</h2>
		
		<p>Cost per piece is greatly affected by the print size and number colours in the print. So please provide your design along with your requirements for us to provide a clear estimation.</p>
		
		<h2 style="color: #4255A3; font-weight: bold; text-transform: uppercase; font-size: 20px;">
			Shipping Cost:
		</h2>
		
		<p>For all bulk orders, shipping cost is always free.</p>
		
		<h2 style="color: #4255A3; font-weight: bold; text-transform: uppercase; font-size: 20px;">
			Payment Terms:
		</h2>
		
		<p>An order is considered as CONFIRMED only upon receiving 50% of the payment upfront from the customer. We provide secure online payment gateway option for online payment. NEFT/IMPS to our Bank Account can also be done. Once the products are produced, images will be shared with you for confirmation up on which the remaining 50% of the payment needs to be paid.</p>
		<p>Once 100% of the payment is received from our end we will send your shipment, mostly via FedEX or Bluedart.</p>
		
		<h2 style="color: #4255A3; font-weight: bold; text-transform: uppercase; font-size: 20px;">
			Time frame:
		</h2>
		
		<p>Always get in touch with us to know the availability of products. Although we do try to keep all the products in stock all the time. There are certain times, we could be running low on certain products/colours. We get back to you within a few hours after you submit your enquiry. It will be better if you provide the design to be printed along with your requirements. It makes it easy for us to provide an estimate as soon as possible and proceed to the next step. If the products that you request is readily available in stock, we shall produce it in 5-6 business days (not including Saturday & Sunday). In addition to that, depending on your location, shipping time will be added to it.</p>
		<p>Ideally, please provide us at least10 days for production and shipping. More time the better.</p>
		
		
	</div>
</div>

<div class="container content" style="padding-top:0px; ">
	<div class="row margin-bottom-30">
		<div class="col-md-9 mb-margin-bottom-30" style="padding-left:0px;">
			<h2 style="color: #4255A3; font-weight: bold; text-transform: uppercase; font-size: 20px;">
				Bulk Order Form
			</h2>
			<form action="<?php echo site_url(); ?>bulk_order" method="post" id="sky-form3" class="sky-form sky-changes-3" novalidate="novalidate">
				<fieldset style="padding:25px 0px;">
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
					<?php $categories	=	get_parent_category(); ?>
					<div class="row">
						
						<section class="col col-6">
							<label class="label">Phone</label>
							<label class="input">
								<i class="icon-append fa fa-tag"></i>
								<input type="text" name="phone" id="phone" value="<?php echo set_value('phone')?>">
								<?php echo form_error('phone', '<span style="color:red;" class="help-block form-error">', '</span>'); ?>
							</label>
						</section>
						
						<section class="col col-6">
							<label class="label">Category</label>
							<label class="select">
								<select name="category">
									<option value="" selected="" disabled="">Select Category</option>
									<?php foreach($categories as $category){ ?>
									<option value="<?php echo $category->id; ?>"><?php echo $category->title; ?></option>
									<?php } ?>
									
								</select>
								<i></i>
							</label>
						</section>
						
					</div>

					<div class="row">
						<section class="col col-6">
							<label class="label">Qty</label>
							<label class="input">
								<i class="icon-append fa fa-user"></i>
								<input type="text" name="qty" id="qty" value="<?php echo set_value('qty')?>">
								<?php echo form_error('qty', '<span style="color:red;" class="help-block form-error">', '</span>'); ?>
							</label>
						</section>
						<section class="col col-6">
							<label class="label">Expected Delivery Date</label>
							<label class="input">
								
								<input type="date" name="expected_delivery_date" id="expected_delivery_date" value="<?php echo set_value('expected_delivery_date')?>" min="<?php echo date('Y-m-d', time()); ?>" />
								<?php echo form_error('expected_delivery_date', '<span style="color:red;" class="help-block form-error">', '</span>'); ?>
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
	
		<div class="headline" style="margin: 5px 0 10px 0;"><h2 style="border-bottom:0px; color: #4255A3; font-weight: bold; text-transform: uppercase; font-size:20px;">Customer Service</h2></div>
		<ul class="list-unstyled link-list">
			<li><a href="<?php site_url(); ?>privacy-policy">Privacy Policy</a></li>
			<li><a href="<?php site_url(); ?>return-policy">Return Policy</a></li>
			<li><a href="<?php site_url(); ?>terms-of-service">Terms of Service</a></li>
			<li><a href="<?php site_url(); ?>disclaimer">Disclaimer</a></li>
			<li><a href="<?php site_url(); ?>terms-of-use">Terms of Use</a></li>
			<li><a href="<?php site_url(); ?>">Track Order</a></li>
		</ul>
		
		<div class="headline" style="margin: 5px 0 10px 0;"><h2 style="border-bottom:0px; color: #000;">Company</h2></div>
		<ul class="list-unstyled link-list">
			<li><a href="<?php site_url(); ?>about-us">About Us</a></li>
			<li><a href="<?php site_url(); ?>contact">Contact Us</a></li>
		</ul>
		
		</div>
	</div><!--/row-->
</div>
	