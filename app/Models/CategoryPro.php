<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPro extends Model
{
    use HasFactory;
    protected $table = 'categorys';

    protected $fillable = [
        'category_name',
        'category_desc',
        'category_status',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class,'products_categorys', 'product_id', 'category_id');
    }
}
