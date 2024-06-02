<x-layout_admin :title="'Danh sách danh mục sản phẩm'">
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Danh sách danh mục sản phẩm
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
                        <x-success>{{session('success')}} </x-success>        
                    @endif
                   
                    <thead>
                        <tr>
                            <th style="width:20px;">
                                <label class="i-checks m-b-none">
                                    <input type="checkbox"><i></i>
                                </label>
                            </th>
                            <th>Tên danh mục</th>
                            <th>Trạng thái</th>
                            <th>Cập nhật lần cuối</th>
                            <th style="width:30px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(count($all_cate) != 0)
                        @foreach ($all_cate as $cate)
                            <tr>
                                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                                <td>{{ucwords($cate->category_name)}} </td>
                                
                            @if ($cate->category_status == 0)
                                <td>
                                    <a href="{{ route('admin.change_status_category', ['cate_id'=> $cate->id]) }}">
                                        <span  style = "color: red;" class="status text-ellipsis">Ẩn</span>
                                    </a>
                                </td>
                            @else    
                                <td>
                                    <a href="{{ route('admin.change_status_category', ['cate_id'=> $cate->id]) }}">
                                        <span  style = "color: green;" class="status text-ellipsis">Hiển thị</span>
                                    </a>
                                </td>

                            @endif
                                <td><span class="text-ellipsis">{{$cate->updated_at}}  </span></td>
                                    <td>
                                        <a href="{{ route('admin.edit_category', ['cate_id'=> $cate->id]) }}" class="active" ui-toggle-class="">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>
                                        <a href="{{ route('admin.delete_category', ['cate_id'=> $cate->id]) }}" onclick="confirm_delete()" class="active" ui-toggle-class="">
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
