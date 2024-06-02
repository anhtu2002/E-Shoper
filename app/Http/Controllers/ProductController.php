<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\CategoryPro;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    //
    public function add_product()
    {
        $cates = CategoryPro::where('category_status', 1)->get();
        $brand = Brand::where('brand_status', 1)->get();
        return view('/admin/product/add_product')->with(["cates"=>$cates, "brands" => $brand]);
    }
    public function all_product()
    {
        $all_product = Product::with('brand','categories')->get();
        return view('/admin/product/all_product')->with('all_product', $all_product);
    }
    public function save_product(Request $request)
    {
        $data = $request->validate([
            'product_name' => 'required|max:255',
            'product_desc' => 'required|max:10000',
            'product_status' => [
                'required',
                Rule::in('0','1'),
            ],
            'category_id' => 'required|exists:categorys,id',
            'brand_id' => 'required|exists:brands,id',
            'product_price' => 'required|numeric',
            'product_image' => 'required|mimes:jpg,jpeg,png|max:2048',
        ]);

        if($request->hasFile('product_image')){
            $fileName = uniqid().'.'.$request->file('product_image')->extension();
            $path = 'storage/app/'. 
                    Storage::putFileAs('public',$request->file('product_image'), $fileName);

            $product = Product::create([
                'product_name' => $data['product_name'],
                'product_desc' => $data['product_desc'],
                'brand_id' => $data['brand_id'],
                'product_status' => $data['product_status'],
                'product_price' => $data['product_price'],
                'product_image' => $path,
            ]);

            $product->categories()->attach($data['category_id']);

            return redirect()->route('admin.add_product')->with('success', 'Thêm sản phẩm thành công!'); 
        }
    }
    public function change_status_product($product_id)
    {
        $product = Product::find($product_id);
        if($product){
            $product->product_status = $product->product_status == '1' ? '0' : '1';
            $product->save(); 
        }
        return redirect()->route('admin.all_product')->with('success','Thay đổi trạng thái thành công!');
    }

    public function edit_product($product_id)
    {
        $data = Product::find($product_id);
        $id_cate = [];
        foreach($data->categories as $category){
            $id_cate[] = $category->id;
        }
        $category = CategoryPro::where('category_status', '1')->get();
        $brand = Brand::where('brand_status', '1')->get();
        return view('/admin/product/edit_product')->with(["data"=>$data,"category"=>$category, "brand" => $brand, 'id_cate' => $id_cate]);
    }
    public function update_product(Request $request, $product_id)
    {
        $product = Product::find($product_id);
        if($product){
            $data = $request->validate([
                'product_name' => 'required|max:255',
                'product_desc' => 'required|max:10000',
                'product_status' => [
                    'required',
                    Rule::in('0', '1'),
                ],
                'category_id' => 'required|array',
                'category_id.*' => 'exists:categorys,id',
                'brand_id' => 'required|exists:brands,id',
                'product_price' => 'required|numeric',
                'product_image' => 'nullable|mimes:jpg,jpeg,png|max:2048',
            ]);
            
            $path = $product->product_image;
            if ($request->hasFile('product_image')) {
                $old_path = str_replace('storage/app/public', 'public', $path);
                if(Storage::exists($old_path))
                    Storage::delete($old_path); 

                $fileName = uniqid() . '.' . $request->file('product_image')->extension();
                $path = 'storage/app/' .
                        Storage::putFileAs('public', $request->file('product_image'), $fileName);
            }

            $product->update(array_merge($data, ['product_image' => $path]));

            $product->categories()->sync($data['category_id']);

            return redirect()->route('admin.all_product')->with('success', 'Chỉnh sửa sản phẩm thành công!');
        }
        
    }
    public function delete_product($product_id)
    {
        $product = Product::find($product_id);
        if ($product) {
            $path = $product->product_image;
            $old_path = str_replace('storage/app/public', 'public', $path);
            if (Storage::exists($old_path)) {
                Storage::delete($old_path);
            }

            $product->categories()->detach();

            $product->delete();
            
            return redirect()->route('admin.all_product')->with('success', 'Xoá sản phẩm thành công!');
        } else {
            return redirect()->route('admin.all_product')->with('error', 'Không tìm thấy sản phẩm!');
        }

    }
}
