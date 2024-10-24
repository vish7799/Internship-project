<!DOCTYPE html>
<html>
<head>
<?php include("header.php");?> 
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<div class="top-range"></div>
<?php include("header_top.php");?> 

<?php include("left_menu.php");?>  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $page_title; ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?php echo $page_title; ?></li>
      </ol>
    </section>
	<section class="content">	
	
	<?php if(isset($_SESSION['msg'])){ echo $_SESSION['msg']; unset($_SESSION['msg']); }?>
    <!-- Main content -->
    <?php include $page_name . '.php'; ?>
	</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include 'footer_info.php';?>
  <?php //include 'side_bar.php';?>

 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<?php include("footer.php");?>
</body>
</html>
