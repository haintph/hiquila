<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Models\Role;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Xử lý đăng ký
     */
    public function register(Request $request)
    {
        $request->validate([
            'register_name' => 'required|string|max:255',
            'register_email' => 'required|string|email|max:255|unique:users,email',
            'register_password' => 'required|string|min:6',
        ], [
            'register_name.required' => 'Vui lòng nhập họ và tên.',
            'register_email.required' => 'Vui lòng nhập email.',
            'register_email.email' => 'Email không hợp lệ.',
            'register_email.unique' => 'Email này đã được đăng ký.',
            'register_password.required' => 'Vui lòng nhập mật khẩu.',
            'register_password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
        ]);

        // Tạo user mới
        $user = User::create([
            'name' => $request->register_name,
            'email' => $request->register_email,
            'password' => Hash::make($request->register_password),
        ]);

        // Gán mặc định role_id = 6 (Customer)
        $user->roles()->attach(6);

        return redirect()->route('auth')->with('success_register', 'Đăng ký thành công! Hãy đăng nhập.');
    }

    /**
     * Xử lý đăng nhập
     */
    public function login(Request $request)
    {
        $request->validate([
            'login_email' => 'required|string|email',
            'login_password' => 'required|string|min:6',
        ], [
            'login_email.required' => 'Vui lòng nhập email.',
            'login_email.email' => 'Email không hợp lệ.',
            'login_password.required' => 'Vui lòng nhập mật khẩu.',
            'login_password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
        ]);

        if (Auth::attempt(['email' => $request->login_email, 'password' => $request->login_password], $request->remember)) {
            $user = Auth::user();

            // Kiểm tra quyền trong bảng role_user
            $role = DB::table('role_user')->where('user_id', $user->id)->pluck('role_id')->first();

            if ($role == 1) {
                return redirect()->route('dashboard')->with('success_login', 'Đăng nhập thành công (Admin)!');
            } elseif ($role == 6) {
                return redirect()->route('auth')->with('success_login', 'Đăng nhập thành công (Client)!');
            }

            // Nếu user không có quyền phù hợp
            Auth::logout();
            return redirect()->route('auth')->withErrors(['login_error' => 'Tài khoản của bạn chưa có quyền truy cập.']);
        }

        return back()->withErrors(['login_error' => 'Email hoặc mật khẩu không đúng.'])->withInput();
    }

    /**
     * Đăng xuất
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth')->with('success_logout', 'Bạn đã đăng xuất.');
    }
}
