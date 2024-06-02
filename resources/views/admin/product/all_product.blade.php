<x-layout_admin title="Danh sách sản phẩm">
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Danh sách sản phẩm
            </div>
            <div class="row w3-res-tb">
                <div class="col-sm-5 m-b-xs">
                    <select class="input-sm form-control w-sm inline v-middle">
                        <option value="0">Bulk action</option>
                        <option value="1">Delete selected</option>
                        <option value="2">Bulk edit</option>
                        <option value="3">Export</option>
                    </select>
                    <button class="btn btn-sm btn-default">Apply</button>
                </div>
                <div class="col-sm-4">
                </div>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input type="text" class="input-sm form-control" placeholder="Search">
                        <span class="input-group-btn">
                            <button class="btn btn-sm btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped b-t b-light">
                    @if (session()->has('success'))
                        <x-success>{{session('success')}}</x-success>
                    @endif
                    <thead>
                        <tr>
                            <th style="width:20px;">
                                <label class="i-checks m-b-none">
                                    <input type="checkbox"><i></i>
                                </label>
                            </th>
                            <th>Tên sản phẩm</th>
                            <th>Danh mục</th>
                            <th>Thương hiệu</th>
                            <th>Giá sản phẩm</th>
                            <th>Ảnh</th>
                            <th>Trạng thái</th>
                            <th style="width:30px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($all_product))
                            @foreach ($all_product as $product)
                                <tr>
                                    <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                                    <td>{{$product->product_name }}</td>
                                    <td>
                                        @foreach ($product->categories as $category)
                                            <div>{{$category->category_name}}</div>
                                        @endforeach
                                        
                                    </td>
                                    <td>{{$product->brand->brand_name}}</td>
                                    <td>{{number_format($product->product_price)  ."VNĐ"}}</td>
                                    <td><div style="max-width: 200px"><img style="object-fit: cover;width:100%;max-height: 80px;" src="{{ asset($product->product_image) }}" alt=""></div></td>
                                    @if ($product->product_status)
                                        <td>
                                            <a href="{{ route('admin.change_status_product', ['product_id'=>$product->id]) }}">
                                                <span  style = "color: green;" class="status text-ellipsis">Hiển thị</span>
                                            </a>
                                        </td>
                                    @else
                                        <td>
                                            <a href="{{ route('admin.change_status_product', ['product_id'=>$product->id]) }}">
                                                <span  style = "color: red;" class="status text-ellipsis">Ẩn</span>
                                            </a>
                                        </td>
                                    @endif
                                    <td>
                                        <a href="{{ route('admin.edit_product', ['product_id'=>$product->id]) }}" class="active" ui-toggle-class="">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>
                                        <a href="{{ route('admin.delete_product', ['product_id'=>$product->id]) }} " onclick="confirm_delete()" class="active" ui-toggle-class="">
                                            <i class="fa fa-times text-danger text"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="text-warning text-lg" colspan="4">Không có dữ liệu</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <footer class="panel-footer">
                <div class="row">

                    <div class="col-sm-5 text-center">
                        <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                    </div>
                    <div class="col-sm-7 text-right text-center-xs">
                        <ul class="pagination pagination-sm m-t-none m-b-none">
                            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                            <li><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                            <li><a href="">4</a></li>
                            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</x-layout_admin>

