<?php

namespace App\Http\Controllers;

use App\Models\CategoryPro;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryProController extends Controller
{
    //
    public function add_cate()
    {
        return view('/admin/category/add_category');
    }
    public function all_cate()
    {
        $all_cate = CategoryPro::all();
        return view('/admin/category/all_category')->with('all_cate', $all_cate);
    }
    public function save_cate(Request $request)
    {

        $data = $request->validate([
            'category_name' => 'required|max:255|unique:categorys,category_name',
            'category_desc' => 'required|max:10000',
            'category_status' => ['required',Rule::in(['0', '1']),
            ],
        ]);
       
        CategoryPro::create($data);
        session()->flash('success','Thêm danh mục thành công!');
        return redirect()->route('admin.add_category');

    }
    public function change_status_cate($cate_id){
        $category = CategoryPro::find($cate_id);
        if ($category) {
            $category->category_status = $category->category_status == '1' ? '0' : '1';
            $category->save();
            
        }
        return redirect()->route('admin.all_category')->with('success','Thay đổi trạng thái thành công!');
    }

    public function edit_cate($cate_id)
    {
        $category = CategoryPro::find($cate_id);
        return view('/admin/category/edit_category')->with("category", $category);
    }
    public function update_cate(Request $request, $cate_id)
    { 
        $category = CategoryPro::find($cate_id);

        if($category){
            $data = $request->validate([
                'category_name' => [
                    'required',
                    'max:255',
                    Rule::unique('categorys')->ignore($category->id),
                ],
                'category_desc' => 'required|max:10000',
                'category_status' => [
                    'required',
                    Rule::in(['0', '1']),
                ],
            ]);
            $category->update($data);
        }
        return redirect()->route('admin.all_category')->with('success', 'Chỉnh sửa thành công!') ;
    }
    public function delete_cate($cate_id)
    {
        CategoryPro::destroy($cate_id);

        return redirect()->route('admin.all_category')->with('success', 'Xóa thành công!');
    }
    

    //filter home 
    public function filter($cate_id)
    {
        return 'ok';
    }
}
