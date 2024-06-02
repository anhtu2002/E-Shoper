<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //index
    public function index()
    {
        return view('admin.login');
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function check_login_admin()
    {
        $post = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(auth()->guard('admin')->attempt($post)){
            session()->regenerate();
            return redirect()->route('admin.dashboard')->with(['message' =>'Đăng nhập thành công !']);
        }

        return back()
            ->withInput()
            ->withErrors(['message' => 'Email hoặc mật khẩu không chính xác']);
        
    }

    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect ()->route('admin.login');
    }
}
