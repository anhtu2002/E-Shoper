@extends('welcom')
@section('title', 'Thanh toán | E-Shoppe')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Check out</li>
            </ol>
        </div><!--/breadcrums-->
        <div class="xBNaac"></div>
        <div class="address_order shadow-box">
            <div class="order-title">
                <i class="fa-solid fa-location-dot"></i>Địa chỉ nhận hàng
            </div>
            <div class="wrap-table">
                <table style="width:100%">
                    <td style="width:20% ;text-align: left; font-weigth:bold;padding-right:30px">
                        <div style="display: flex">
                            <h5 >hhhhhhhhhhhhhhh</h5>
                        </div>
                    </td>
                                            
                    <td style="width:60% ;text-align: left;">
                        <div class="wrap-word"> hhhhhhhhhhhhhhhhhhhhhhh</div>
                        <div class="wrap-word">hhhhhhhhhhhhhhhhhhhh</div>
                    </td>
                    <td style="width:10%"><h4>Mặc định</h4></td>
                    <td style="width:10% ; cursor: pointer; color:rgb(0, 183, 255)" data-toggle="modal" data-target="#modal_address_list">Thay đổi</td>
                </table>
            </div>
        </div>
        <div class="shadow-box">
            <div class="product_order">
                <div class="order-title">
                    Sản phẩm
                </div>
                <div class="wrap-table">
                    <table style="width:100%" id="tbl_sanpham">
                        <tr>
                            <th>Thông tin</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                        </tr>
                        <tr>
                            <td style="width:50%;text-align: left;">ffffffffffffffff</td>
                            <td style="width:20%">ffffffffffffffff</td>
                            <td style="width:10%">ffffffffffffffffff</td>
                            <td style="width:20%">fffffffffffffffff</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="ghichu_order ">
                <div class="wrap_row1">
                    <div class="ghichu_donhang">
                        <h5>Ghi chú:</h5>
                        <input name="message"  placeholder="Lưu ý cho người bán, người  giao hàng,...">
                    </div>
                    <div class="phivanchuyen">
                        <h5>Phí vận chuyển:</h5>
                        <div>
                            <h5 id="phivanchuyen" style="color: rgb(250, 90, 16)">25.000</h5>
                            <h5 class="vnd">VNĐ</h5>
                        </div>
                    </div>
                </div>
                <div class="tongtienbandau">
                    <h5>Tổng số tiền:</h5>
                    <div>
                        <h5 id="tongtienbandau" style="color: rgb(250, 90, 16)">60.000</h5>
                        <h5 class="vnd">VNĐ</h5>
                    </div>
                </div>	
            </div>
        </div>
        
        <div class="voucher_order shadow-box">
            <div class="order-title">
                <i class="fa-solid fa-ticket"></i>
                E-Voucher
            </div>
            <div class="pick_voucher">
                <h5>Chọn voucher</h5> 
            </div>
            <div class="giamgiavoucher">
                <h5>Voucher:</h5>
                <div>
                    <h5 id="giamgia" style="color: rgb(250, 90, 16)">-60.000</h5>
                    <h5 class="vnd">VNĐ</h5>
                </div>
            </div>
        </div>
        <div class="shiping_order shadow-box">
            <div class="order-title">
                <i class="fa-regular fa-credit-card"></i>
                Phương thức thanh toán
            </div>
            <div class="shipping_pick">
                <div class="method">Thanh toán khi nhận hàng</div>
                <h5>Thay đổi</h5> 
            </div>
            <div class="final-order">
                <table class="bill_final">
                    <tbody>
                        <tr>
                            <td>Tổng tiền hàng:</td>
                            <td><input style="color: red; padding-right:10px" readonly type="text" value="20.000"></td>
                            <td class="vnd">VNĐ</td>
                        </tr>
                        <tr>
                            <td>Phí vận chuyển:</td>
                            <td><input style="color: red; padding-right:10px" readonly type="text" value="20.000"></td>
                            <td class="vnd">VNĐ</td>
                        </tr>
                        <tr>
                            <td>Tổng thanh toán:</td>
                            <td><input style="color: red; padding-right:10px" readonly type="text" value="20.000"></td>
                            <td class="vnd">VNĐ</td>
                        </tr>
                        
                    </tbody>
                    

                </table>
                <button>ĐẶT HÀNG</button>
            </div>
            
        </div>

        <!-- Modal -->
        <div class="modal fade"  id="modal_address_list" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal_center_sm">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel" style="font-size: 20px">Địa chỉ của tôi</h5>
                </div>
                <div class="modal-body">
                    <div class="wrap_item_address">
                        <table class="item_address">
                            @if (count($address))
                                @foreach ($address as $item)
                                    <tr class="row_address">
                                        <td ><input style="width: 30px; height: 18px" autocomplete="off" type="radio" name="address_order_picked"></td>
                                        <td >
                                            <div style="display: flex">
                                                <h5 class="address_name">{{$item->hovaten}}</h5>
                                                <h5>{{$item->sodienthoai}}</h5>
                                            </div>
                                            <div class="wrap-word"> {{$item->diachicuthe}}</div>
                                            <div class="wrap-word">{{$item->diachi}}</div>
                                            @if ($item->macdinh)
                                            <div class="macdinh_address">Mặc định</div> 
                                            @endif
                                        </td>
                                        <td >
                                            <h5 style="text-align: center; width:100px">Cập nhật</h5>
                                        </td>
                                    </tr>
                                @endforeach     
                            @endif
                            
                        </table>
                        <button type="button" class="btn_add_address" data-dismiss="modal" data-toggle="modal" data-target="#modal_address_new">
                            <i class="fa-solid fa-plus"></i>
                            Thêm địa chỉ mới
                        </button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn_close_address" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn_confirm_address">Xác nhận</button>
                </div>
                </div>
            </div>
        </div>
        {{--  --}}
        <div class="" id="modal_address_new" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal_center_sm">
                <form action="{{ route('add_new_address') }}" method="POST">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel" style="font-size: 20px">Địa chỉ mới</h5>
                        </div>
                        <div class="modal-body">
                            <div class="wrap_address_new">
                                
                                <input autocomplete="off" required name="hovaten" type="text" placeholder="Họ và tên: *">
                                <input autocomplete="off" required name="sodienthoai" type="text" placeholder="Số điện thoại: *">
                                <div class="group_select">
                                    <select required name="tinh" class="" id="city" aria-label=".form-select-sm">
                                        <option value="" >Tỉnh/Thành phố: *</option>           
                                    </select>
                                            
                                    <select style="margin: 5px" required name="huyen" class=" " id="district" aria-label=".form-select-sm">
                                        <option value="" selected>Quận/Huyện: *</option>
                                    </select>

                                    <select required name="xa" class="" id="ward" aria-label=".form-select-sm">
                                        <option value="" selected>Phường/Xã: *</option>
                                    </select>
                                </div>
                                
                                <input autocomplete="off" required name="diachicuthe" type="text" placeholder="Địa chỉ cụ thể (Số nhà, đường,....): *">
                                <div class="wrap_checkbox" >
                                    <input autocomplete="off" style="width:fit-content; margin:0; padding:0; height:fit-content" type="checkbox" name="macdinh"> 
                                    <label for="">Đặt làm mặc định</label>
                                </div> 
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn_close_address" data-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn_confirm_address">Thêm</button>
                        </div>
                    
                    </div>
                </form>
            </div>
        </div>
        
        {{-- <div class="shopper-informations shadow-box">
            <div class="row">
                <div class="col-sm-6 clearfix">
                    <div class="bill-to">
                        <p>Thông tin người nhận</p>
                        <div class="form-one">
                            <form>
                                <input type="text" placeholder="Họ và tên: *">
                                <input type="text" placeholder="Số điện thoại: *">
                                <select class="form-select form-select-sm " id="city" aria-label=".form-select-sm">
                                    <option value="" selected>Tỉnh/Thành phố: *</option>           
                                </select>
                                        
                                <select class="form-select form-select-sm " id="district" aria-label=".form-select-sm">
                                    <option value="" selected>Quận/Huyện: *</option>
                                </select>

                                <select class="form-select form-select-sm" id="ward" aria-label=".form-select-sm">
                                    <option value="" selected>Phường/Xã: *</option>
                                </select>
                                <input type="text" placeholder="Địa chỉ cụ thể (Số nhà, đường,....): *">
                            </form>
                        </div>
                        
                    </div>
                </div>				
            </div>
        </div> --}}
        
    </div>  

</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script>
    var citis = document.getElementById("city");
    var districts = document.getElementById("district");
    var wards = document.getElementById("ward");
    var Parameter = {
        url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json", 
        method: "GET", 
        responseType: "json", 
    };
    var promise = axios(Parameter);
    promise.then(function (result) {
        renderCity(result.data);
    });

    function renderCity(data) {
        for (const x of data) {
            citis.options[citis.options.length] = new Option(x.Name, x.Name);
        }
        citis.onchange = function () {
            district.length = 1;
            ward.length = 1;
            if(this.value != ""){
                const result = data.filter(n => n.Name === this.value);

                for (const k of result[0].Districts) {
                    district.options[district.options.length] = new Option(k.Name, k.Name);
                }
            }
        };
        district.onchange = function () {
            ward.length = 1;
            const dataCity = data.filter((n) => n.Name === citis.value);
            if (this.value != "") {
                const dataWards = dataCity[0].Districts.filter(n => n.Name === this.value)[0].Wards;

                for (const w of dataWards) {
                    wards.options[wards.options.length] = new Option(w.Name, w.Name);
                }
            }
        };
    }
</script>
@endsection