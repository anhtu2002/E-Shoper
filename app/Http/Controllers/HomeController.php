<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\CategoryPro;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //index
    public function index(){
        $cates = CategoryPro::where('category_status', 1)->get();
        $brands = Brand::where('brand_status', 1)->get();
        $products = Product::where('product_status', 1)->get();
        return view('pages.home')->with(["cates" => $cates, "brands" => $brands, "products" => $products]);
    }

    public function filter(Request $request)
    {
        $cates = CategoryPro::where('category_status', 1)->get();
        $brands = Brand::where('brand_status', 1)->get();
        $data = $request->validate([
            'cate_id' => 'required|integer',
            'brand_id' => 'required|integer', 
        ]);
        $cate_id = $data['cate_id'];
        $brand_id = $data['brand_id'];
        $products = Product::filterCateBrand($cate_id, $brand_id)->get();

        return view('pages.home')->with(["cates" => $cates, "brands" => $brands, "products" => $products]);
    }
    public function product_detail($product_id){
        $cates = CategoryPro::where('category_status', 1)->get();
        $brands = Brand::where('brand_status', 1)->get();
        $product = Product::find($product_id);

        $related = Product::whereHas('brand', function ($query) use ($product) {
            $query->where('brand_id', $product->brand->id);
        })
            ->where('products.id', '!=', $product_id) // Loại trừ sản phẩm hiện tại
            ->where('product_status', 1)
            ->take(9) // Giới hạn số lượng sản phẩm
            ->get();

        return view('pages.product_detail')->with(["cates" => $cates, "brands" => $brands, "product" => $product ,"related" => $related ]);
    }
}
