<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
	<title><?php echo $title; ?></title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="<?php echo $meta_keywords; ?>">
	<meta name="description" content="<?php echo $meta_description; ?>">
	<meta name="author" content="">
	
	<link rel="canonical" href="<?php echo $canonical; ?>" />
	
	<meta property="og:title" content="<?php echo $og_title; ?>">
    <meta property="og:site_name" content="<?php echo $og_site_name; ?>">
    <meta property="og:url" content="<?php echo $og_url; ?>">
    <meta property="og:description" content="<?php echo $og_description; ?>">
    <meta property="og:type" content="<?php echo $og_type; ?>">
    <meta property="og:image" content="<?php echo $og_image; ?>">
	
	<meta name="twitter:card" content="summary_large_image" />
	<meta name="twitter:title" content="<?php echo $og_title; ?>" />
	<meta name="twitter:description" content="<?php echo $og_description; ?>" />
	<meta name="twitter:label1" content="Written by" />
	<meta name="twitter:data1" content="<?php echo $data1; ?>" />
	<meta name="twitter:label2" content="Time to read" />
	<meta name="twitter:data2" content="7 minutes" />
	<meta name="twitter:image" content="<?php echo $og_image; ?>" />

	<!-- Favicon -->
	<link rel="icon" href="<?php echo site_url();?>assets/img/fav.png" type="image/x-icon" />

	<!-- Web Fonts -->
	<link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>

	<!-- CSS Global Compulsory -->
	<link rel="stylesheet" href="<?php echo site_url();?>assets/plugins/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo site_url();?>assets/css/style.css">

	<!-- CSS Header and Footer -->
	<link rel="stylesheet" href="<?php echo site_url();?>assets/css/headers/header-v5.css">
	<link rel="stylesheet" href="<?php echo site_url();?>assets/css/footers/footer-v1.css">

	<!-- CSS Implementing Plugins -->
	<link rel="stylesheet" href="<?php echo site_url();?>assets/plugins/animate.css">
	<link rel="stylesheet" href="<?php echo site_url();?>assets/plugins/line-icons/line-icons.css">
	<link rel="stylesheet" href="<?php echo site_url();?>assets/plugins/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo site_url();?>assets/plugins/parallax-slider/css/parallax-slider.css">
	<link rel="stylesheet" href="<?php echo site_url();?>assets/plugins/fancybox/source/jquery.fancybox.css">
	<link rel="stylesheet" href="<?php echo site_url();?>assets/plugins/owl-carousel/owl-carousel/owl.carousel.css">
	<link rel="stylesheet" href="<?php echo site_url();?>assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css">
	<link rel="stylesheet" href="<?php echo site_url();?>assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css">

	<!-- CSS Theme -->
	<link rel="stylesheet" href="<?php echo site_url();?>assets/css/theme-colors/default.css" id="style_color">
	<link rel="stylesheet" href="<?php echo site_url();?>assets/css/theme-skins/dark.css">
	<link rel="stylesheet" href="<?php echo site_url();?>assets/plugins/ladda-buttons/css/custom-lada-btn.css">
	<link rel="stylesheet" href="<?php echo site_url();?>assets/plugins/hover-effects/css/custom-hover-effects.css">
	<link rel="stylesheet" href="<?php echo site_url();?>assets/plugins/cube-portfolio/cubeportfolio/css/cubeportfolio.min.css">
	<link rel="stylesheet" href="<?php echo site_url();?>assets/plugins/cube-portfolio/cubeportfolio/custom/custom-cubeportfolio.css">
	<link rel="stylesheet" href="<?php echo site_url();?>assets/plugins/revolution-slider/rs-plugin/css/settings.css" type="text/css" media="screen">
	<link rel="stylesheet" href="<?php echo site_url(); ?>assets/plugins/master-slider/masterslider/style/masterslider.css">
	<link rel='stylesheet' href="<?php echo site_url(); ?>assets/plugins/master-slider/masterslider/skins/default/style.css">
	<!-- CSS Customization -->
	<link rel="stylesheet" href="<?php echo site_url();?>assets/css/custom.css">
	<link rel="stylesheet" href="<?php echo site_url();?>assets/css/global.css">
	<link rel="stylesheet" href="<?php echo site_url();?>assets/css/shop.style.css?time=<?php echo time(); ?>">
	<link rel="stylesheet" href="<?php echo site_url();?>assets/css/courses1.style.css">
	<link rel="stylesheet" href="<?php echo site_url();?>assets/css/shiping.style.css">
	<link rel="stylesheet" href="<?php echo site_url();?>assets/css/travel.style.css">

