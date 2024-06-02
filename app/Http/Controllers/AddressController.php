<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Validation\Rule;

class AddressController extends Controller
{
   public function add_new_address(Request $request){
    $address = $request->validate([
        'hovaten' => 'required|max:100',
        'sodienthoai' => 'required|numeric|digits:10',
        'tinh' => 'required',
        'huyen' => 'required',
        'xa' => 'required',
        'diachicuthe' => 'required|max:255',
    ]);
    $address['user_id'] =auth()->user()->id;
    if($request->macdinh == 'on'){
        $address['macdinh'] = 1;
    }

    Address::create($address);
    return view('pages.success_order');
   }
}
