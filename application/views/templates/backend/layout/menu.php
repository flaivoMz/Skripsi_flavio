
<!-- Page Wrapper -->
<div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon">
      <i class="fas fa-road"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Anter#Anter</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item <?= $this->uri->segment(2)=="dashboard" ? "active" : "" ?>">
    <a class="nav-link" href="<?= base_url('admin/dashboard') ?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Transactions
  </div>
  <li class="nav-item <?= $this->uri->segment(2)=="orders" ? "active" : "" ?>">
    <a class="nav-link" href="<?= base_url('admin/orders') ?>">
      <i class="fas fa-fw fa-box"></i>
      <span>Orders</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="charts.html">
      <i class="fas fa-fw fa-motorcycle"></i>
      <span>Delivery</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Data Master
  </div>

  <!-- Nav Item - Charts -->
  <li class="nav-item <?= $this->uri->segment(2)=="drivers" ? "active" : "" ?>">
    <a class="nav-link" href="<?= base_url('admin/drivers') ?>">
      <i class="fas fa-fw fa-biking"></i>
      <span>Driver</span></a>
  </li>

  <!-- Nav Item - Tables -->
  <li class="nav-item <?= $this->uri->segment(2)=="customers" ? "active" : "" ?>">
    <a class="nav-link" href="<?= base_url('admin/customers') ?>">
      <i class="fas fa-fw fa-users"></i>
      <span>Customer</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="tables.html">
      <i class="fas fa-fw fa-money-check-alt"></i>
      <span>Cost</span></a>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Report
  </div>

  <!-- Nav Item - Charts -->
  <li class="nav-item">
    <a class="nav-link" href="charts.html">
      <i class="fas fa-fw fa-file-excel"></i>
      <span>Generate Report</span></a>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->