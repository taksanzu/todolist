<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserhomeController extends Controller
{
    public function index()
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (Auth::check()) {
            $user = Auth::user();
            return view('pages.user.userHome', ['user' => $user]);
        } else {
            // Người dùng chưa đăng nhập, bạn có thể thực hiện xử lý khác ở đây
            return redirect()->route('login');
        }
    }
}
