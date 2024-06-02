<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';

    public function order_products() {
        return $this->hasMany(Product::class);
    }
    public function order_address(){
        return $this->hasOne(Address::class);
    }
    public function user(){
        return $this->hasOne(User::class);
    }
}
