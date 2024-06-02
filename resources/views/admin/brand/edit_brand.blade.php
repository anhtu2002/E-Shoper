<x-layout_admin title="Chỉnh sửa thương hiệu sản phẩm">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Chỉnh sửa thương hiệu sản phẩm
                </header>

                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{ route('admin.update_brand', ['brand_id'=> $data->id]) }}" method="POST">
                            @csrf
                            
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên thương hiệu:</label>
                                <input type="text" class="form-control" name="brand_name" id="exampleInputEmail1" required value="{{$data->brand_name}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả:</label>
                                <textarea style="resize: none;" class="form-control" name="brand_desc" id="exampleInputPassword1" required>{{$data->brand_desc}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Hiển thị</label>
                                <select name="brand_status" class="form-control input-sm m-bot15">
                                    @if($data->brand_status == 0)
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiển thị</option>
                                    @else
                                    <option value="1">Hiển thị</option>
                                    <option value="0">Ẩn</option>
                                    @endif

                                </select>
                            </div>
                            <div class="d-flex parent">
                                <button type="submit" class="btn btn-info">Cập nhật</button>
                                <a class="cancel" href="{{ route('admin.all_brand') }}">Hủy</a>
                            </div>
                        </form>

                         @if ($errors->any())
                            <h3 class="alert alert-danger">{{$errors->first()}}</h3>                            
                        @endif
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-layout_admin>

