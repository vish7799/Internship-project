<!--=== Footer Version 1 ===-->
		<div class="footer-v1" style="background: #3184c6;">
			
			<div class="footer footer_background">
				<div class="container" style="width: 90%">
					<div class="row">
						<!-- About -->
						<?php $footer_about				=	get_cmspage_by_id('3') ?>
						<div class="col-md-3 md-margin-bottom-40">
							<div class="headline" style="margin: 10px 0;"><h2>About</h2></div>
							<p style="line-height: 1.5; font-size: 15px; text-align: justify;"><?php echo $footer_about->description; ?></p>
						</div>
						<div class="col-md-3 md-margin-bottom-40">
							<div class="headline" style="margin: 10px 0;"><h2>Category</h2></div>
							<ul class="list-unstyled link-list">
								<?php $header_categories 					=	getParentCategory(); ?>
								<?php foreach($header_categories as $header_category){ ?>
								<li><i class="fa fa-arrow-circle-right" style="color: #fff; float: left;" aria-hidden="true"></i> 
									<a href="<?php echo site_url(); ?>category/<?php echo $header_category->slug; ?>" style="padding-left: 10px;"><?php echo $header_category->title; ?></a>
								</li>
								<?php } ?>	
							</ul>
						</div>
						
						<div class="col-md-3 md-margin-bottom-40">
							<div class="headline" style="margin: 10px 0;"><h2>Quick Links</h2></div>
							<ul class="list-unstyled link-list">
								<li>
									<i class="fa fa-arrow-circle-right" style="color: #fff; float: left;" aria-hidden="true"></i> 
									<a href="<?php echo site_url(); ?>about-us" style="padding-left: 10px;">About</a>
								</li>
								<li>
									<i class="fa fa-arrow-circle-right" style="color: #fff; float: left;" aria-hidden="true"></i> 
									<a href="<?php echo site_url(); ?>testimonials" style="padding-left: 10px;">Reviews</a>
								</li>
								<li>
									<i class="fa fa-arrow-circle-right" style="color: #fff; float: left;" aria-hidden="true"></i> 
									<a href="<?php echo site_url(); ?>blog" style="padding-left: 10px;">Blog</a>
								</li>
								<li>
									<i class="fa fa-arrow-circle-right" style="color: #fff; float: left;" aria-hidden="true"></i> 
									<a href="<?php echo site_url(); ?>faq" style="padding-left: 10px;">FAQ</a>
								</li>
								<li>
									<i class="fa fa-arrow-circle-right" style="color: #fff; float: left;" aria-hidden="true"></i> 
									<a href="<?php echo site_url(); ?>contact" style="padding-left: 10px;">Contact Us</a>
								</li>
								
							</ul>
						</div>
						<div class="col-md-3 map-img md-margin-bottom-40">
							<div class="headline"><h2>Contact Us</h2></div>
							<address class="md-margin-bottom-40">
								Company DISCOUNT Shop<br />
								a17 ahinsa marg parshwanath colony,<br />Ajmer Rd, Jaipur,<br />Rajasthan 302021 <br>
								Phone: <?php echo get_setting('admin_mobile'); ?> <br>
								Email: <a href="mailto:<?php echo get_setting('admin_email'); ?>" class="" style="color: #fff;"><?php echo get_setting('admin_email'); ?></a>
							</address>
						</div>
					</div>
				</div>
			</div><!--/footer-->

			<div class="copyright" style="background: #f2595e;">
				<div class="container" style="width: 90%">
					<div class="row">
						<div class="col-md-8">
							<p>
								<a href="<?php echo site_url(); ?>privacy-policy" style="color: #fff;">Privacy Policy</a> | <a href="<?php echo site_url(); ?>terms-and-conditions" style="color: #fff;">Terms & Conditions</a> | 
								© 2018-<?php echo date('Y', time()); ?> Managed by <a href="https://adinfoworld.com/" target="_blank" style="color:#fff;">AD Infoworld</a> | All rights reserved.
							</p>
						</div>

						<!-- Social Links -->
						<div class="col-md-4">
							<ul class="footer-socials list-inline">
								<li>
									<a target="_blank" href="<?php echo get_setting('facebook'); ?>" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook" >
										<i class="fa fa-facebook" style="color: #fff;"></i>
									</a>
								</li>
								<li>
									<a target="_blank" href="<?php echo get_setting('instagram'); ?>" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="instagram">
										<i class="fa fa-instagram" style="color: #fff;"></i>
									</a>
								</li>
								
								<li>
									<a target="_blank" href="<?php echo get_setting('youtube'); ?>" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Youtube">
										<i class="fa fa-youtube" style="color: #fff;"></i>
									</a>
								</li>
							</ul>
						</div>
						<!-- End Social Links -->
					</div>
				</div>
			</div><!--/copyright-->
		</div>
		<!--=== End Footer Version 1 ===-->
	</div><!--/wrapper-->

	<a href="<?php echo site_url(); ?>enquiry" class="desktop_display"><div class="appointments"><p style="writing-mode: vertical-rl; color:#fff;" >Quick Enquiry</p></div></a>
	
	<!-- JS Global Compulsory -->
	<script src="<?php echo site_url();?>assets/plugins/jquery/jquery.min.js"></script>
	<script src="<?php echo site_url();?>assets/plugins/jquery/jquery-migrate.min.js"></script>
	<script src="<?php echo site_url();?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!-- JS Implementing Plugins -->
	<script src="<?php echo site_url();?>assets/plugins/back-to-top.js"></script>
	<script src="<?php echo site_url();?>assets/plugins/smoothScroll.js"></script>
	<script src="<?php echo site_url();?>assets/plugins/backstretch/backstretch-ini.js"></script>
	<script src="<?php echo site_url();?>assets/plugins/wow-animations/js/wow.min.js"></script>
	<script src="<?php echo site_url();?>assets/plugins/jquery.parallax.js"></script>
	<script src="<?php echo site_url();?>assets/plugins/fancybox/source/jquery.fancybox.pack.js"></script>
	<script src="<?php echo site_url();?>assets/plugins/owl-carousel/owl-carousel/owl.carousel.js"></script>
	<script type="text/javascript" src="<?php echo site_url();?>assets/plugins/revolution-slider/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script type="text/javascript" src="<?php echo site_url();?>assets/plugins/revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script type="text/javascript" src="<?php echo site_url();?>assets/plugins/counter/waypoints.min.js"></script>
	<script type="text/javascript" src="<?php echo site_url();?>assets/plugins/counter/jquery.counterup.min.js"></script>
	<script src="<?php echo site_url();?>assets/plugins/ladda-buttons/js/ladda.min.js"></script>
	<script src="<?php echo site_url();?>assets/plugins/sky-forms-pro/skyforms/js/jquery.validate.min.js"></script>
	<script src="<?php echo site_url();?>assets/plugins/sky-forms-pro/skyforms/js/jquery.maskedinput.min.js"></script>
	<script src="<?php echo site_url();?>assets/plugins/sky-forms-pro/skyforms/js/jquery-ui.min.js"></script>
	<script src="<?php echo site_url();?>assets/plugins/sky-forms-pro/skyforms/js/jquery.form.min.js"></script>
	<script src="<?php echo site_url();?>assets/plugins/cube-portfolio/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
	<!-- Master Slider -->
	<script src="<?php echo site_url(); ?>assets/plugins/master-slider/masterslider/masterslider.min.js"></script>
	<script src="<?php echo site_url(); ?>assets/plugins/master-slider/masterslider/jquery.easing.min.js"></script>
	
	<!-- JS Customization -->
	<script src="<?php echo site_url();?>assets/js/custom.js"></script>
	<!-- JS Page Level -->
	<script src="<?php echo site_url();?>assets/js/app.js"></script>
	<script src="<?php echo site_url();?>assets/js/plugins/fancy-box.js"></script>
	<script src="<?php echo site_url();?>assets/js/plugins/owl-carousel.js"></script>
	<script type="text/javascript" src="<?php echo site_url();?>assets/js/plugins/revolution-slider.js"></script>
	<script src="<?php echo site_url(); ?>assets/js/plugins/master-slider.js"></script>
	<script src="<?php echo site_url();?>assets/js/plugins/style-switcher.js"></script>
	<script src="<?php echo site_url();?>assets/plugins/youtube-player/jquery.mb.YTPlayer-ini.js"></script>
	<script type="text/javascript" src="<?php echo site_url();?>assets/js/plugins/style-switcher.js"></script>
	<script type="text/javascript" src="<?php echo site_url();?>assets/js/plugins/ladda-buttons.js"></script>
	<script type="text/javascript" src="<?php echo site_url();?>assets/js/plugins/cube-portfolio/cube-portfolio-3.js"></script>
	<script type="text/javascript" src="<?php echo site_url();?>assets/js/forms/reg.js"></script>
	<script type="text/javascript" src="<?php echo site_url();?>assets/js/forms/login.js"></script>
	<script type="text/javascript" src="<?php echo site_url();?>assets/js/forms/contact.js"></script>
	<script type="text/javascript" src="<?php echo site_url();?>assets/js/forms/comment.js"></script>
	

	<script type="text/javascript" src="<?php echo site_url();?>assets/js/sticky-sidebar.js"></script>
	
	<!-- ABOUT US -->
	<script type="text/javascript" src="<?php echo site_url();?>assets/js/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
	
	
