<div class="breadcrumbs-v3 img-v1 text-center page_heading_padding" style="background: url(<?php echo site_url(); ?>assets/img/testimonails.jpg) no-repeat; background-size: cover;   -ms-background-size: cover;   -o-background-size: cover;   -moz-background-size: cover;   -webkit-background-size: cover;">
	<div class="container content-md">
		<h1 class="page_heading_top">&nbsp;</h1>
	</div>
</div>
		
<div class="container content-sm" style="width: 90%;">
	<div class="row">
		
		<div class="col-md-9">	
			<div class="news-v3 bg-color-white">
				<div class="news-v3-in">
					<?php foreach($testimonails as $testimonail){ ?>
					<div style="padding-bottom: 20px;">
						<p><?php echo $testimonail->description; ?></p>
						<p style="font-weight: bold;"><?php echo $testimonail->name .' - '.$testimonail->post; ?></p>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<?php $this->load->view('right_products.php'); ?>
		</div>
	</div>
</div>
