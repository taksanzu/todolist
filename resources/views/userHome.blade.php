@extends('layouts.layout')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                       Welcome
                    </div>
                    <div class="card-body">
                        @if(auth()->check())
                            <p>Hello, {{ $user->name }}!</p>
                            <p>Email: {{ $user->email }}</p>
                            <!-- Các thông tin người dùng khác nếu cần -->
                        @else
                            <p>Welcome to our website!</p>
                            <!-- Nội dung khác cho trường hợp không đăng nhập -->
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
