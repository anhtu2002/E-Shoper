<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //
    public function index()
    {
        return view('user.user_login');
    }
    public function register()
    {
        return view('user.user_register');
    }
    public function save_register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits:10',
            'birth_day' => 'required|date',
            'sex' => [
                'required',
                Rule::in(['Nam', 'Nữ'])],
            'password' => 'required|min:8',
        ]);

        User::create($data);
        return redirect()->route('user.login')->with('success', 'Đăng ký thành công !');
    }
    
    public function check_login(Request $request)
    {
        $post = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt($post)) {
            session()->regenerate();

            return redirect()->intended(route('home'))->with(['success' => 'Đăng nhập thành công!']);
        }

        return back()
            ->withInput()
            ->withErrors(['message' => 'Email hoặc mật khẩu không chính xác']);
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('user.login');
    }
}
