@extends('welcom')
@section('title', $product->product_name)
@section('content')
<div class="product-details shadow-box"><!--product-details-->
    <div class="col-sm-5" style="margin-top: 15px">
        <div class="view-product">
            <img src="{{asset($product->product_image)}}" alt="" />
            <h3>ZOOM</h3>
        </div>
        <div id="similar-product" class="carousel slide" data-ride="carousel">
            
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <a href=""><img src="" alt=""></a>
                        <a href=""><img src="" alt=""></a>
                        <a href=""><img src="" alt=""></a>
                    </div>
                    <div class="item">
                        <a href=""><img src="" alt=""></a>
                        <a href=""><img src="" alt=""></a>
                        <a href=""><img src="" alt=""></a>
                    </div>
                    <div class="item">
                        <a href=""><img src="" alt=""></a>
                        <a href=""><img src="" alt=""></a>
                        <a href=""><img src="" alt=""></a>
                    </div>
                    
                </div>

                <!-- Controls -->
                <a class="left item-control" href="#similar-product" data-slide="prev">
                <i class="fa fa-angle-left"></i>
                </a>
                <a class="right item-control" href="#similar-product" data-slide="next">
                <i class="fa fa-angle-right"></i>
                </a>
        </div>
    
    </div>
    <div class="col-sm-7">
        <div class="product-information"><!--/product-information-->
            <h2 class="upcase_detail">{{$product->product_name}}</h2>
            <img src="{{ asset('public/fontend/images/rating.png') }}" alt="" />
            <form id="form_product_detail" method="POST" >
                @csrf       
                <div>
                    <span class="price_detail">{{number_format($product->product_price)}} VNĐ</span>
                    <div class="group_input_detail">
                        <label style="color: #696763; margin:5px 20px 0 0">Số lượng:</label>
                        <div class="product_quantity_button">
                            <a class="product_quantity_down" onclick="up_down_quantity(this)"> - </a>
                            <input id="product_quantity_input" name="soluong" class="product_quantity_input" min="1" value="{{old('soluong',1)}}" autocomplete="off" size="2">
                            <a class="product_quantity_up" onclick="up_down_quantity(this)" > + </a>
                        </div>
                        
                        <input required name="product_id" type="hidden" value="{{$product->id}}">
                    </div>
                    <div class="group_btn_detail">
                        <button onclick="set_url(this)" data-url="{{ route('add-cart') }}"  class="btn btn-fefault cart" style="margin-left:0 ">
                            <i class="fa fa-shopping-cart"></i>
                            Thêm vào giỏ hàng
                        </button>
                        <div onclick="set_url(this)" data-url="{{ route('mua_ngay') }}"  class="btn btn-fefault cart">Mua ngay</div>
                    </div>
                    
                </div>
            </form>
            
            <p><b>Màu sắc:</b> In Stock</p>
            <p><b>Tình trạng:</b> còn hàng</p>
            <p><b>Thương hiệu:</b> {{$product->brand->brand_name}}</p>
            <a href=""><i class="fa fa-share"></i></a>
        </div><!--/product-information-->
        
    </div>
    <div class="desc_product col-sm-12 mt-10">
        <div class="bg-title">
            <h4 class="h4-text">Mô tả</h4>
        </div>
        <p class="pd-15">
            {{$product->product_desc}}
        </p>
    </div>
</div><!--/product-details-->

<div class="category-tab shop-details-tab shadow-box"><!--category-tab-->
    <div class="bg-title">
        <h4 class="h4-text">Đánh giá</h4>
    </div>
    
    <div class="tab-content">
        <div class="tab-pane fade active in" id="reviews" >
            <div class="col-sm-12">
                <ul>
                    <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                    <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                    <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                </ul>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                <p><b>Write Your Review</b></p>
                
                <form action="#">
                    <span>
                        <input type="text" placeholder="Your Name"/>
                        <input type="email" placeholder="Email Address"/>
                    </span>
                    <textarea name="" ></textarea>
                    <b>Rating: </b> <img src="" alt="" />
                    <button type="button" class="btn btn-default pull-right">
                        Submit
                    </button>
                </form>
            </div>
        </div>
        
    </div>
</div><!--/category-tab-->

<x-recommended :related="json_encode($related)"></x-recommended>
@endsection
