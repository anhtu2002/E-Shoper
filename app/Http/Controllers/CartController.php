<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function add_cart(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required|exists:products,id',
            'soluong' => 'required|integer'
        ]);

        $data['user_id'] = auth()->user()->id;

        $cartItem = Cart::where('user_id', $data['user_id'])
            ->where('product_id', $data['product_id'])
            ->first();
        if ($cartItem) {
            $cartItem->soluong += $data['soluong'];
            $cartItem->save();
        } else {
            Cart::create($data);
        }
        
        return redirect()->back()->withInput()->with('success', 'Thêm vào giỏ hàng thành công');
        
    }
    public function mua_ngay(Request $request){
        $data = $request->validate([
            'product_id' => 'required|exists:products,id',
            'soluong' => 'required|integer'
        ]);

        $data['user_id'] = auth()->user()->id;

        $cartItem = Cart::where('user_id', $data['user_id'])
        ->where('product_id', $data['product_id'])
        ->first();
        if ($cartItem) {
            $cartItem->soluong += $data['soluong'];
            $cartItem->save();
        } else {
            Cart::create($data);
        }
        return redirect()->route('cart')->with('success', 'Thêm vào giỏ hàng thành công');
    }
    public function cart()
    {
        $user_id = auth()->user()->id;
        $carts = Cart::where('user_id', $user_id)->orderBy('created_at', 'desc')->get();
        $total = 0;
        foreach($carts as $cart){
            $total += $cart->soluong*$cart->product->product_price;
        }
        return view('pages.cart')->with(['carts'=> $carts,'total' => $total]);
    }
    public function update_cart($action, $cart_id)
    {
        $cart = Cart::find($cart_id);

        // Kiểm tra nếu giỏ hàng tồn tại
        if ($cart) {
            if ($action === 'increase') {
                $cart->soluong += 1;
            } elseif ($action === 'decrease' && $cart->soluong > 1) {
                $cart->soluong -= 1;
            }

            $cart->save();

            return response()->json([
                'success' => true,
                'new_quantity' => $cart->soluong,
                'total_price' => number_format($cart->soluong * $cart->product->product_price),
            ]);
        }

        return response()->json([
            'success' => false,
        ]);
    }
    public function delete_cart($cart_id)
    {
        Cart::destroy($cart_id);
        return redirect()->route('cart')->with('success', 'Xoá thành công');
    }
}
