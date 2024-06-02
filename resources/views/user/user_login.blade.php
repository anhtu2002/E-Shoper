<!DOCTYPE html>
<head>
    <title>Đăng nhập | E-Shoppe</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="{{ asset('public/fontend/css/bootstrap.min.css') }}">
    <link href="{{ asset('public/fontend/css/style.css') }} " rel='stylesheet' type='text/css' />
    <link href="{{ asset('public/fontend/css/app.css') }} " rel='stylesheet' type='text/css' />
    <link href="{{ asset('public/backend/css/style-responsive.css') }} " rel="stylesheet" />
</head>

<body class="login-body">
    <a href="{{ route('home') }}">
        <div class="logo-login">
            <img src="{{ asset('public/fontend/images/logo.png') }}" alt="">
        </div> 
    </a>
    
    <div class="log-w3">
        <div class="banner">
            <img src="{{ asset('public/fontend/images/shipping.jpg') }}" alt="">
        </div>
        <div class="w3layouts-main">
            <h2>ĐĂNG NHẬP</h2>
            <form action="{{ route('user.check_login') }}" method="POST">
                @csrf
                <input type="email" class="ggg" name="email" placeholder="E-MAIL" required value="{{ old('email')}}">
                <input type="password" class="ggg" name="password" placeholder="PASSWORD" required>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        {{ $errors->first() }}
                    </div>
                @endif

                <span>
                    <input type="checkbox" />
                    Nhớ mật khẩu
                </span>
                <h6>
                    <a href="#">Quên mật khẩu?</a>
                </h6>
                <div class="clearfix"></div>
                <input type="submit" value="Sign In" name="login">
            </form>
            @if(session()->has('success'))
                <x-success>{{session('success')}}</x-success>
            @endif
            <p>Chưa có tài khoản ?<a href="{{ route('user.register') }}">Đăng ký</a></p>
        </div>
    </div>
</body>

</html>
<script src="{{asset('resources/js/success.js')}}"></script>
<script src="{{ asset('public/backend/js/jquery2.0.3.min.js') }}"></script>
<script src="{{ asset('public/backend/js/bootstrap.js') }}"></script>
<script src="{{ asset('public/backend/js/jquery.dcjqaccordion.2.7.js') }}"></script>
<script src="{{ asset('public/backend/js/scripts.js') }}"></script>
<script src="{{ asset('public/backend/js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('public/backend/js/jquery.nicescroll.js') }}"></script>
<script src="{{ asset('public/backend/js/jquery.scrollTo.js') }}"></script>