<?php 
	include("header.php");
	
	if(isset($menu) && $menu == "Home"){
		include("home_welcome.php");
	}else{ 
		
		include $page_name . '.php';
	}
	
	include("footer.php");?> 