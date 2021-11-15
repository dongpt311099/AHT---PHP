<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>De_1</title>
  <!-- loader-->
  <link href="/admin/css/pace.min.css" rel="stylesheet" />
  <script src="/admin/js/pace.min.js"></script>
  <!--favicon-->
  <link rel="icon" href="/admin/images/favicon.ico" type="image/x-icon">
  <!-- Vector CSS -->
  <link href="/admin/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
  <!-- simplebar CSS-->
  <link href="/admin/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
  <!-- Bootstrap core CSS-->
  <link href="/admin/css/bootstrap.min.css" rel="stylesheet" />
  <!-- animate CSS-->
  <link href="/admin/css/animate.css" rel="stylesheet" type="text/css" />
  <!-- Icons CSS-->
  <link href="/admin/css/icons.css" rel="stylesheet" type="text/css" />
  <!-- Sidebar CSS-->
  <link href="/admin/css/sidebar-menu.css" rel="stylesheet" />
  <!-- Custom Style-->
  <link href="/admin/css/app-style.css" rel="stylesheet" />
  <!-- link css -->
  <link rel="stylesheet" href="/vendor/fontawesome/css/fontawesome.min.css">

</head>

<body class="bg-theme bg-theme1">

  <!-- Start wrapper-->
  <div id="wrapper">

    <!--Start sidebar-wrapper-->
    <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
      <div class="brand-logo">
        <a href="index.html">
          <img src="/admin/images/logo-icon.png" class="logo-icon" alt="logo icon">
          <h5 class="logo-text">Admin</h5>
        </a>
      </div>
      <ul class="sidebar-menu do-nicescrol">
        <li class="sidebar-header">MAIN NAVIGATION</li>
        <li>
          <a href="/users">
            <i class="zmdi zmdi-accounts-list"></i> <span>User</span>
          </a>
        </li>

        <li>
          <a href="/products">
            <i class="fab fa-product-hunt"></i> <span>Products</span>
          </a>
        </li>

        <li>
          <a href="/orders">
            <i class="zmdi zmdi-case-check"></i> <span>Orders</span>
          </a>
        </li>

      </ul>

    </div>

    <!--Start topbar header-->
    <header class="topbar-nav">
      <nav class="navbar navbar-expand fixed-top">
        <ul class="navbar-nav mr-auto align-items-center">
          <li class="nav-item">
            <a class="nav-link toggle-menu" href="javascript:void();">
              <i class="icon-menu menu-icon"></i>
            </a>
          </li>
        </ul>

        <ul class="navbar-nav align-items-center right-nav-link">
          <li class="nav-item dropdown-lg">
            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
              <i class="fa fa-envelope-open-o"></i></a>
          </li>
          <li class="nav-item dropdown-lg">
            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
              <i class="fa fa-bell-o"></i></a>
          </li>
          <li class="nav-item language">
            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();"><i class="fa fa-flag"></i></a>
            <ul class="dropdown-menu dropdown-menu-right">
              <li class="dropdown-item"> <i class="flag-icon flag-icon-gb mr-2"></i> English</li>
              <li class="dropdown-item"> <i class="flag-icon flag-icon-fr mr-2"></i> French</li>
              <li class="dropdown-item"> <i class="flag-icon flag-icon-cn mr-2"></i> Chinese</li>
              <li class="dropdown-item"> <i class="flag-icon flag-icon-de mr-2"></i> German</li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
              <span class="user-profile"><img src="https://via.placeholder.com/110x110" class="img-circle" alt="user avatar"></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-right">
              <li class="dropdown-item user-details">
                <a href="javaScript:void();">
                  <div class="media">
                    <div class="avatar"><img class="align-self-start mr-3" src="https://via.placeholder.com/110x110" alt="user avatar"></div>
                    <div class="media-body">
                      <h6 class="mt-2 user-title">{{ Auth::user()->name }}</h6>
                      <p class="user-subtitle">{{ Auth::user()->email }}</p>
                    </div>
                  </div>
                </a>
              </li>
              <li class="dropdown-divider"></li>
              <li class="dropdown-item"><i class="icon-envelope mr-2"></i> Inbox</li>
              <li class="dropdown-divider"></li>
              <li class="dropdown-item"><i class="icon-wallet mr-2"></i> Account</li>
              <li class="dropdown-divider"></li>
              <li class="dropdown-item"><i class="icon-settings mr-2"></i> Setting</li>
              <li class="dropdown-divider"></li>
              <li class="dropdown-item"><a href="{{ url('logout') }}" class="icon-power mr-2"></a> Logout</li>
            </ul>
          </li>
        </ul>
      </nav>
    </header>
    <!--End topbar header-->

    <div class="clearfix"></div>

    <div class="content-wrapper">
      @yield('content')

    </div>
    <!--End content-wrapper-->
    <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->

    <!--Start footer-->
    <footer class="footer">
      <div class="container">
        <div class="text-center">
          Copyright © 2018 Dashtreme Admin
        </div>
      </div>
    </footer>
    <!--End footer-->

    <!--start color switcher-->
    <div class="right-sidebar">
      <div class="switcher-icon">
        <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
      </div>
      <div class="right-sidebar-content">

        <p class="mb-0">Gaussion Texture</p>
        <hr>

        <ul class="switcher">
          <li id="theme1"></li>
          <li id="theme2"></li>
          <li id="theme3"></li>
          <li id="theme4"></li>
          <li id="theme5"></li>
          <li id="theme6"></li>
        </ul>

        <p class="mb-0">Gradient Background</p>
        <hr>

        <ul class="switcher">
          <li id="theme7"></li>
          <li id="theme8"></li>
          <li id="theme9"></li>
          <li id="theme10"></li>
          <li id="theme11"></li>
          <li id="theme12"></li>
          <li id="theme13"></li>
          <li id="theme14"></li>
          <li id="theme15"></li>
        </ul>

      </div>
    </div>
    <!--end color switcher-->

  </div>
  <!--End wrapper-->

  <!-- Bootstrap core JavaScript-->
  <script src="/admin/js/jquery.min.js"></script>
  <script src="/admin/js/popper.min.js"></script>
  <script src="/admin/js/bootstrap.min.js"></script>

  <!-- simplebar js -->
  <script src="/admin/plugins/simplebar/js/simplebar.js"></script>
  <!-- sidebar-menu js -->
  <script src="/admin/js/sidebar-menu.js"></script>
  <!-- loader scripts -->
  <script src="/admin/js/jquery.loading-indicator.js"></script>
  <!-- Custom scripts -->
  <script src="/admin/js/app-script.js"></script>
  <!-- Chart js -->



  <!-- Index js -->
  <script src="/admin/js/index.js"></script>


</body>

</html>