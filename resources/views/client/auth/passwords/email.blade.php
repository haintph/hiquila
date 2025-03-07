@extends('client.layouts.master')
@section('content')
    <div class="customer_login">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    {{-- start --}}
                    <div class="account_form">
                        <h2>Quên mật khẩu</h2>
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <form action="{{ route('password.email') }}" method="POST">
                            @csrf
                            <p>
                                <label>Email <span>*</span></label>
                                <input type="email" name="email" class="@error('email') is-invalid @enderror">
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </p>
                            <button type="submit">Gửi liên kết đặt lại mật khẩu</button>
                        </form>
                    </div>
                </div>
                <!-- #endregion -->
            </div>
        </div>
    </div>
    </div>
@endsection
