@extends('client.layouts.master')

@section('content')
    <div class="customer_login">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    {{-- start --}}
                    <div class="account_form">
                        <h2>Đặt lại mật khẩu</h2>

                        <form action="{{ route('password.update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">

                            <p>
                                <label>Email <span>*</span></label>
                                <input type="email" name="email" value="{{ old('email') }}"
                                    class="@error('email') is-invalid @enderror">
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </p>

                            <p>
                                <label>Mật khẩu mới <span>*</span></label>
                                <input type="password" name="password" class="@error('password') is-invalid @enderror">
                                @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </p>

                            <p>
                                <label>Xác nhận mật khẩu <span>*</span></label>
                                <input type="password" name="password_confirmation">
                            </p>

                            <button type="submit">Đặt lại mật khẩu</button>
                        </form>
                    </div>
                </div>
                <!-- #endregion -->
            </div>
        </div>
    </div>
    </div>
@endsection
