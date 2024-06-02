<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //
    public function checkout(){
        $user_id = auth()->user()->id;
        $address = Address::where('user_id', $user_id)->get();
        return view('pages.checkout')->with('address',$address);
    }
}