<div id="myModal" class="modal" >
	<div class="modal-content popupback">
		<div class="row">
			<div class="col-md-12 "><span class="close" id="myBtn" style="float:right;"><img src="<?php echo site_url(); ?>assets/img/web/cross.png"  style="width: 100%;"></span></div>
			
			
			<div class="col-md-12">
			<div class="heading" style="margin-bottom: 0px;">
				<h2 class="" style="font-size: 26px; line-height: 1;">Enquiry Now</h2>
			</div>
			<form action="enquiry" method="post" id="" class="sky-form sky-changes-3" style="box-shadow: 0 0 20px rgba(0,0,0,.3); margin: 30px;">
				<fieldset>
					<div class="row">
						<section class="col col-6">
							<label class="label">Name</label>
							<label class="input">
								<i class="icon-append fa fa-user"></i>
								<input type="text" name="name" id="name" required>
								<?php echo form_error('name', '<span style="color:red;" class="help-block form-error">', '</span>'); ?>
							</label>
						</section>
						<section class="col col-6">
							<label class="label">E-mail</label>
							<label class="input">
								<i class="icon-append fa fa-envelope-o"></i>
								<input type="email" name="email" id="email" required>
								<?php echo form_error('email', '<span style="color:red;" class="help-block form-error">', '</span>'); ?>
							</label>
						</section>
					</div>
					
					<div class="row">
						
						<section class="col col-6">
							<label class="label">Mobile Number</label>
							<label class="input">
								<i class="icon-append fa fa-phone"></i>
								<input type="text" name="mobile" id="mobile" required>
								<?php echo form_error('mobile', '<span style="color:red;" class="help-block form-error">', '</span>'); ?>
							</label>
						</section>
						
						<section class="col col-6">
							<label class="label">Travel City</label>
							<label class="input">
								<i class="icon-append fa fa-tag"></i>
								<input type="text" name="travel_city" id="travel_city" required>
								<?php echo form_error('travel_city', '<span style="color:red;" class="help-block form-error">', '</span>'); ?>
							</label>
						</section>
						
					</div>
					
					<div class="row">
						
						<section class="col col-6">
							<label class="label">Travel Date</label>
							<label class="input">
								<input type="date" name="travel_date" id="travel_date" required>
								<?php echo form_error('travel_date', '<span style="color:red;" class="help-block form-error">', '</span>'); ?>
							</label>
						</section>
						
						<section class="col col-6">
							<label class="label">Traveller Count</label>
							<label class="input">
								<i class="icon-append fa fa-tag"></i>
								<input type="text" name="packs" id="packs" required>
								<?php echo form_error('packs', '<span style="color:red;" class="help-block form-error">', '</span>'); ?>
							</label>
						</section>
						
					</div>

					
					<section>
						<label class="label">Message</label>
						<label class="textarea">
							<i class="icon-append fa fa-comment"></i>
							<textarea rows="4" name="message" id="message" required></textarea>
							<?php echo form_error('message', '<span style="color:red;" class="help-block form-error">', '</span>'); ?>
						</label>
					</section>
				</fieldset>

				<footer style="background: transparent; text-align: right;">
					<button type="submit" class="btn-u">Send Enquiry</button>
				</footer>

			</form>
		</div>
			
			
			
			
		</div>
	</div>
