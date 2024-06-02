<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title', " ")</title>
    <link href="{{asset('public/fontend/css/bootstrap.min.css')}}" rel="stylesheet">
    {{-- <link href="{{asset('public/fontend/css/font-awesome.min.css')}}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="{{asset('public/fontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/app.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/responsive.css')}}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head><!--/head-->

<body>
    <header id="header"><!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="tel:+123456789"><i class="fa fa-phone"></i> 0393787959</a></li>
                                <li><a href="mailto:youremail@gmail.com"><i class="fa fa-envelope"></i> hotroeshoper@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a target="_blank" href="https://www.facebook.com/duy.khuat.79"><i class="fa-brands fa-facebook"></i></a></li>
                                <li><a target="_blank" href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                <li><a target="_blank" href="https://www.linkedin.com/in/t%C3%BA-khu%E1%BA%A5t-b3a9a42ab/"><i class="fa-brands fa-linkedin"></i></a></li>
                                <li><a target="_blank" href="#"><i class="fa-brands fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->

        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="{{ route('home') }}"><img src="{{asset('public/fontend/images/logo.png')}}" alt="" /></a>
                        </div>
                        <div class="btn-group pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                    USA
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Canada</a></li>
                                    <li><a href="#">UK</a></li>
                                </ul>
                            </div>

                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                    DOLLAR
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Canadian Dollar</a></li>
                                    <li><a href="#">Pound</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-star"></i> Yêu thích</a></li>
                                <li><a href="#"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                                <li><a href="{{ route('cart') }}"><i class="fa fa-shopping-cart icon-cart"><h6 class="cart-number">{{$numberCart}}</h6></i> Giỏ hàng</a></li>
                                @auth
                                    <li class="dropdown a-navbar"><i class="fa fa-user"></i> {{auth()->user()->name}}
                                        <ul role="menu" class="sub-menu sub-menu-account">
                                            <li><a href="cart.html">Thông tin cá nhân</a></li>
                                            <li><a href="{{ route('user.logout', ['id'=>1]) }}">Đăng xuất</a></li>
                                        </ul>
                                    </li>
                                @else 
                                    <li><a href="{{ route('user.login') }}"><i class="fa fa-lock"></i> Đăng nhập</a></li>
                                @endauth
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->

        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-7">
                        {{-- <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div> --}}
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{ route('home') }}" class="active">Trang chủ</a></li>
                                <li class="dropdown"><a href="#">Sản phẩm<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.html">Products</a></li>
                                        <li><a href="product-details.html">Product Details</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="cart.html">Cart</a></li>
                                        <li><a href="login.html">Login</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Tin tức</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="search_box pull-right">
                            <input type="text" placeholder="Tìm kiếm sản phẩm" />
                            <img class="searchicon" src="{{ asset('public/fontend/images/searchicon.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->
    @if(Request::is('/'))
       <x-home_slider></x-home_slider> 
    @endif
    @if (session()->has('success'))
        <x-success>{{session('success')}}</x-success>
    @endif

    <section>
        <div class="container">
            <div class="row">
                {{-- filter --}}
                @if ($showBanner)
                    <div class="col-sm-3">
                        <div class="left-sidebar">
                            @if($showFilter)
                                <x-filter :cates="$cates" :brands="$brands"></x-filter>
                            @endif
                            {{-- <div class="price-range"><!--price-range-->
                                <h2>Price Range</h2>
                                <div class="well text-center">
                                    <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2"><br />
                                    <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                                </div>
                            </div><!--/price-range--> --}}

                            <div class="shipping text-center shadow-box"><!--shipping-->
                                <img src="{{asset('public/fontend/images/shipping.jpg')}}" alt="" />
                            </div><!--/shipping-->

                        </div>
                    </div>
                @endif
                
                <div class="col-sm-9 padding-right">
                    @yield('content')

                </div>
            </div>
        </div>
    </section>
    <x-user_footer></x-user_footer>
    
</body>
<script src="{{asset('resources/js/success.js')}}"></script>
<script src="{{asset('public/fontend/js/jquery.js')}}"></script>
<script src="{{asset('public/fontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/fontend/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('public/fontend/js/price-range.js')}}"></script>
<script src="{{asset('public/fontend/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('public/fontend/js/main.js')}}"></script>

</html>