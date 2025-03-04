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
            <div class="row">
                <!--login area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form">
                        <h2>Đăng nhập</h2>
                        <form action="{{ route('auth.login') }}" method="POST">
                            @csrf
                            <p>
                                <label>Email <span>*</span></label>
                                <input type="email" name="email">
                            </p>
                            <p>
                                <label>Password <span>*</span></label>
                                <input type="password" name="password">
                            </p>
                            <div class="login_submit">
                                <label for="remember">
                                    <input id="remember" type="checkbox" name="remember">
                                    Remember me
                                </label>
                                <button type="submit">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--login area start-->

                <!--register area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form register">
                        <h2>Đăng ký</h2>
                        @if (session('success_register'))
                            <div class="alert alert-success">{{ session('success_register') }}</div>
                        @endif

                        @if ($errors->any() && !isset($errors->login_error))
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('auth.register') }}" method="POST">
                            @csrf
                            <p>
                                <label>Name <span>*</span></label>
                                <input type="text" name="name">
                            </p>
                            <p>
                                <label>Email <span>*</span></label>
                                <input type="email" name="email">
                            </p>
                            <p>
                                <label>Password <span>*</span></label>
                                <input type="password" name="password">
                            </p>
                            <div class="login_submit">
                                <button type="submit">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--register area end-->
            </div>
        </div>
    </div>
    <!-- customer login end -->
@endsection
