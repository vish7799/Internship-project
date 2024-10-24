<div class="col-md-3">
	<ul class="list-group sidebar-nav-v1" id="sidebar-nav">
		<li class="list-group-item <?php if($menu == 'User Order'){ ?>active<?php } ?>" style="border: 1px solid #96100f;">
			<a href="<?php echo site_url();?>user/orders">Orders</a>
		</li>
		<li class="list-group-item <?php if($menu == 'User Wishlist'){ ?>active<?php } ?>" style="border: 1px solid #96100f;">
			<a href="<?php echo site_url();?>user/wishlist">Wishlist</a>
		</li>
		<li class="list-group-item <?php if($menu == 'User Address Book'){ ?>active<?php } ?>" style="border: 1px solid #96100f;">
			<a href="<?php echo site_url();?>user/address_book">Address Book</a>
		</li>
		<li class="list-group-item <?php if($menu == 'User Edit Profile'){ ?>active<?php } ?>" style="border: 1px solid #96100f;">
			<a href="<?php echo site_url();?>user/edit_profile">Edit Profile</a>
		</li>
		<li class="list-group-item <?php if($menu == 'User Change Password'){ ?>active<?php } ?>" style="border: 1px solid #96100f;">
			<a href="<?php echo site_url();?>user/change_password">Change Password</a>
		</li>
		<li class="list-group-item " style="border: 1px solid #96100f;">
			<a href="<?php echo site_url();?>user/logout">Logout</a>
		</li>
	</ul>
</div>