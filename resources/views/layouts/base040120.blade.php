<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Euro Home Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-wysiwyg/0.3.3/bootstrap3-wysihtml5.min.css">
<style type="text/css">
span {
  color: #313132;
}
.fa {
  color: #313132;
}
</style>
<!-- END -->
 
<link rel="stylesheet" href="{{ asset('css/admin.min.css') }}">
 
</head>

<body class="hold-transition skin-black-light sidebar-mini">
<div class="wrapper">

  <header class="main-header"style="height: 60px; background: #A9BBDF;">
    <!-- Logo -->
    <a href="{{ route('dashboard.home')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="{{ asset('img/footer_logo.png')}}" class="img-circle" alt="User Image"><b>Euro</b>Admin</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" >
      <!-- Sidebar toggle button-->
      <a href="#" style="border-right: 0;" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav" style="display: inline;">
          <!-- Messages: style can be found in dropdown.less-->
          
           
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu" style="display: inline;">
            <a href="#" class="dropdown-toggle">
            @if(Auth::check())
              <img src="{{ asset('img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
              <span class="hidden-xs">              
                {{ auth()->user()->name }} Lastman       
            @else
            <img src="{{ asset('img/guest.jpg')}}" class="user-image" alt="User Image">
              <span class="hidden-xs"> 
                Guest User
            @endif
           </span>
            </a>           
          </li>
        
          <li style="display: inline;">
              <a href="{{ route('user.profile')}}" class="btn btn-default btn-flat">Profile</a>          
              <a href="{{ route('user.logout')}}" class="btn btn-default btn-flat">Sign out</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar" style="margin-top: 2px;">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">

        @if(Auth::check())
        <div class="pull-left image">
          <img src="{{ asset('img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
        <p>{{ auth()->user()->name }} Lastman</p>            
        @else
        <div class="pull-left image">
          <img src="{{ asset('img/guest.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p>Guest User</p>  
        @endif

        @if(Auth::check())
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        @else
            <a href="#"><i class="fa fa-circle text-danger"></i> Offline</a>
        @endif  
        
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <li class="treeview">
          <a href="{{ route('admin.userRoles')}}">
            <i class="fa fa-dashboard"></i> <span>Admin</span>            
          </a>          
        </li>        
        <li>
          <a href="{{ route('admin.category') }}">
            <i class="fa fa-th"></i> <span>Category</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-blue">cats</small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="{{ route('admin.products') }}">
            <i class="fa fa-cube"></i>
            <span>Products</span>            
          </a>          
        </li>
        <li class="treeview">
          <a href="{{ route('admin.orders') }}">
            <i class="fa fa-list-ul"></i>
            <span>Orders</span>            
          </a>          
        </li>
        <li class="treeview">
          <a href="{{ route('admin.createOrder') }}">
            <i class="fa fa-list-ul"></i>
            <span>Create New Orders</span>  
            </a>          
        </li>
        <li>
          <a href="{{ route('shop.products') }}">
            <i class="fa fa-th"></i> <span>Shop</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-purple">Buy</small>
            </span>
          </a>
        </li>
        <li>
          <a href="{{ route('shop.shopHome') }}">
            <i class="fa fa-th"></i> <span>Shop Front</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">Shopping</small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="{{ route('admin.customers') }}">
            <i class="fa fa-users"></i>
            <span>Customers</span>            
          </a>          
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-truck"></i>
            <span>Shipping</span>
          </a>          
        </li>
        
        <li class="header">LABELS</li>
        <li>
          <a href="pages/widgets.html">
            <i class="fa fa-th"></i> <span>Payments</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>          
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

 <!-- BODY -->
  <!-- Content Wrapper. Contains page content -->
 
   @yield('content')

  <!-- BODY END -->

  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.18
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">Admin</a>.</strong> All rights
    reserved.
  </footer>

<!-- ./wrapper -->

<!-- jQuery 3 -->

  <script> 'use strict' feather.replace() </script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 3.3.7 -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
  <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
 @yield('extra-js')

</body>

</html>
