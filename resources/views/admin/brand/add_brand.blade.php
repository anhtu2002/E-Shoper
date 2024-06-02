
<x-layout_admin>
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                @if (session()->has('success'))
                    <x-success>{{session('success')}}</x-success>
                @endif
                <header class="panel-heading">
                    Thêm thương hiệu sản phẩm
                </header>

                <div class="panel-body">
                    <div class="position-center">

                        <form role="form" action="{{route('admin.save_brand')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên thương hiệu:</label>
                                <input type="text" class="form-control" name="brand_name" id="exampleInputEmail1" required placeholder="Tên danh mục.....">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả:</label>
                                <textarea style="resize: none;" class="form-control" name="brand_desc" id="exampleInputPassword1" required placeholder="Mô tả....."></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Trạng thái</label>
                                <select name="brand_status" class="form-control input-sm m-bot15">
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
                        
                    </div>

                </div>
            </section>

        </div>

    </div>
</x-layout_admin>

