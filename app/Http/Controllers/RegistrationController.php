<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Đăng nhập người dùng sau khi đăng ký (tuỳ chọn)
        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('login'); // Điều hướng đến trang chính sau khi đăng ký
    }
}
