<div class="breadcrumbs-v3 img-v1 text-center page_heading_padding" style="background: url(<?php echo site_url(); ?>assets/img/faqs.jpg) no-repeat; background-size: cover;   -ms-background-size: cover;   -o-background-size: cover;   -moz-background-size: cover;   -webkit-background-size: cover;">
	<div class="container content-md">
		<h1 class="page_heading_top">&nbsp;</h1>
	</div>
</div>
		
<section id="faq">
	<div class="faq" id="">
		<div class="container content-md" style="width: 90%;">			
			<div class="row">
				<!-- Tabs -->
				<div class="col-md-9 ">
					<div class="faq-tab">
						<div id="iguru_dlh_614c8b02c818e" class="iguru_module_double_headings aleft ">
							<div class="dlh_subtitle" >
								<span class="dlh_subtitle_line">FAQ</span>
							</div>
							<div class="dlh_title">
								<div class="dlh_title_mobile">
									<span style="color: #000;">Know about Company DISCOUNT Shop</span>
								</div>
							</div>
						</div>
						<br />
						<div class="panel-group acc-v1 plus-toggle " id="accordion-1">
							<?php foreach($faqs as $key=>$faq){ ?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a class="accordion-toggle <?php if($key != '0'){ ?>collapsed<?php } ?>" data-toggle="collapse" data-parent="#accordion-1" href="#collapse-<?php echo $faq->id; ?>">
											<?php echo $faq->title; ?>
										</a>
									</h4>
								</div>
								<div id="collapse-<?php echo $faq->id; ?>" class="panel-collapse collapse <?php if($key == '0'){ ?>in<?php } ?> ">
									<div class="panel-body">
										<?php echo $faq->description; ?>
									</div>
								</div>
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
	</div>
</section>
<!-- FAQ Frequently Asked Questions -->	