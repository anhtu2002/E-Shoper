<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $table = "orders_address";
    protected $fillable = [
        'user_id',
        'hovaten',
        'sodienthoai',
        'diachi',
        'diachicuthe',
        'macdinh',
    ];
}
