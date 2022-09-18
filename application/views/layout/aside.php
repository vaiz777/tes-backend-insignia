<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
  <!-- Sidebar user panel -->
  <div class="user-panel">
    <div class="pull-left image">
      <img src="<?php echo base_url('asset/dist/img/user2-160x160.jpg') ?>" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p></p>
      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
  </div>
  <!-- search form -->
  <form action="#" method="get" class="sidebar-form">
    <div class="input-group">
      <input type="text" name="q" class="form-control" placeholder="Search...">
      <span class="input-group-btn">
        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
      </span>
    </div>
  </form>
  <!-- /.search form -->
  <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu">
    <li class="header">MAIN NAVIGATION</li>
    <li class="treeview">
    <a href="<?php echo site_url('Admin'); ?>">
        <i class="fa fa-home"></i>
        <span>Home</span>
        <span class="label label-primary pull-right"></span>
      </a>
    </li>

    <li class="treeview">
    <a href="<?php echo site_url('Travel'); ?>">
        <i class="fa fa-pie-chart"></i>
        <span>Travel Package</span>
      </a>
    </li>
   
   <li class="treeview">
    <a href="<?php echo site_url('Customer'); ?>">
        <i class="fa fa-users"></i>
        <span>Customer</span>
        <span class="label label-primary pull-right"></span>
      </a>
    </li>

    <li class="treeview">
    <a href="<?php echo site_url('Order'); ?>">
        <i class="fa fa-th"></i>
        <span>Order</span>
        <span class="label label-primary pull-right"></span>
      </a>
    </li>
    <li class="treeview">
    <a href="<?php echo site_url('ODetail'); ?>">
        <i class="fa fa-book"></i>
        <span>Order Detail</span>
        <span class="label label-primary pull-right"></span>
      </a>
    </li>
  </ul>
</section>

      
</aside>
