<html lang="en">

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Favicon Icon Css -->
<link rel="icon" type="image/png" sizes="32x32" href="{{asset('image/favicon-32x32.png')}}">
<!-- Animation CSS -->
<link rel="stylesheet" href="{{asset('css/animate.css')}}">	
<!-- Animation CSS -->
<link rel="stylesheet" href="{{asset('css/animate.css')}}" type="text/css">  
<!-- Font Css -->
<link href="{{asset('https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900')}}" rel="stylesheet">
<link href="{{asset('css/ionicons.min.css')}}" type="text/css" rel="stylesheet">
<!-- Owl Css -->
<link href="{{asset('css/owl.carousel.min.css')}}" type="text/css" rel="stylesheet">
<link href="{{asset('css/owl.theme.default.min.css')}}" type="text/css" rel="stylesheet">
<!-- Magnific Popup Css -->
<link href="{{asset('css/magnific-popup.css')}}" type="text/css" rel="stylesheet">
<!-- Bootstrap Css --> 
<link href="{{asset('css/bootstrap.min.css')}}" type="text/css" rel="stylesheet">
<!-- Price Filter Css --> 
<link href="{{asset('css/jquery-ui.css')}}" type="text/css" rel="stylesheet">
<!-- Scrollbar Css -->
<link href="{{asset('css/mCustomScrollbar.min.css')}}" type="text/css" rel="stylesheet">
<!-- Select2 Css --> 
<link href="{{asset('css/select2.min.css')}}" type="text/css" rel="stylesheet">
<!-- main css --> 
<link href="{{asset('css/style.css')}}" type="text/css" rel="stylesheet">
<link href="{{asset('css/responsive.css')}}" type="text/css" rel="stylesheet">
<title>@yield('tieu_de')</title>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src=""></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
 gtag('config', 'ma', { 'anonymize_ip': true });
</script>

<!-- Start of StatCounter Code -->
<!-- <scrpt>
	
	var sc_project=11921154;
	var sc_security="6c07f98b";
		var scJsHost = (("https:" == document.location.protocol) ?
		"https://secure." : "http://www.");
			//
			
document.write("<sc"+"ript src='" +scJsHost +"statcounter.com/counter/counter.js'></"+"script>");
</script> -->
<!-- End of StatCounter Code -->

</head>
<body>

<!-- LOADER -->
<div id="preloader">
    <div class="loading_wrap">
    	<img src="{{asset('image/loader_logo.png')}}" alt="logo">
    </div>
</div>
<!-- LOADER -->

<!-- Start Header Section -->
<header>
	<div class="header-top">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-6">
                    <ul class="header_list text-md-left text-center">
                        <li><a href="tel:+ 00 123 456 789"><i class="fa fa-phone"></i>+ 00 123 456 789</a></li>
                        @if (Auth::check())
                        <li><a href="mailto:{{Auth::user()->email}}"><i class="fa fa-envelope-o"></i><h8>Chào bạn {{Auth::user()->email}}</h8></a></li>
                        @else
                        <li><a href=""><i class="fa fa-envelope-o"></i>Welcome</a></li>
                        @endif
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="header_list text-md-right text-center">
                        <li>
                            @if (Auth::check() && Auth::user()->role==0)
                                <h3><a  href="{{route('index')}}">Quản Trị</a></h3>
                            @elseif(Auth::check() && Auth::user()->role==1)
                                <h3><a href="{{route('Auth.Logout')}}">Đăng Xuất</a></h3>
                            @else
                                <h3> <a href="{{route('Auth.Login')}}" >Đăng nhập</a> </h3>
                            @endif
                        </li>
                        <li><a href="{{Route('myaccount')}}">Tài Khoản</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="header-mdl">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-12">
                	<div class="hm-inner d-sm-flex align-items-center justify-content-between">
                    	<div class="header-logo">
                        	<a href="{{route('home')}}"><img src="{{asset('image/logo.png')}}" alt="logo"></a>
                        </div>
                        <form action="{{route('timkiem')}}" class="header-form" method="get">
                        <input name="keyword" class="search-box" placeholder="Search Product..."  required value="" type="search">
                        <button type="submit">Search</button>
                    </form>

                    	<div class="header-right">
                        	<div class="header-cart">
                            <a href="{{Route('GioHang')}}">
                                <div class="cart-icon">
                                    <img src="{{asset('image/cart-icon.png')}}" alt="cart-icon">
                                    {{-- <span>{{$listSP->name}}</span> --}}
                                </div>
                                {{-- $237.00<i class="fa fa-angle-down"></i> --}}
                            </a>
                        </div>
                    	</div>
                        	<div class="d-lg-none mm_icon">
                                <div class="form-captions" id="search">
                                    <button type="submit" class="submit-btn-2"><i class="fa fa-search"></i></button>
                                </div>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                        	</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-btm">
   		<div class="container">
        	<div class="row">
            	<div class="col-md-12">
                	<nav class="navbar navbar-expand-lg navbar-light">
                    	<div class="header-logo">
                        	<a href=""><img src="image/logo.png" alt="logo"></a>
                        </div>
                      	<div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                	<a class="nav-link" href="{{Route('home')}}">Trang Chủ</a>
                                </li>
                                <li class="nav-item">
                                	<a class="nav-link" href="{{Route('man')}}">Áo Nam</a>
                                </li>
                                <li class="dropdown">
                                <a class="nav-link" href="{{Route('woman')}}">Áo Nữ</a>
                                </li>
                                <li class="nav-item">
                                	<a class="nav-link" href="{{Route('contact')}}">Liên Hệ</a>
                                </li>
                            </ul>
                      	</div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- End Header Section -->

