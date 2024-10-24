<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar" style="background-image: linear-gradient(141deg, #000 0%, #000 51%, #000 100%);">
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">

  
  <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu" data-widget="tree">
	<li class="header" style="color: #fff; font-weight: bold; font-size: 16px;">MAIN NAVIGATION</li>
	
	<li class="<?php if($menu == "Product Category"){ echo "active"; }?> treeview">
		<a href="#">
			<i class="fa fa-tags"></i> <span>Category</span>
			<span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
			</span>
		</a>
		<ul class="treeview-menu">
			<li <?php if($page_name == 'productcategory/index'){?> class="active"<?php }?>><a href="<?php echo base_url();?>admin/productcategory"><i class="fa fa-circle-o"></i> List Category</a></li>
			<li <?php if($page_name == 'productcategory/add_productcategory'){?> class="active"<?php }?>><a href="<?php echo base_url();?>admin/productcategory/add_productcategory"><i class="fa fa-circle-o"></i> Add Category</a></li>
		</ul>
	</li>
	
	<li class="<?php if($menu == "Products"){ echo "active"; }?> treeview">
		<a href="#">
			<i class="fa fa-balance-scale"></i> <span>Products</span>
			<span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
			</span>
		</a>
		<ul class="treeview-menu">
			<li <?php if($page_name == 'products/index'){?> class="active"<?php }?>><a href="<?php echo base_url();?>admin/products"><i class="fa fa-circle-o"></i> List Product</a></li>
			<li <?php if($page_name == 'products/add_product'){?> class="active"<?php }?>><a href="<?php echo base_url();?>admin/products/add_product"><i class="fa fa-circle-o"></i> Add Product</a></li>
		</ul>
	</li>
	
	<li class="<?php if($menu == "Product Enquiry"){ echo "active"; }?> treeview">
		<a href="#">
			<i class="fa fa-balance-scale"></i> <span>Product Enquiry</span>
			<span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
			</span>
		</a>
		<ul class="treeview-menu">
			<li <?php if($page_name == 'productenquiry/index'){?> class="active"<?php }?>><a href="<?php echo base_url();?>admin/productenquiry"><i class="fa fa-circle-o"></i> List Product Enquiry</a></li>
		</ul>
	</li>
	
	<li class="<?php if($menu == "Blogs"){ echo "active"; }?> treeview">
		<a href="#">
			<i class="fa fa-th" aria-hidden="true"></i> <span>Blogs</span>
			<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
		</a>
		<ul class="treeview-menu">
			<li <?php if($page_name == 'blogs/index'){?> class="active"<?php }?>>
				<a href="<?php echo base_url();?>admin/blogs"><i class="fa fa-circle-o"></i> List Blogs</a>
			</li>
			<li <?php if($page_name == 'blogs/add'){?> class="active"<?php }?>>
				<a href="<?php echo base_url();?>admin/blogs/add"><i class="fa fa-circle-o"></i> Add Blog</a>
			</li>
			<li <?php if($page_name == 'blogs/category'){?> class="active"<?php }?>>
				<a href="<?php echo base_url();?>admin/blogs/category"><i class="fa fa-circle-o"></i> List Blog Categories</a>
			</li>
			<li <?php if($page_name == 'blogs/tag'){?> class="active"<?php }?>>
				<a href="<?php echo base_url();?>admin/blogs/tag"><i class="fa fa-circle-o"></i> List Blog Tag</a>
			</li>
			
		</ul>
	</li>
	
	<li class="<?php if($menu == "CMS"){ echo "active"; }?> treeview">
		<a href="#">
			<i class="fa fa-file"></i> <span>CMS</span>
			<span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
			</span>
		</a>
		<ul class="treeview-menu">
			<li <?php if($page_name == 'cms/index'){?> class="active"<?php }?>><a href="<?php echo base_url();?>admin/cms"><i class="fa fa-circle-o"></i> List Pages</a></li>
			<li <?php if($page_name == 'cms/add'){?> class="active"<?php }?>><a href="<?php echo base_url();?>admin/cms/add"><i class="fa fa-circle-o"></i> Add Page</a></li>		
		</ul>
	</li>
	<li class="<?php if($menu == "Testimonials"){ echo "active"; }?> treeview">
		<a href="#">
			<i class="fa fa-plus"></i> <span>Testimonials</span>
			<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
		</a>
		<ul class="treeview-menu">
			<li <?php if($page_name == 'testimonials/index'){?> class="active"<?php }?>>
				<a href="<?php echo base_url();?>admin/testimonials"><i class="fa fa-circle-o"></i> List Testimonials</a>
			</li>
			<li <?php if($page_name == 'testimonials/add'){?> class="active"<?php }?>>
				<a href="<?php echo base_url();?>admin/testimonials/add"><i class="fa fa-circle-o"></i> Add Testimonial</a>
			</li>
		</ul>
	</li>
	
	<li class="<?php if($menu == "FAQ"){ echo "active"; }?> treeview">
		<a href="#">
			<i class="fa fa-question" aria-hidden="true"></i> <span>FAQ</span>
			<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
		</a>
		<ul class="treeview-menu">
			<li <?php if($page_name == 'faq/index'){?> class="active"<?php }?>>
				<a href="<?php echo base_url();?>admin/faq"><i class="fa fa-circle-o"></i> List FAQ</a>
			</li>
			<li <?php if($page_name == 'faq/add'){?> class="active"<?php }?>>
				<a href="<?php echo base_url();?>admin/faq/add"><i class="fa fa-circle-o"></i> Add FAQ</a>
			</li>
		</ul>
	</li>
	
	<li class="<?php if($menu == "Slider"){ echo "active"; }?>">
		<a href="<?php echo base_url();?>admin/slider/index">
			<i class="fa fa-circle-o"></i> <span>Slider Images</span>
		</a>
	</li>
	
	<li class="<?php if($menu == "Media"){ echo "active"; }?>">
		<a href="<?php echo base_url();?>admin/media/index">
			<i class="fa fa-circle-o"></i> <span>Media Images</span>
		</a>
	</li>
	
	
  </ul>
</section>
<!-- /.sidebar -->
</aside