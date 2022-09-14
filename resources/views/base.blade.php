<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Top Navigation</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ public_path().'/layout/plugins/fontawesome-free/css/all.min.css' }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ public_path().'/layout/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css' }}">
  <link rel="stylesheet" href="{{ public_path().'/layout/plugins/datatables-responsive/css/responsive.bootstrap4.min.css' }}">
  <link rel="stylesheet" href="{{ public_path().'/layout/plugins/datatables-buttons/css/buttons.bootstrap4.min.css' }}">

  <link rel="stylesheet" href="{{ public_path().'/layout/plugins/select2/css/select2.min.css' }}">

  <link rel="stylesheet" href="{{ public_path().'/layout/dist/css/adminlte.min.css' }}">
  <link rel="stylesheet" href="{{ public_path().'/layout/dist/css/style.css' }}">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="/dash/" class="navbar-brand">
        <span class="brand-text font-weight-light">SCHEMES</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Schemes</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">

              <li class="dropdown-divider"></li>

              <!-- Level two dropdown-->
              <li class="dropdown-submenu dropdown-hover">
                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">MCF</a>
                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                  <li>
                    <a tabindex="-1" href="/mcf/add/" class="dropdown-item">Add</a>
                  </li>
                  <li><a href="/mcf/" class="dropdown-item">List</a></li>
                  <li><a href="/mcf/consolidated/" class="dropdown-item">Consolidated</a></li>
                </ul>
              </li>
              <!-- End Level two -->

              <li class="dropdown-divider"></li>

              <!-- Level two dropdown-->
              <li class="dropdown-submenu dropdown-hover">
                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">RRF</a>
                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                  <li>
                    <a tabindex="-1" href="/rrf/add/" class="dropdown-item">Add</a>
                  </li>
                  <li><a href="/rrf/" class="dropdown-item">List</a></li>
                  <li><a href="/rrf/consolidated/" class="dropdown-item">Consolidated</a></li>
                </ul>
              </li>
              <!-- End Level two -->

              <li class="dropdown-divider"></li>

              <!-- Level two dropdown-->
              <li class="dropdown-submenu dropdown-hover">
                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">HKS</a>
                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                  <li>
                    <a tabindex="-1" href="/hks/add/" class="dropdown-item">Add</a>
                  </li>
                  <li><a href="/hks/" class="dropdown-item">List</a></li>
                  <li><a href="/hks/consolidated/" class="dropdown-item">Consolidated</a></li>
                </ul>
              </li>
              <!-- End Level two -->

              <li class="dropdown-divider"></li>

              <!-- Level two dropdown-->
              <li class="dropdown-submenu dropdown-hover">
                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">C@S</a>
                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                  <li>
                    <a tabindex="-1" href="/cschool/add/" class="dropdown-item">Add</a>
                  </li>
                  <li><a href="/cschool/" class="dropdown-item">List</a></li>
                  <li><a href="/cschool/consolidated/" class="dropdown-item">Consolidated</a></li>
                </ul>
              </li>
              <!-- End Level two -->
            </ul>
          </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-0 ml-md-3">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form>
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-user"></i>
            <span class="badge badge-warning navbar-badge"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-header"><a href="/logout/">Signout</a></span>
            <div class="dropdown-divider"></div>
          </div>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield("content")
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      www.sanitation.kerala.gov.in
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; {{ date('Y') }} <a href="https://sweb.suchitwamission.com">Suchitwa Mission</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ public_path().'/layout/plugins/jquery/jquery.min.js' }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ public_path().'/layout/plugins/bootstrap/js/bootstrap.bundle.min.js' }}"></script>

<script src="{{ public_path().'/layout/plugins/datatables/jquery.dataTables.min.js' }}"></script>
<script src="{{ public_path().'/layout/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js' }}"></script>

<script src="{{ public_path().'/layout/plugins/select2/js/select2.full.min.js' }}"></script>

<!-- AdminLTE App -->
<script src="{{ public_path().'/layout/dist/js/adminlte.min.js' }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ public_path().'/layout/dist/js/demo.js' }}"></script>
<script src="{{ public_path().'/layout/dist/js/script.js' }}"></script>
</body>
</html>
