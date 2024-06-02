<x-layout_admin :title="'Chỉnh sửa danh mục sản phẩm'">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Chỉnh sửa danh mục sản phẩm
                </header>

                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{ route('admin.update_category', ['cate_id'=> $category->id ]) }}" method="POST">
                            @csrf
                            
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên danh mục:</label>
                                <input type="text" class="form-control" name="category_name" id="exampleInputEmail1" required value="{{$category->category_name}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả:</label>
                                <textarea style="resize: none;" class="form-control" name="category_desc" id="exampleInputPassword1" required >{{$category->category_desc}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Trạng thái</label>
                                <select name="category_status" class="form-control input-sm m-bot15">
                                    @if($category->category_status == "0")
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
                                <a class="cancel" href="{{ route('admin.all_category') }}">Hủy</a>
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

