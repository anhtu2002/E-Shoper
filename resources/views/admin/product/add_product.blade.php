<x-layout_admin title="Thêm sản phẩm">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm sản phẩm
                </header>

                <div class="panel-body">
                    <div class="position-center">
                        @if (session()->has('success'))
                            <x-success>{{session('success')}}</x-success>
                        @endif

                        <form action="{{ route('admin.save_product') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sản phẩm:</label>
                                <input type="text" class="form-control" name="product_name" id="exampleInputEmail1" required placeholder="Tên danh mục....." value="{{old('product_name')}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả sản phẩm:</label>
                                <textarea style="resize: none;" class="form-control" name="product_desc" id="exampleInputPassword1" required placeholder="Mô tả.....">{{old('product_desc')}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Trạng thái:</label>
                                <select name="product_status" class="form-control input-sm m-bot15" required>
                                    <option value="0" {{ old('product_status') == '0' ? 'selected' : '' }}>Ẩn</option>
                                    <option value="1" {{ old('product_status') == '1' ? 'selected' : '' }}>Hiển thị</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Danh mục:</label>
                                @foreach ($cates as $cate)
                                    <div class="wrap_row">
                                        <input class="a" type="checkbox" id="category{{$cate->id}}" name="category_id[]"  value="{{$cate->id}}">
                                        <label class="a" for="category{{$cate->id}}">{{$cate->category_name}}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Thương hiệu:</label>
                                <select name="brand_id" class="form-control input-sm m-bot15" required>
                                    <option value=""></option>
                                    @foreach ($brands as $brand)
                                        <option value="{{$brand->id}}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>{{ucwords($brand->brand_name)}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá sản phẩm (VNĐ):</label>
                                <input type="number" class="form-control" name="product_price" id="exampleInputEmail1" required value="{{old('product_price')}}" >
                            </div>
                            <div class="form-group">
                                <label class="lable-img" for="img-product">Ảnh sản phẩm</label>
                                <div class="img-wrap">
                                    <img id="img-pro" src="" alt="">
                                    <input type="file" required accept=".jpg, .jpeg, .png" name="product_image" id="img-product" style="display: none;" onchange="view_pre()" value="{{old('product_image')}}">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-info">Thêm</button>
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




