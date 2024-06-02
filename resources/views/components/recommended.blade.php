@props(['related'])
<div class="recommended_items"><!--recommended_items-->
    <h2 class="title text-center">Sản phẩm tương tự</h2>

    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active">
                
                @if($related)
                    @foreach (json_decode($related, true) as $item)
                        <a href="{{ route('product.detail', ['product_id' => $item['id']]) }}">
                            <div class="col-sm-4 ">
                                <div class="product-image-wrapper shadow-box">
                                    <div class="single-products ">
                                        <div class="productinfo text-center">
                                            <div class="product-image">
                                                <img src="{{asset($item['product_image'])}}" alt="" />
                                            </div>
                                            <h2>{{number_format($item['product_price'])}}VNĐ</h2>
                                            <p>{{$item['product_name']}}</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @else
                    <div class="empty">
                        <div class="empty-content">
                            <h4>không có sản phẩm nào</h4>
                        </div>
                    </div>
                @endif
                    
            </div>
        </div>
        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>
    </div>
</div><!--/recommended_items-->