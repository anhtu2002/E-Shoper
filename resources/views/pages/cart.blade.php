@extends('welcom')
@section('title','Giỏ hàng')
@section('content')

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info shadow-box">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image text-center">Ảnh</td>
                        <td class="description text-center">Tên sản phẩm</td>
                        <td class="price text-center">Giá</td>
                        <td class="quantity text-center">Số lượng</td>
                        <td class="total text-center">Tổng</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @if (!count($carts) == 0)
                        @foreach ($carts as $cart)
                            <tr>
                                <td class="cart_product text-center">
                                    <div class="wrap-img-cart">
                                        <a href="{{ route('product.detail', ['product_id'=> $cart->product_id]) }}"><img src="{{ asset($cart->product->product_image) }}" alt=""></a>
                                    </div>
                                    
                                </td>
                                <td class="cart_description text-center">
                                    <h4 class="mg-0"><a href="{{ route('product.detail', ['product_id'=> $cart->product_id]) }}">{{$cart->product->product_name}}</a></h4>
                                </td>
                                <td class="cart_price text-center">
                                    <p class="mg-0">{{number_format($cart->product->product_price)}}</p ><p class="mg-0" style="font-size: 14px">VNĐ</p>
                                </td>
                                <td class="cart_soluong center">
                                    <div class="cart_quantity_button">
                                        <a class="cart_quantity_down" data-cart-id="{{$cart->id}}" data-url="{{route('update-cart', ['action'=>'decrease','cart_id'=>$cart->id]) }}"> - </a>
                                        <input class="cart_quantity_input" data-cart-id="{{$cart->id}}" type="text" name="quantity" value="{{$cart->soluong}}" autocomplete="off" size="2">
                                        <a class="cart_quantity_up" data-cart-id="{{$cart->id}}" data-url="{{route('update-cart', ['action'=>'increase','cart_id'=>$cart->id]) }}" > + </a>
                                    </div>
                                </td>
                                <td class="cart_total text-center">
                                    <p data-cart-id="{{$cart->id}}" class="cart_total_price mg-0">{{number_format($cart->product->product_price * $cart->soluong)}}</p><p>VNĐ</p>
                                </td>
                                <td class="cart_delete_icon text-center">
                                    <a class="cart_quantity_delete" href="{{ route('delete-cart', ['cart_id'=>$cart->id]) }}"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td></td>
                            <td class="empty_cart">
                                <img src="{{asset('public/fontend/images/cart-empty.png')}}" alt=""> 
                                
                            </td>
                            <td>
                                <h3>Không có sản phẩm nào trong giỏ hàng !</h3>
                            </td>
                        </tr>                       
                    @endif
                    
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->

<section >
    <div class="container">
        <div class="voucher_order shadow-box">
            <div class="order-title">
                <i class="fa-solid fa-money-bill"></i>
                Thanh toán
            </div>
            <div class="giamgiavoucher" style="padding-top: 15px">
                <h5>Tổng({{count($carts)}} sản phẩm):</h5>
                <div>
                    <h5 id="tonggiohang" style="color: rgb(250, 90, 16)">{{number_format($total)}}</h5>
                    <h5 class="vnd">VNĐ</h5>
                </div>
                <a href="{{ route('checkout') }}">
                    <div class="btn-mua" style="margin-left: 30px">
                        Mua hàng
                    </div>
                </a>
                
            </div>
        </div>
    </div>
    
</section><!--/#do_action-->

@endsection