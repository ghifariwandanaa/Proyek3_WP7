<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Web Profile</title>
  <link rel="stylesheet" href="{{ asset('admin') }}/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="{{ asset('admin') }}/vendors/base/vendor.bundle.base.css">
  <link rel="stylesheet" href="{{ asset('admin') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-ezv3O+qF+nssL47eugR6F7hByOPIqaaW73E6Iv/GJ/Fkhbu2QcmkOrqKtxr0KZBI" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('admin') }}/css/style.css">
  <link rel="stylesheet" href="welcome/css/styles.css">
  <link rel="shortcut icon" href="{{ asset('admin') }}/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
          <a class="navbar-brand brand-logo-mini" href="depan"><img src="{{ asset('admin') }}/images/logo-mini.svg" alt="logo"/></a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button>
        </div>  
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">

        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
              <img src="{{ asset('admin') }}/images/faces/OIP.jpg" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <form action="/logout" method="post">
                  @csrf
                  <button type="submit" class="dropdown-item"><i class="mdi mdi-logout text-danger"></i>
                  Logout</button>
              </form>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <div class="container-fluid page-body-wrapper">
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="/">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Home</span>
            </a>
            <a class="nav-link" href="{{ route('depan.index') }}">
                <i class="mdi mdi-account menu-icon"></i>
                <span class="menu-title">Profile</span>
            </a>
            <a class="nav-link" href="#">
                <i class="mdi mdi-settings menu-icon"></i>
                <span class="menu-title">Settings</span>
              </a>
          </li>            
        </ul>
      </nav>
      <div class="main-panel">
        <div class="content-wrapper">
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $item)
                  <li>{{ $item }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          <div class="row">
            <div class="col-md-12 stretch-card">
              <div class="card">
                <div class="card-body">
                  @yield('konten')
                </div>
              </div>
            </div>
          </div>
        </div>
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Kelompok WP7</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Web Profile</span>
          </div>
        </footer>
      </div>
    </div>
  </div>
  <script src="{{ asset('admin') }}/vendors/base/vendor.bundle.base.js"></script>
  <script src="{{ asset('admin') }}/vendors/chart.js/Chart.min.js"></script>
  <script src="{{ asset('admin') }}/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="{{ asset('admin') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="{{ asset('admin') }}/js/off-canvas.js"></script>
  <script src="{{ asset('admin') }}/js/hoverable-collapse.js"></script>
  <script src="{{ asset('admin') }}/js/template.js"></script>
  <script src="{{ asset('admin') }}/js/dashboard.js"></script>
  <script src="{{ asset('admin') }}/js/data-table.js"></script>
  <script src="{{ asset('admin') }}/js/jquery.dataTables.js"></script>
  <script src="{{ asset('admin') }}/js/dataTables.bootstrap4.js"></script>
  <script src="{{ asset('admin') }}/js/jquery.cookie.js" type="text/javascript"></script>
</body>

</html>
