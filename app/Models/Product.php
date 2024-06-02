<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'product_name',
        'product_desc',
        'product_status',
        'brand_id',
        'product_price',
        'product_image',
    ];

    public function scopeFilterCateBrand($query, $cate_id, $brand_id)
    {
        if ($cate_id == 0 && $brand_id != 0) {
            return $query->where('brand_id', $brand_id)
                        ->where('product_status', 1);
        } 
        
        elseif ($cate_id != 0 && $brand_id == 0) {
            return $query->whereHas('categories', function ($query) use ($cate_id) {
                $query->where('categorys.id', $cate_id)
                    ->where('product_status', 1);
            });
        } 
        
        elseif ($cate_id != 0 && $brand_id != 0) {
            return $query->whereHas('categories', function ($query) use ($cate_id) {
                $query->where('categorys.id', $cate_id);
            })->where('brand_id', $brand_id)
                ->where('product_status', 1);
        }
            return $query->where('product_status', 1);

        
    }

    public function categories()
    {
        return $this->belongsToMany(CategoryPro::class,'products_categorys', 'product_id', 'category_id');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function orders(){
        return $this->belongsToMany(Order::class, 'orders_products', 'order_id', 'product_id' );
    }
}
