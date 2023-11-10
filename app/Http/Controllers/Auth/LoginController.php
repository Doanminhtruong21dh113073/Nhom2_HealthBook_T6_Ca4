<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    // Hiển thị form đăng nhập
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Xử lý đăng nhập
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('admin/category/index'); // Chuyển hướng đến trang chính sau khi đăng nhập thành công
        }

        $errors = [];

        if (!Auth::validate($credentials)) {
            $errors['email'] = 'Email đăng nhập không chính xác.';
        } else {
            $errors['password'] = 'Password đăng nhập không chính xác.';
        }

        return back()->withErrors($errors)->withInput($request->except('password'));
    }
    // Xử lý đăng xuất
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('auth.login');
    }
}