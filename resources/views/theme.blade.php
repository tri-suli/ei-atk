<!DOCTYPE html>
<html lang="en">
  <head>
    @include('components.themes.head')
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>John Doe</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->
            <br />
            
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                @include('components.themes.sidebar')
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            @include('components.themes.footmenu')
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                @include('components.themes.navigation')
            </div>
          </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
              <div class="page-title">
                <div class="title_left">
                  <h3>{{ $title }}</h3>
                </div>
                <div class="title_right">
                  <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search for...">
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Go!</button>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="clearfix"></div>  
              @yield('content')
            </div>
          </div>
          <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            {{ config('app.name') }} - Dashboard <a href="{{ url('/') }}">{{ date('Y') }}</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <script src="{{ asset('template/vendors/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('template/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template/vendors/fastclick/lib/fastclick.js') }}"></script>
    <script src="{{ asset('template/vendors/nprogress/nprogress.js') }}"></script>
    @stack('vendor-scripts')
    <script src="{{ asset('template/build/js/custom.min.js') }}"></script>
    @stack('custom-scripts')
</body>
</html>