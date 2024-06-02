@props(['cates','brands'])

<div class="filter">
    <h2>Lọc </h2>
    <div class="panel-group category-products shadow-box" id="accordian"><!--category-productsr-->
        <form action="{{ route('filter') }}" method="GET" >
            @csrf
            <h4 class="form-filter" >Danh mục</h4>
            <select class="option-filter" name="cate_id" id="category-dropdown">
                    <option  value="0" @if(request('cate_id') == 0) selected @endif>Tất cả</option>
                @foreach ($cates as $cate)
                    <option  value="{{$cate->id}}" @if(request('cate_id') == $cate->id) selected @endif>{{$cate->category_name}}</option>
                    
                @endforeach
            </select>
            <h4 class="form-filter" >Thương hiệu</h4>
            <select class="option-filter" name="brand_id" id="brand-dropdown">
                    <option  value="0" @if(request('brand_id') == 0) selected @endif>Tất cả</option>
                @foreach ($brands as $brand)
                    <option  value="{{$brand->id}}"@if(request('brand_id') == $brand->id) selected @endif>{{$brand->brand_name}}</option>
                    
                @endforeach
            </select>
            <button type="submit" class="btn-filter">Lọc sản phẩm</button>
        </form>
        
    </div>
</div>

