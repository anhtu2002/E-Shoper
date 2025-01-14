<!DOCTYPE html>
<head>
    <title>Admin Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <link rel="stylesheet" href="{{ asset('public/backend/css/bootstrap.min.css') }}">
    <link href="{{ asset('public/backend/css/style.css') }} " rel='stylesheet' type='text/css' />
    <link href="{{ asset('public/backend/css/style-responsive.css') }} " rel="stylesheet" />
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('public/backend/css/font.css') }}" type="text/css" />
    <link href="{{ asset('public/backend/css/font-awesome.css') }}" rel="stylesheet">
    <script src="{{ asset('public/backend/js/jquery2.0.3.min.js') }}"></script>
</head>

<body>
    <div class="log-w3">
        <div class="w3layouts-main">
            <h2>ĐĂNG NHẬP</h2>
            <form action="{{ route('admin.check_login') }}" method="POST">
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
            <p>Chưa có tài khoản ?<a href="registration.html">Đăng Ký</a></p>
        </div>
    </div>
</body>

</html>
<script src="{{ asset('public/backend/js/bootstrap.js') }}"></script>
<script src="{{ asset('public/backend/js/jquery.dcjqaccordion.2.7.js') }}"></script>
<script src="{{ asset('public/backend/js/scripts.js') }}"></script>
<script src="{{ asset('public/backend/js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('public/backend/js/jquery.nicescroll.js') }}"></script>
<script src="{{ asset('public/backend/js/jquery.scrollTo.js') }}"></script>