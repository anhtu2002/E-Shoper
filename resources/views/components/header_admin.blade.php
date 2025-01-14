<header class="header fixed-top clearfix">
    <!--logo start-->
    <div class="brand">
        <a href="index.html" class="logo">
            ADMIN
        </a>
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars"></div>
        </div>
    </div>
    <!--logo end-->

    <div class="top-nav clearfix">
        <!--search & user info start-->
        <ul class="nav pull-right top-menu">
            <li>
                <input type="text" class="form-control search" placeholder=" Search">
            </li>
            <!-- user login dropdown start-->
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <img alt="" src="{{asset('')}}public/backend/images/2.png">
                    <span class="username">
                        @if (auth()->guard('admin')->user())
                            {{ucwords(auth()->guard('admin')->user()->admin_name)}}
                        @else
                            {{''}}
                        @endif
                        
                    </span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu extended logout">
                    <li><a href="#"><i class=" fa fa-suitcase"></i>Thông tin cá nhân</a></li>
                    <li><a href="#"><i class="fa fa-cog"></i> Cài đặt</a></li>
                    <li><a href="{{ route('admin.logout') }}"><i class="fa fa-key"></i> Đăng xuất</a></li>
                </ul>
            </li>
            <!-- user login dropdown end -->

        </ul>
        <!--search & user info end-->
    </div>
</header>


