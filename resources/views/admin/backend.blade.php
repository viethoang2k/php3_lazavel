<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- Meta, title, CSS, favicons, etc. -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>AZ Admin | @yield('tieu_de')</title>

<!-- Bootstrap -->
<link href="{{asset('styleAdmin/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
<!-- Font Awesome -->
<link href="{{asset('styleAdmin/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
<!-- NProgress -->
<link href="{{asset('styleAdmin/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
<!-- bootstrap-daterangepicker -->
<link href="{{asset('styleAdmin/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
<!-- Custom Theme Style -->
<link href="{{asset('styleAdmin/build/css/custom.min.css')}}" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
  <div class="main_container">
    <div class="col-md-3 left_col">
      <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
          <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>ADMIN</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
          <div class="profile_pic">
            <img src="{{asset('images/img.jpg')}}" alt="..." class="img-circle profile_img">
          </div>
          <div class="profile_info">
            <span>Welcome,</span>
            <h2>Admin</h2>
          </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
          <div class="menu_section">
            <h3>Quản Lý</h3>
            <ul class="nav side-menu">
              <li><a href="{{Route('index')}}"><i class="fa fa-home"></i> Trang Chủ </a>
              </li>
              <li><a><i class="fa fa-list"></i> Quản Lý Danh Mục <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="{{Route('ListCategories')}}">Danh Sách Danh Mục</a></li>
                  <li><a href="{{Route('addCategory')}}">Thêm Danh Mục</a></li>
                </ul>
              </li>
              <li><a><i class="	fa fa-cubes"></i> Quản Lý Sản Phẩm <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="{{Route('ListProduct')}}">Danh Sách Sản Phẩm</a></li>
                  <li><a href="{{Route('addProduct')}}">Thêm Sản Phẩm</a></li>
                </ul>
              </li>

              <li><a><i class="fa fa-shopping-cart"></i> Quản Lý Đơn Hàng <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="{{Route('ListOrder')}}">Danh Sách Đơn Hàng</a></li>
                </ul>
              </li>
              <li><a><i class="fa fa-file-photo-o"></i> Quản Lý Slide <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="{{Route('ListSlide')}}">Danh Sách Slide</a></li>
                  <li><a href="{{Route('addSlide')}}">Thêm Slide</a></li>
                </ul>
              </li>
              <li><a><i class="fa fa-user"></i>Quản Lý Users <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="{{Route('ListUser')}}">Danh sách Users</a></li>
                </ul>
              </li>
            </ul>
          </div>
          

        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
          
          <a data-toggle="tooltip" data-placement="top" title="Đăng xuất" href="{{route('Auth.Logout')}}">
            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
          </a>
        </div>
        <!-- /menu footer buttons -->
      </div>
    </div>

    <!-- top navigation -->
    <div class="top_nav">
        <div class="nav_menu">
            <ul class=" navbar-right">
              <li class="nav-item dropdown open" style="padding-left: 15px;">
                <a href="" class="user-profile dropdown-toggle" >
                  <img src="{{asset('images/img.jpg')}}" alt="">Admin
                </a>
              </li>
            </ul>
        </div>
      </div>
    <!-- /top navigation -->


    @yield('noi_dung')



    <!-- footer content -->
    <footer>
      <div class="pull-right">
        Trang web bán quần áo <a href="{{Route('home')}}">trang chủ</a>
      </div>
      <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->
  </div>
</div>

<!-- jQuery -->
<script src="{{asset('styleAdmin/vendors/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('styleAdmin/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('styleAdmin/vendors/fastclick/lib/fastclick.js')}}"></script>
<!-- NProgress -->
<script src="{{asset('styleAdmin/vendors/nprogress/nprogress.js')}}"></script>
<!-- Chart.js -->
<script src="{{asset('styleAdmin/vendors/Chart.js/dist/Chart.min.js')}}"></script>
<!-- jQuery Sparklines -->
<script src="{{asset('styleAdmin/vendors/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- Flot -->
<script src="{{asset('styleAdmin/vendors/Flot/jquery.flot.js')}}"></script>
<script src="{{asset('styleAdmin/vendors/Flot/jquery.flot.pie.js')}}"></script>
<script src="{{asset('styleAdmin/vendors/Flot/jquery.flot.time.js')}}"></script>
<script src="{{asset('styleAdmin/vendors/Flot/jquery.flot.stack.js')}}"></script>
<script src="{{asset('styleAdmin/vendors/Flot/jquery.flot.resize.js')}}"></script>
<!-- Flot plugins -->
<script src="{{asset('styleAdmin/vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
<script src="{{asset('styleAdmin/vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
<script src="{{asset('styleAdmin/vendors/flot.curvedlines/curvedLines.js')}}"></script>
<!-- DateJS -->
<script src="{{asset('styleAdmin/vendors/DateJS/build/date.js')}}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{asset('styleAdmin/vendors/moment/min/moment.min.js')}}"></script>
<script src="{{asset('styleAdmin/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

<!-- Custom Theme Scripts -->
<script src="{{asset('styleAdmin/build/js/custom.min.js')}}"></script>
</body>
</html>