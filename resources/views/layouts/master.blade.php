<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    @yield('title')
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="{{ asset('../assets/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('../assets/css/now-ui-dashboard.css?v=1.5.0') }}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('../assets/demo/demo.css') }}" rel="stylesheet" />
  {{-- CSS for Datetime picker --}}
  <link href="{{ asset('../assets/css/bootstrap-datetimepicker.css') }}" rel="stylesheet">

</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange"><!--Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"-->
      <div class="logo">
        <a href="{{ URL::to('admin') }}" class="simple-text logo-mini">
          BS
        </a>
        <a href="{{ URL::to('admin') }}" class="simple-text logo-normal">
          Admin Dashboard
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li class="active">
            <a href="{{ URL::to('admin') }}">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="{{ URL::to('admin/all-user') }}">
              <i class="now-ui-icons users_single-02"></i>
              <p>All Users</p>
            </a>
          </li>
          <li>
            <a href="{{ URL::to('admin/add-category') }}">
              <i class="now-ui-icons ui-1_simple-add"></i>
              <p>Add Category</p>
            </a>
          </li>
          <li>
            <a href="{{ URL::to('admin/all-category') }}">
              <i class="now-ui-icons files_paper"></i>
              <p>All Category</p>
            </a>
          </li>
          <li>
            <a href="{{ URL::to('admin/all-sport') }}">
              <i class="now-ui-icons files_paper"></i>
              <p>All Sports</p>
            </a>
          </li>
          <li>
            <a href="{{ URL::to('admin/add-sport') }}">
              <i class="now-ui-icons ui-1_simple-add"></i>
              <p>Add Sports</p>
            </a>
          </li>
          <li>
            <a href="{{ URL::to('admin/all-bet') }}">
              <i class="now-ui-icons files_paper"></i>
              <p>Win Decider Section</p>
            </a>
          </li>
          <li>
            <a href="{{ URL::to('admin/all-withdraw') }}">
              <i class="now-ui-icons files_paper"></i>
              <p>All Withdraw Request</p>
            </a>
          </li>
          <li>
            <a href="{{ URL::to('admin/all-contact') }}">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Messages</p>
            </a>
          </li>
          <li>
            <a href="{{ URL::to('admin/add-referamount') }}">
              <i class="now-ui-icons text_caps-small"></i>
              <p>Add Refer Percentage</p>
            </a>
          </li>
          <li class="active-pro">
            <a href="">
              <i class="now-ui-icons arrows-1_cloud-download-93"></i>
              <p></p>
            </a>
          </li>
        </ul>
      </div>
    </div>

    <div class="main-panel" id="main-panel">

      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">Table List</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <!-- Search -->
            {{-- <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                  </div>
                </div>
              </div>
            </form> --}}
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="now-ui-icons media-2_sound-wave"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li>

              {{-- Admin Logout Operation --}}

              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                @if(\Illuminate\Support\Facades\Auth::guard('admin')->check())
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('admin.logout') }}"
                           onclick="event.preventDefault();
                                     document.getElementById('admin-logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="admin-logout-form" action="{{ route('admin.logout') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                    </div>
                @else
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('user.logout') }}"
                           onclick="event.preventDefault();
                                     document.getElementById('user-logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="user-logout-form" action="{{ route('user.logout') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                    </div>
                @endif
            </li>
              {{-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="now-ui-icons location_world"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li> --}}
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->


      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">

        @yield('content')

      </div>


      <footer class="footer">
        <div class=" container-fluid ">
          <nav>
            <ul>
              <li>
                <a href="">
                  Sports
                </a>
              </li>
              <li>
                <a href="">
                  About Us
                </a>
              </li>
              <li>
                <a href="">
                  Blog
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright" id="copyright">
            &copy; <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Designed by <a href="{{ URL::to('admin') }}" target="_blank">TASH</a>. Coded by <a href="{{ URL::to('admin') }}" target="_blank">TASH</a>.
          </div>
        </div>
      </footer>
    </div>

  </div>
  <!--   Core JS Files   -->
  <script src="{{ asset('../assets/js/core/jquery.min.js') }}"></script>
  <script src="{{ asset('../assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('../assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('../assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="{{ asset('../assets/js/plugins/chartjs.min.js') }}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('../assets/js/plugins/bootstrap-notify.js') }}"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('../assets/js/now-ui-dashboard.min.js?v=1.5.0') }}" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{ asset('../assets/demo/demo.js') }}"></script>
  {{-- JS for Datetime picker --}}
  <script src="{{ asset('../assets/js/core/bootstrap-datetimepicker.min.js') }}"></script>


  <script>
    var today = new Date();
    $("#datetime").datetimepicker({
        format: 'yyyy-mm-dd hh:ii',
        autoclose: true,
        todayBtn: true,
        startDate : today,
        todayHighlight: true,
        weekStart: 1,
    });
 </script>

  @yield('scripts')

</body>

</html>
