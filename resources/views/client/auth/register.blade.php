@extends('client.layouts.master')
@section('content')
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>Login</h3>
                        <ul>
                            <li><a href="index.html">home</a></li>
                            <li>Login</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!-- customer login start -->
    <div class="customer_login">
        <div class="container">
            <div class="row justify-content-center">
                @if (!Auth::check())
                    <div class="col-lg-6 col-md-8">
                        <!-- Form Đăng Ký -->
                        <div class="account_form" id="registerForm">
                            <h2>Đăng ký</h2>

                            @if (session('success_register'))
                                <div class="alert alert-success">{{ session('success_register') }}</div>
                            @endif

                            @if (session('register_failed'))
                                <div class="alert alert-danger">{{ session('register_error') }}</div>
                            @endif

                            <form action="{{ route('auth.register.submit') }}" method="POST">
                                @csrf
                                <p>
                                    <label>Name <span>*</span></label>
                                    <input type="text" name="register_name" value="{{ old('register_name') }}"
                                        class="@error('register_name') is-invalid @enderror">
                                    @error('register_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </p>

                                <p>
                                    <label>Email <span>*</span></label>
                                    <input type="email" name="register_email" value="{{ old('register_email') }}"
                                        class="@error('register_email') is-invalid @enderror">
                                    @error('register_email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </p>

                                <p>
                                    <label>Password <span>*</span></label>
                                    <input type="password" name="register_password"
                                        class="@error('register_password') is-invalid @enderror">
                                    @error('register_password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </p>

                                <div class="login_submit">
                                    <button type="submit">Register</button>
                                </div>
                                <p class="text-center mt-3">
                                    Bạn đã có tài khoản? <a href="{{ route('auth.login') }}">Đăng nhập</a>
                                </p>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="col-12">
                        <div class="alert alert-success text-center">
                            Bạn đã đăng nhập! <a style="font-weight:500;" href="/"> Trở về trang chủ </a> hoặc
                            <a style="color:red;" href="{{ route('logout') }}">Đăng xuất</a>.
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- customer login end -->
  
@endsection
