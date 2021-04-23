<?php
session_start();
if(!isset($_SESSION['stampusername'])){

  header('Location:login.php');
}
?> 
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>VegMart Admin Pannel</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
   <!-- SweetAlert2 -->
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
 <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <style>
    .card-body table td a
    {
    font-size: 14px;
    font-weight: 600;
    text-transform: uppercase;
    padding: 3px 7px;
    color: #fff;
    background-color: green;
    text-decoration: none;
    border-radius: 3px;
   }
   .card-body table td a:nth-child(2)
  {
    background-color: #e74c3c;
    margin: 0 0 0 5px;
  }
  
</style>
  <!--<link rel="stylesheet" href="style.css"> -->
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">VegMart</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">

      <!--<div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        </div>-->

        <div class="info">
          <span class="d-block text-white" style="font-size:25px">Username:<b><?php echo$_SESSION['stampusername']; ?></b></span>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="dashboard.php"class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
        <!--  User master -->  
        <li class="nav-item">
            <a href="usermasterlist.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Admin Master List
              </p>
            </a>
          </li>
        <!--  Delivery boy -->
          <li class="nav-item">
            <a href="deliveryboymaster.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Delivery Boy List
              </p>
            </a>
          </li>
        <!-- Item master -->
          <li class="nav-item has-treeview">
            <a href="itemmasterlist.php" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
               <p>
                Item Master List
               </p>
            </a>
          </li>
         <!-- Supplier master list -->
          <li class="nav-item has-treeview">
            <a href="suppliermasterlist.php" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
               <p>
                Supplier Master List
               </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="purchasemasterlist.php" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
               <p>
                Order Master List
               </p>
            </a>
       
          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"> </i>
              <p>
                  Logout
              </p>
            </a>
          </li>
		  
		
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

