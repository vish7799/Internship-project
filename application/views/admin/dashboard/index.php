<style>
.center {
    text-align: center !important;
}
.padding15 {
    padding: 15px !important;
}
.bold {
    font-weight: bold !important;
}
.d-block {
    box-shadow: 0px 2px 18px -1px rgb(0 0 0 / 20%);
    border-radius: 10px;
    background-color: #fff;
}
.box-center {
    display: flex;
    align-items: center;
    justify-content: center;
}
h1, .h1 {
    font-size: 36px;
	margin-top: 20px;
    margin-bottom: 10px;
	font-weight: bold;
}
</style>

<div class="content" style="text-align: center; padding-bottom: 100px;">
	<img src="<?php echo site_url(); ?>assets/img/logo-main.png" width="40%">
	<h1 style="color: #EE1A22;">Welcome to Admin Panel</h1>
</div>

<div class="row box-center">
	<div class="col-md-3">
		<div class=" padding15 d-block center bold"> 
			<img id="MainContent_Image2" src="<?php echo site_url(); ?>assets/dist/img/admin-items.png">
			<h3 class="bold ">
				<span id="MainContent_lbltotalproducts"><?php echo get_total_active_product(); ?></span> <br>
				<small class="upp bold">  Active Products   </small>
			</h3>
		</div>
	</div>    
	<div class="col-md-3">
		<div class=" padding15 d-block center bold"> 
		<img id="MainContent_Image1" src="<?php echo site_url(); ?>assets/dist/img/admin-users.png">
			<h3 class="bold ">
			  <span id="MainContent_lbltotalsold"> <span id="MainContent_lblcustomer">0</span></span> <br>
				<small class="upp bold">  Customers   </small>
			</h3>
		</div>
	</div>

	<div class="col-md-3">
		<div class=" padding15 d-block center bold"> 
			<img id="MainContent_Image3" src="<?php echo site_url(); ?>assets/dist/img/admin-money.png">
			<h3 class="bold ">
			  <span><span id="MainContent_lbltotalearning">&#8377; 0</span></span> <br>
				<small class="upp bold">  Total Earning   </small>
			</h3>
		</div>
	</div>
	<div class="col-md-3">
		<div class=" padding15 d-block center bold"> 
			<img id="MainContent_Image3" src="<?php echo site_url(); ?>assets/dist/img/admin-money.png">
			<h3 class="bold ">
			  <span><span id="MainContent_lbltotalearning">0</span></span> <br>
				<small class="upp bold">  Total Orders   </small>
			</h3>
		</div>
	</div>

</div>