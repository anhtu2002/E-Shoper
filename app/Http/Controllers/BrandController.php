<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;


class BrandController extends Controller
{
    //
    public function add_brand()
    {
        return view('/admin/brand/add_brand');
    }
    public function all_brand()
    {
        $all_brand = Brand::all();

        return view('/admin/brand/all_brand')->with('all_brand', $all_brand);
    }
    public function save_brand(Request $request)
    {
        $data = $request->validate([
            'brand_name' => 'required|max:255|unique:brands,brand_name',
            'brand_desc' => 'required|max:10000',
            'brand_status' => [
                'required', 
                Rule::in(['0', '1']),
            ],
        ]);

        Brand::create($data);
        session()->flash('success', 'Thêm thương hiệu thành công!');
        return redirect()->route('admin.add_brand');
    }
    public function change_status_brand($brand_id)
    {
       $brand = Brand::find($brand_id);
       if($brand){
            $brand->brand_status = $brand->brand_status == 1 ? '0' : '1';
            $brand->save();

       }
        return redirect()->route('admin.all_brand')->with('success', 'Thay đổi trạng thái thành công!');
    }

    public function edit_brand($brand_id)
    {
        $brand = Brand::find($brand_id);
        return view('/admin/brand/edit_brand')->with("data", $brand);
    }
    public function update_brand(Request $request, $brand_id)
    {
        $brand = Brand::find($brand_id);
        if($brand){
           $data = $request->validate([
                'brand_name' => [
                    'required',
                    'max:255',
                    Rule::unique('brands')->ignore($brand),
                ],
                'brand_desc' => 'required|max:10000',
                'brand_status' => [
                    'required',
                    Rule::in(['0' , '1']),
                ],
            ]); 

            $brand->update($data);
        }
        
        return redirect()->route('admin.all_brand')->with('success', 'Cập nhật thương hiệu thành công!');
    }
    public function delete_brand($brand_id)
    {
        Brand::destroy($brand_id);
        return redirect()->route('admin.all_brand')->with('success', 'Xóa thương hiệu thành công!');
    }
}
