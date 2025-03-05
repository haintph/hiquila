<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('client.auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        // Validate email
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ], [
            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Email không hợp lệ.',
            'email.exists' => 'Email này không tồn tại trong hệ thống.',
        ]);

        // Lấy email từ request
        $email = $request->input('email');

        // Kiểm tra xem email có tồn tại không trước khi gọi sendResetLink
        if (empty($email)) {
            return back()->withErrors(['email' => 'Email không hợp lệ.']);
        }

        // Gửi email reset mật khẩu
        $status = Password::sendResetLink($request->only('email'));

        // dd($email);

        return $status === Password::RESET_LINK_SENT
            ? back()->with('success', 'Liên kết đặt lại mật khẩu đã được gửi đến email của bạn.')
            : back()->withErrors(['email' => 'Không thể gửi liên kết đặt lại mật khẩu.']);
    }
}
