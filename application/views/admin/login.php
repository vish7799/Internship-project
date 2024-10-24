<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="icon" href="<?php echo site_url();?>assets/img/fav.png" type="image/png" sizes="16x16">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Company Discount Shop - Admin | Log In</title>
 
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="<?php echo base_url();?>/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>/assets/bower_components/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>/assets/bower_components/Ionicons/css/ionicons.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>/assets/dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>/assets/plugins/iCheck/square/blue.css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
	<div class="login-box" style="width:675px;">
		<div class="login-logo">
			<img src="<?php echo site_url(); ?>assets/img/logo-main.png" width="100%"><br />
		</div>
		<div class="login-box-body" style="border: 2px solid #EE1A22;">
			<p class="login-box-msg">Sign in to start your session</p>
			<?php echo form_open('admin/login',array("autocomplete"=>"off"));?>
			<div class="form-group has-feedback <?php if(form_error('username')){ echo 'has-error';}?>">
				<input type="text" name="username" class="form-control" placeholder="Username" style="color: #EE1A22;">
				<span class="glyphicon glyphicon-envelope form-control-feedback" style="color: #EE1A22;"></span>
				<?php echo form_error('username', '<span class="help-block">', '</span>'); ?>
			</div>
	  
			<div class="form-group has-feedback <?php if(form_error('password')){ echo 'has-error';}?>">
				<input type="password" name="password" class="form-control" placeholder="Password" style="color: #EE1A22;">
				<span class="glyphicon glyphicon-lock form-control-feedback" style="color: #EE1A22;"></span>
				<?php echo form_error('password', '<span class="help-block">', '</span>'); ?>
			</div>
			<div class="row">
				<div class="col-xs-8"></div>
				<div class="col-xs-4">
					<button type="submit" class="btn btn-primary btn-block btn-flat" style="background-color:#EE1A22; border: 2px solid #EE1A22;">Sign In</button>
				</div>
			</div>
			</form>
		</div>
	</div>
	<script src="<?php echo base_url();?>/assets/bower_components/jquery/dist/jquery.min.js"></script>
	<script src="<?php echo base_url();?>/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>/assets/plugins/iCheck/icheck.min.js"></script>
	<script>
	  $(function () {
		$('input').iCheck({
		  checkboxClass: 'icheckbox_square-blue',
		  radioClass: 'iradio_square-blue',
		  increaseArea: '20%' // optional
		});
	  });
	</script>
</body>
</html>