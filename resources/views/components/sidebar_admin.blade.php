
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href=" {{url('/admin')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Tổng quan</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Danh mục sản phẩm</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{route('admin.add_category')}}">Thêm danh mục sản phẩm</a></li>
                        <li><a href="{{route('admin.all_category')}}">Danh sách danh mục sản phẩm</a></li>

                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Thương hiệu</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{route('admin.add_brand')}}">Thêm thương hiệu</a></li>
                        <li><a href="{{route('admin.all_brand')}}">Danh sách thương hiệu</a></li>

                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Sản phẩm</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{route('admin.add_product')}}">Thêm sản phẩm</a></li>
                        <li><a href="{{route('admin.all_product')}}">Danh sách sản phẩm</a></li>

                    </ul>
                </li>

            </ul>
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