</div>
	
<script>
$(document).ready(function(){
localStorage.setItem('popState','shownlive');
   if(localStorage.getItem('popState') == 'shownlive'){
	   setTimeout(function(){
	   modal.style.display = "block";
	   },8000000000000000); // 5000 to load it after 5 seconds from page load
	   localStorage.setItem('popState','shownlive1');
	}  
});
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {

  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>	



	
<script type="text/javascript">
  $(document).ready(function() {
    $('.department').on('change', function() {
		
      var departmentId = $(this).val();
      var type = $(this).attr('dell_formtype');
          if(departmentId != ''){
              getDoctor(departmentId, type);
          } else {
             $('#doctor').html('<option value="">No Doctor</option>');
          }
    });
	
	function ajaxCall() {
          this.send = function(data, url, method, success, type) {
            type = type||'json';
              var successRes = function(data) {
                  success(data);
              };
              $.ajax({
                  url: url,
                  type: method,
                  data: data,
                  success: successRes,
                  timeout: 60000
              });
            }
    }

  function getDoctor(departmentId, type) {
	  
    var call = new ajaxCall();
    var url = '<?php echo site_url(); ?>'+'/appointments/getDoctor';
    var data = {departmentId:departmentId};
	
    var method = 'POST';
    call.send(data, url, method, function(data) {
      if(data) {
        if(type == 1) {
          $('.null_doctor').remove();
          $('#doctor').html(data);
        }
        
        if(type == 2) {
          $('#edit_doctor').html(data);
        }
      }
    });
  }

  });
</script>	

	
	<script type="text/javascript">
		jQuery(document).ready(function() {
			App.init();
			new WOW().init();
			App.initParallaxBg();
			FancyBox.initFancybox();
			OwlCarousel.initOwlCarousel();
			RegForm.initRegForm();
			LoginForm.initLoginForm();
			ContactForm.initContactForm();
			CommentForm.initCommentForm();
			RevolutionSlider.initRSfullWidth();
			App.initCounter();
			StyleSwitcher.initStyleSwitcher();
			MasterSliderShowcase2.initMasterSliderShowcase2();
		});
	</script>
	
	
	
<!--[if lt IE 9]>
	<script src="assets/plugins/respond.js"></script>
	<script src="assets/plugins/html5shiv.js"></script>
	<script src="assets/plugins/placeholder-IE-fixes.js"></script>
	<![endif]-->
	
<script type="text/javascript">
  $(document).ready(function() {
    $('.speciality').on('change', function() {
		
      var specialityId = $(this).val();
      var type = $(this).attr('dell_formtype');
          if(specialityId != ''){
			  
              getDoctor(specialityId, type);
          } else {
             $('#doctor').html('<option value="">No Doctor</option>');
          }
    });
	
	$('.doctor').on('change', function() {
		
      var doctorId = $(this).val();
      var type = $(this).attr('dell_formtype');
          if(doctorId != ''){
              getOpd(doctorId, type);
          } else {
             $('#opdtiming').html('No Timing');
          }
    })

    
    function ajaxCall() {
          this.send = function(data, url, method, success, type) {
            type = type||'json';
              var successRes = function(data) {
                  success(data);
              };
              $.ajax({
                  url: url,
                  type: method,
                  data: data,
                  success: successRes,
                  timeout: 60000
              });
            }
    }

  function getDoctor(specialityId, type) {
	  
    var call = new ajaxCall();
    var url = '<?php echo site_url(); ?>'+'/appointments/getDoctor';
    var data = {specialityId:specialityId};
	
    var method = 'POST';
    call.send(data, url, method, function(data) {
      if(data) {
        if(type == 1) {
          $('.null_doctor').remove();
          $('#doctor').html(data);
        }
        
        if(type == 2) {
          $('#edit_doctor').html(data);
        }
      }
    });
  }
  
  function getOpd(doctorId, type) {
      var call = new ajaxCall();
      var url = '<?php echo site_url(); ?>'+'/opdtiming/getOpd';
      var data = {doctorId:doctorId};
      var method = 'POST';
      call.send(data, url, method, function(data) {
        if(data) {
			
          if(type == 1) {
            $('#opdtiming').html(data);
          }

          if(type == 2) {
            $('#edit_opd').html(data);
          }
         
        }
      });
    }

  });
</script>	


 <script>
	
/* ==========================================================================
   Alumni
   ========================================================================== */
function activateAlumuni(ele) {
  var e = $(ele).data("textquote");
  $("#section-quote .container-pe-quote .pp-quote2").removeClass("active"),
  $(ele).addClass("active"), $("#section-quote .container-quote").removeClass("carousel-on"),
  $("#section-quote .container-quote .quote.show").removeClass("show").addClass("hide-bottom"),
  $("." + e).removeClass("hide-bottom hide-top").addClass("show")
}

$(window).on("load", function() {
    setTimeout(function() {

        $window = $(window);
        var f = $window.height()
        $(document).on('click','#section-quote .container-pe-quote .pp-quote2',function() {
           activateAlumuni(this);
        })
	})
   setInterval(function () {
            var maxVal= $("#section-quote .container-pe-quote .pp-quote2").length;
            var randomVal = Math.floor((Math.random() * maxVal)+1);
            var count2 = 1;
			
            $('.pp-quote2').each( function(){
                var obj = $(this);
                if(count2==randomVal){
                var dataRR = obj.attr('data-textquote');
                activateAlumuni($(".pp-quote2[data-textquote="+dataRR+"]"));
                }
                count2++;
            });
       },5000);

});


</script>
<script type="text/javascript">

		var a = new StickySidebar('#sticky-sidebar-demo', {
			topSpacing: 100,
			containerSelector: '.container',
			innerWrapperSelector: '.sidebar__inner'
		});
	</script>
</body>
</html>
