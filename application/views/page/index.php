<div class="breadcrumbs-v3 img-v1 text-center page_heading_padding" style="background: url(<?php echo site_url(); ?>assets/photo/cms/<?php echo $page->image; ?>) no-repeat; background-size: cover;   -ms-background-size: cover;   -o-background-size: cover;   -moz-background-size: cover;   -webkit-background-size: cover;">
	<div class="container content-md">
		<h1 class="page_heading_top">&nbsp;</h1>
	</div>
</div>

<div class="container content-md" style="padding-top: 30px; width: 90%;">
	
	<div class="col-md-9 md-margin-bottom-40">
		<h1 class="page_heading_top"><?php echo $page->title; ?></h1>
		<?php echo $page->description; ?>
	</div>
	
	<div class="col-md-3 md-margin-bottom-40">
		<?php $this->load->view('right_products.php'); ?>
	</div>
</div>
