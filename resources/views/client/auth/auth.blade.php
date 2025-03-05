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
                    <!-- Login Form -->
                    <div class="col-lg-6 col-md-8">
                        <div class="account_form" id="loginForm">
                            <h2>Đăng nhập</h2>

                            @if (session('error_login'))
                                <div class="alert alert-danger">{{ session('error_login') }}</div>
                            @endif

                            <form action="{{ route('auth.login') }}" method="POST">
                                @csrf
                                <p>
                                    <label>Email <span>*</span></label>
                                    <input type="email" name="login_email" value="{{ old('login_email') }}" class="@error('login_email') is-invalid @enderror">
                                    @error('login_email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </p>

                                <p>
                                    <label>Password <span>*</span></label>
                                    <input type="password" name="login_password" class="@error('login_password') is-invalid @enderror">
                                    @error('login_password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </p>

                                <div class="login_submit">
                                    <label for="remember">
                                        <input id="remember" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        Remember me
                                    </label>
                                    <button type="submit">Login</button>
                                </div>
                                <p class="text-center mt-3">
                                    Bạn chưa có tài khoản? <a href="#" onclick="showRegisterForm()">Đăng ký ngay</a>
                                </p>
                            </form>
                        </div>

                        <!-- Register Form (Ẩn mặc định) -->
                        <div class="account_form register d-none" id="registerForm">
                            <h2>Đăng ký</h2>

                            @if (session('success_register'))
                                <div class="alert alert-success">{{ session('success_register') }}</div>
                            @endif

                            <form action="{{ route('auth.register') }}" method="POST">
                                @csrf
                                <p>
                                    <label>Name <span>*</span></label>
                                    <input type="text" name="register_name" value="{{ old('register_name') }}" class="@error('register_name') is-invalid @enderror">
                                    @error('register_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </p>

                                <p>
                                    <label>Email <span>*</span></label>
                                    <input type="email" name="register_email" value="{{ old('register_email') }}" class="@error('register_email') is-invalid @enderror">
                                    @error('register_email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </p>

                                <p>
                                    <label>Password <span>*</span></label>
                                    <input type="password" name="register_password" class="@error('register_password') is-invalid @enderror">
                                    @error('register_password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </p>

                                <div class="login_submit">
                                    <button type="submit">Register</button>
                                </div>
                                <p class="text-center mt-3">
                                    Bạn đã có tài khoản? <a href="#" onclick="showLoginForm()">Đăng nhập</a>
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
    <script>
        function showRegisterForm() {
            document.getElementById('loginForm').classList.add('d-none');
            document.getElementById('registerForm').classList.remove('d-none');
        }

        function showLoginForm() {
            document.getElementById('registerForm').classList.add('d-none');
            document.getElementById('loginForm').classList.remove('d-none');
        }
    </script>
@endsection