@yield('home')
@yield('content')
@yield('contact')
@yield('man')
@yield('woman')
@yield('cart')
@yield('singleproduct')
@yield('myaccount')
@yield('login')


<!-- Start Footer Section -->
<footer>
	<div class="footer-top">
    	<div class="container">
        	<div class="row">
            	<div class="col-lg-4 col-md-12 col-sm-12">
                	<div class="footer-box box-1">
                    	<h6 class="fb-title">ABOUT US</h6>
                        <div class="fb-iner">
                        	<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                        </div>
                    </div> 
                </div>
            	<div class="col-lg-4 col-md-6 col-sm-12 order-md-last">
                	<div class="footer-box box-4">
                    	<h6 class="fb-title">CONTACT INFO</h6>
                        <div class="fb-iner">
                        	<ul>
                            	<li><i class="ion-ios-location-outline"></i><p>c/o Giunti International Division Via G.B. Pirelli, 30 20124 Milan</p></li>
                                <li><i class="ion-ios-telephone-outline"></i><p>+025 2155 3255</p></li>
                                <li><i class="ion-ios-email-outline"></i><a href="#">info@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                	<div class="footer-box box-2">
                    	<h6 class="fb-title">CATEGORIES</h6>
                        <div class="fb-iner">
                        	<ul class="footer-links">
                            	<li><a href="#">Fashion Sneakers</a></li>
                                <li><a href="#">Jackets</a></li>
                                <li><a href="#">Outdoor Shop</a></li>
                                <li><a href="#">Pants</a></li>
                                <li><a href="#">Shirts & Tops</a></li>
                                <li><a href="#">Swim Shop</a></li>
                                <li><a href="#">Swimwear</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                	<div class="footer-box box-3">
                    	<h6 class="fb-title">MY ACCOUNT</h6>
                        <div class="fb-iner">
                        	<ul class="footer-links">
                            	<li><a href="#">Orders</a></li>
                                <li><a href="#">Compare</a></li>
                                <li><a href="#">Wishlist</a></li>
                                <li><a href="#">Log In</a></li>
                                <li><a href="#">Register</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-btm">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-6">
                	<div class="copyright">
                    	<p>Copyright © 2018. All Rights Reserved.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="footer-social text-md-right">
                    	<ul>
                        	<li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer Section -->

<a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a>

<!-- Jquery js -->
<script src="{{asset('js/jquery.min.js')}}" type="text/javascript"></script>
<!-- popper.min js -->
<script src="{{asset('js/popper.min.js')}}" type="text/javascript"></script>
<!-- Bootstrap js -->
<script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
<!-- Magnific Popup js -->
<script src="{{asset('js/jquery.magnific-popup.min.js')}}" type="text/javascript"></script>
<!-- Map js -->
<script src="{{asset('https://maps.googleapis.com/maps/api/js?key=AIzaSyD7TypZFTl4Z3gVtikNOdGSfNTpnmq-ahQ')}}"  type="text/javascript"></script>
<!-- Owl js -->
<script src="{{asset('js/owl.carousel.min.js')}}" type="text/javascript"></script>
<!-- Countdown js -->
<script src="{{asset('js/countdown.min.js')}}" type="text/jscript"></script>
<!-- Counter js -->
<script src="{{asset('js/jquery.countup.js')}}" type="text/javascript"></script>
<!-- waypoint js -->
<script src="{{asset('js/waypoint.js')}}" type="text/javascript"></script>
<!-- Select2 js -->
<script src="{{asset('js/select2.min.js')}}" type="text/javascript"></script>
<!-- Price Slider js -->
<script src="{{asset('js/jquery-price-slider.js')}}" type="text/javascript"></script>
<!-- jquery.elevatezoom js -->
<script src='{{asset('js/jquery.elevatezoom.js')}}' type="text/javascript"></script>
<!-- imagesloaded.pkgd.min js -->
<script src='{{asset('js/imagesloaded.pkgd.min.js')}}' type="text/javascript"></script>
<!-- isotope.min js -->
<script src='{{asset('js/isotope.min.js')}}' type="text/javascript"></script>
<!-- jquery.fitvids js -->
<script src='{{asset('js/jquery.fitvids.js')}}' type="text/javascript"></script>
<!-- mCustomScrollbar.concat.min js -->
<script src="{{asset('js/mCustomScrollbar.concat.min.js')}}" type="text/javascript"></script>
<!-- Custom css -->
<script src="{{asset('js/custom.js')}}" type="text/javascript"></script> 
</body>

</html>	