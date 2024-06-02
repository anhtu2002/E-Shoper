<x-layout_admin :title="'Thêm danh mục sản phẩm'">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm danh mục sản phẩm
                </header>

                <div class="panel-body">
                    <div class="position-center">

                        <form role="form" action="{{route('admin.save_category')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên danh mục:</label>
                                <input type="text" class="form-control" name="category_name" id="exampleInputEmail1" required placeholder="Tên danh mục....." value="{{old('category_name')}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả:</label>
                                <textarea style="resize: none;" class="form-control" name="category_desc" id="exampleInputPassword1" required placeholder="Mô tả.....">{{old('category_desc')}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Trạng thái</label>
                                <select name="category_status" class="form-control input-sm m-bot15">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiển thị</option>
                                </select>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    {{ $errors->first() }}
                                </div>
                            @endif
                            <button type="submit" class="btn btn-info">Thêm</button>
                        </form>
                        @if(session()->has('success'))
                            <x-success>{{session('success')}}</x-success>
                        @endif
                    </div>

                </div>
            </section>

        </div>

    </div>
</x-layout_admin>

