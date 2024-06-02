@extends('welcom')
@section('title', 'Trang chủ | E-Shoppe')
@section('content')
<div class="features_items"><!--features_items-->
    <h2 class="title text-center">Sản phẩm nổi bật</h2>
    
    @if (count($products) == 0)
    <div class="empty">
        <div class="empty-content">
            <h4>rất tiếc! không có sản phẩm nào</h4>
        </div>
    </div>
        
    @else
        @foreach ($products as $product)
            <a href="{{ route('product.detail', ['product_id' => $product->id]) }}">
                <div class="col-sm-4 ">
                    <div class="product-image-wrapper shadow-box">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <div class="product-image">
                                    <img src="{{asset($product->product_image)}}" alt="" />
                                </div>
                                <h2>{{number_format($product->product_price)}}VNĐ</h2>
                                <p>{{$product->product_name}}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                            </div>
                        </div>
                        <div class="choose">
                            <ul class="nav nav-pills nav-justified">
                                <li><a href="#"><i class="fa fa-plus-square"></i>Thêm vào yêu thích</a></li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </a>
            
        @endforeach
    @endif
    
</div><!--features_items-->

<div class="category-tab"><!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tshirt" data-toggle="tab">T-Shirt</a></li>
            <li><a href="#blazers" data-toggle="tab">Blazers</a></li>
            <li><a href="#sunglass" data-toggle="tab">Sunglass</a></li>
            <li><a href="#kids" data-toggle="tab">Kids</a></li>
            <li><a href="#poloshirt" data-toggle="tab">Polo shirt</a></li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade active in" id="tshirt">
            <div class="col-sm-3">
                <div class="product-image-wrapper shadow-box">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="public/fontend/images/gallery1.jpg" alt="" />
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="blazers">
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="public/fontend/images/gallery1.jpg" alt="" />
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="sunglass">
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="public/fontend/images/gallery2.jpg" alt="" />
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--/category-tab-->
@endsection