<header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url();?>admin/dashboard" class="logo" style="background: #EE1A22; color: #fff;">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>CDS</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg" style="font-size: 14px;"><b>Company Discount Shop</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style="background-image: linear-gradient( 141deg, #EE1A22 0%, #EE1A22 51%, #EE1A22 100%);">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs">Welcone Admin</span>
            </a>
            <ul class="dropdown-menu" style="width:335px;">
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo site_url()?>admin/dashboard/settings" class="btn btn-default btn-flat">Settings</a>
                </div>
				<div class="pull-left" style="margin-left:20px;">
                  <a href="<?php echo site_url()?>admin/admin" class="btn btn-default btn-flat">Change Password</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url()?>admin/login/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>