</head>

<body class="header-fixed promo-padding-top">

<div class="icon-bar1 sm_mobile desktop_display">
	<a target="_blank" href="tel:<?php echo get_setting('admin_mobile'); ?>" class="facebook"><i class="fa fa-phone"></i></a> 
	<a target="_blank" href="https://wa.me/<?php echo get_setting('whatsapp'); ?>" class="instragram"><i class="fa fa-whatsapp"></i></a>
</div>	

	<div class="wrapper">
		<!--=== Header v6 ===-->
		<div class="header-v6 header-v5 header-border-bottom header-sticky" >
		
			<div class="topbar-v3" style="background: #ee1a22;">
				<div class="container" style="width: 90%;">
					<div class="row">
						<div class="col-sm-7 col-xs-12">
							<ul class="left-topbar">
								<li><a style="color:#fff;" href="mailto:<?php echo get_setting('admin_email'); ?>"><?php echo get_setting('admin_email'); ?> </a></li>
								<li><a style="color:#fff;" href="tel:<?php echo get_setting('admin_mobile'); ?>" ><?php echo get_setting('admin_mobile'); ?></a></li>					
							</ul>
						</div>
						<div class="col-sm-5 col-xs-12">
							<ul class="list-inline right-topbar pull-right">
								<li><a target="_blank" href="<?php echo get_setting('facebook'); ?>"><i class="fa fa-facebook"></i></a></li>
								<li><a target="_blank" href="<?php echo get_setting('twitter'); ?>"><i class="fa fa-twitter"></i></a></li>
								<li><a target="_blank" href="<?php echo get_setting('instagram'); ?>"><i class="fa fa-instagram"></i></a></li>
								<li><a target="_blank" href="<?php echo get_setting('youtube'); ?>"><i class="fa fa-youtube"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			
			<div class="navbar mega-menu" role="navigation" style="background: #fff;">
				<div class="container" style="width: 90%;">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="menu-container">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse" style="background: #ee1a22; margin-top: 5px; margin-right: 0px;">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar" style="color: #000; background: #fff;"></span>
							<span class="icon-bar" style="color: #000; background: #fff;"></span>
							<span class="icon-bar" style="color: #000; background: #fff;"></span>
						</button>

						<!-- Navbar Brand -->
						<div class="navbar-brand">
							<a href="<?php echo site_url(); ?>">
								<img class="default-logo" src="<?php echo site_url();?>assets/img/logo.png" alt="Logo">
								
							</a>
						</div>
						<!-- ENd Navbar Brand -->
					</div>
					
					<div class="collapse navbar-collapse navbar-responsive-collapse">
						<div class="menu-container header_float">
							<ul class="nav navbar-nav">
								<li class="active"><a href="<?php echo site_url(); ?>" class="custom_a">Home</a></li>
								<li class="dropdown">
									<a href="javascript:void(0);" class="dropdown-toggle custom_a" data-toggle="dropdown">Categories</a>
									<ul class="dropdown-menu">
										<li>
											<?php $categories 		=	getParentCategory(); ?>
											<?php foreach($categories as $category){ ?>
											<a href="<?php echo site_url(); ?>category/<?php echo $category->slug; ?>"><?php echo ucfirst($category->title); ?></a>
											<?php } ?>
										</li>										
										
									</ul>
								</li>
								<li class=""><a href="<?php echo site_url(); ?>about-us" class="custom_a">About Us</a></li>
								<li class=""><a href="<?php echo site_url(); ?>testimonials" class="custom_a">Reviews</a></li>
								<li class=""><a href="<?php echo site_url(); ?>blog" class="custom_a">Blog</a></li>
								<li class=""><a href="<?php echo site_url(); ?>faq" class="custom_a">FAQs</a></li>
								<li class=""><a href="<?php echo site_url(); ?>contact" class="custom_a">Contact Us</a></li>
								
							</ul>
						</div>
					</div><!--/navbar-collapse-->
				</div>
			</div>
			<!-- End Navbar -->
		</div>
		<!--=== End Header v6 ===-->