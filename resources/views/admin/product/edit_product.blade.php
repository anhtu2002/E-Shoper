<x-layout_admin title="Chỉnh sửa thông tin sản phẩm">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Chỉnh sửa thông tin sản phẩm
                </header>

                <div class="panel-body">
                    <div class="position-center">

                        <form role="form" action="{{ route('admin.update_product', ['product_id'=> $data->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf

                            @if (session()->has('success'))
                                <x-success>{{session('success')}}</x-success>
                            @endif

                            @if($data)
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm:</label>
                                    <input type="text" class="form-control" name="product_name" id="exampleInputEmail1" required value="{{$data->product_name}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sản phẩm:</label>
                                    <textarea style="resize: none;" class="form-control" name="product_desc" id="exampleInputPassword1" required>{{$data->product_desc}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Hiển thị:</label>
                                    <select name="product_status" class="form-control input-sm m-bot15" required >
                                        @if ($data->product_status)
                                            <option value="1">Hiển thị</option>
                                            <option value="0">Ẩn</option>
                                        @else
                                            <option value="0">Ẩn</option>
                                            <option value="1">Hiển thị</option>
                                        @endif  
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Danh mục:</label>                                   
                                        @foreach ($category as $cate)
                                        <div class="wrap_row">
                                            <input class="a" type="checkbox" id="category{{$cate->id}}" name="category_id[]"  value="{{$cate->id}}"
                                                @if(in_array($cate->id, $id_cate)) 
                                                    checked 
                                                @endif
                                            >
                                            <label class="a" for="category{{$cate->id}}">{{$cate->category_name}}</label>
                                        </div>
                                        @endforeach
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Thương hiệu:</label>
                                    <select name="brand_id" class="form-control input-sm m-bot15" required>
                                        <option value="{{$data->brand->id}}">{{$data->brand->brand_name}}</option>
                                        @foreach ($brand as $bra)
                                            <option value="{{$bra->id}}">{{$bra->brand_name}}</option>
                                        @endforeach                             
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá sản phẩm (VNĐ):</label>
                                    <input type="number" class="form-control" name="product_price" id="exampleInputEmail1" required value="{{$data->product_price}}">
                                </div>
                                <div class="form-group">
                                    <label class="lable-img" for="img-product">Ảnh sản phẩm</label>
                                    <div class="img-wrap">
                                        <img id="img-pro" src="{{asset($data->product_image)}}" alt="">
                                        <input type="file" accept=".jpg, .jpeg, .png" name="product_image" id="img-product" style="display: none;" onchange="view_pre()" >
                                    </div>
                                </div>
                            @endif
                            <div class="d-flex parent">
                               <button type="submit" class="btn btn-info">Cập nhật</button>
                                <a class="cancel" href="{{ route('admin.all_product') }}">Hủy</a> 
                            </div>
                            
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    {{ $errors->first() }}
                                </div>
                            @endif
                        </form>
                        
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-layout_admin>

