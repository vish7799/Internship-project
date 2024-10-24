
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url();?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>

<script src="<?php echo base_url();?>assets/dist/js/multiselect.js"></script>

<script src="<?php echo base_url();?>assets/dist/js/jquery.form-validator.min.js"></script>

<script src="<?php echo base_url();?>assets/dist/js/custom.js"></script>


<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
	$.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url();?>assets/bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url();?>assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url();?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url();?>assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url();?>assets/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url();?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url();?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) 
<script src="<?php echo base_url();?>assets/dist/js/pages/dashboard.js"></script>
-->
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/dist/js/demo.js"></script>

<script src="<?php echo base_url();?>assets/plugins/iCheck/icheck.min.js"></script>

<script src="<?php echo base_url();?>assets/bower_components/ckeditor/ckeditor.js"></script>

<script>
$(document).ready(function() {
    setInterval(timestamp, 1000);
});

function timestamp() {
    $.ajax({
        url: '<?php echo site_url();?>admin/dashboard/show_date_time',
        success: function(data) {
            $('#timestamp').html(data);
        },
    });
}
</script>
<?php if($menu != "Slider" && $menu != "Admin" && $menu != "Dashboard"){ ?>
<script>
  $(function () {
    CKEDITOR.replace('page_editor')
    $('.textarea').wysihtml5()
  })
</script>
<?php }?>