<!DOCTYPE html>
<head>
    <title>Đăng ký | E-Shoppe</title>
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
        <div class="w3layouts-mainn">
            <h2>ĐĂNG KÝ</h2>
            <form action="{{ route('user.save_register') }}" method="POST">
                @csrf
                <div class="wrap_form">
                    <div class="group_register">
                        <div class="inp">
                            <h3 class="label_input">Họ và tên: <p style="color: red">&nbsp;*</p></h3>
                            <input id="name" type="text" class="gggg" name="name" placeholder="..." required value="{{ old('name')}}">
                        </div>
                        
                        <div class="inp">
                            <h3 class="label_input">Số điện thoại: <p style="color: red">&nbsp;*</p></h3>
                            <input id="phone" type="number" class="gggg" name="phone" placeholder="..." required value="{{ old('phone')}}">
                        </div>
                        <div class="inp">
                            <h3 class="label_input">Giới tính: <p style="color: red">&nbsp;*</p></h3>
                            <select name="sex" id="sex" class="select_register">
                                <option value=""></option>
                                <option value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>
                            </select>
                        </div>
                        
                        
                    </div>

                    <div class="group_register">
                        <div class="inp">
                            <h3 class="label_input">Email: <p style="color: red">&nbsp;*</p></h3>
                            <input id="email" type="email" class="gggg" name="email" placeholder="example@gmail.com" required value="{{ old('email')}}">
                        </div>
                        <div class="inp">
                            <h3 class="label_input">Ngày sinh: <p style="color: red">&nbsp;*</p></h3>
                            <input id="birth_day" type="date" class="gggg" name="birth_day"  required value="{{ old('birth_day')}}">
                        </div>
                        <div class="inp">
                            <h3 class="label_input">Mật khẩu: <p style="color: red">&nbsp;*</p></h3>
                            <input id="password" type="password" class="gggg" name="password" placeholder="..." required oninput="check_repass()"> 
                        </div>
                        <div class="inp">
                            <h3 class="label_input">Nhập lại mật khẩu: <p style="color: red">&nbsp;*</p></h3>
                            <input id="re_pass" type="password" class="gggg"  placeholder="..." required oninput="check_repass()">
                        </div>
                    </div>
                </div>
                @if ($errors->any())
                    <h4 class="error">
                        {{ $errors->first() }}
                    </h4>
                @endif
                <h4 id="error" style="visibility: hidden" class="error">Mật khẩu không trùng khớp</h4>

                
                
                <input disabled id="btn_submit" type="submit" value="ĐĂNG KÝ" name="login">
            </form>
            
            <p>Bạn đã có tài khoản ?<a href="{{ route('user.login') }}">Đăng nhập</a></p>
        </div>
    </div>
</body>

</html>
<script src="{{asset('resources/js/check_repass.js')}}"></script>
<script src="{{ asset('public/backend/js/jquery2.0.3.min.js') }}"></script>
<script src="{{ asset('public/backend/js/bootstrap.js') }}"></script>
<script src="{{ asset('public/backend/js/scripts.js') }}"></script>
