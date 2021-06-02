<?php 
  $role_id = $this->session->userdata('role_id');
  if($role_id == 2 || $role_id == null){
    redirect(base_url('customer/dashboard'));
  }
?>  
<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <div class="d-sm-none d-lg-inline-block">Welcome, <?php echo $this->session->userdata('nama')?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="<?php echo base_url('customer/dashboard')?>" class="dropdown-item has-icon text-warning">
                <i class="fas fa-sign-out-alt"></i> View Site
              </a>
              <a href="<?php echo base_url('auth/ganti_password')?>" class="dropdown-item has-icon text-primary">
                <i class="fas fa-lock"></i> Change Password
              </a>
              <a href="<?php echo base_url('auth/logout')?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?php echo base_url('admin/dashboard') ?>">RENTAL CONSOLE</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?php echo base_url('admin/dashboard') ?>">Rental</a>
          </div>
          <ul class="sidebar-menu">
              <li><a class="nav-link" href="<?php echo base_url('admin/dashboard') ?>"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>

              <li><a class="nav-link" href="<?php echo base_url('admin/console') ?>"><i class="fas fa-gamepad"></i> <span>Consoles</span></a></li>

              <li><a class="nav-link" href="<?php echo base_url('admin/category') ?>"><i class="fas fa-grip-horizontal"></i> <span>Category</span></a></li>

              <li><a class="nav-link" href="<?php echo base_url('admin/customer') ?>"><i class="fas fa-users"></i> <span>Customer</span></a></li>

              <li><a class="nav-link" href="<?php echo base_url('admin/order') ?>"><i class="fas fa-random"></i> <span>All Transaction</span></a></li>

              <li><a class="nav-link" href="<?php echo base_url('admin/invoice') ?>"><i class="fas fa-clipboard-list"></i> <span>Report</span></a></li>

            </ul>
        </aside>
      </div>