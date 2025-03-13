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
    public function showRegisterForm()
    {
        return view('client.auth.register');
    }
    /**
     * Xử lý đăng ký
     */
    public function register(Request $request)
    {
        // Kiểm tra và xác thực dữ liệu
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

        // Tạo tài khoản người dùng mới
        try {
            $user = User::create([
                'name' => $request->register_name,
                'email' => $request->register_email,
                'password' => Hash::make($request->register_password),
            ]);

            // Gán vai trò người dùng mặc định
            $user->roles()->attach(6);

            return redirect()->route('auth')->with('success_register', 'Đăng ký thành công! Hãy đăng nhập.');
        } catch (\Exception $e) {
            return back()->with('register_failed', 'Có lỗi xảy ra, vui lòng thử lại.')->withInput();
        }
    }

    /**
     * Xử lý đăng nhập
     */
    public function showLoginForm()
    {
        return view('client.auth.login');
    }
    public function login(Request $request)
    {
        // Validate form inputs
        $request->validate([
            'login_email' => 'required|string|email',
            'login_password' => 'required|string|min:6',
        ], [
            'login_email.required' => 'Vui lòng nhập email.',
            'login_email.email' => 'Email không hợp lệ.',
            'login_password.required' => 'Vui lòng nhập mật khẩu.',
            'login_password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
        ]);

        // Lấy user từ email
        $user = User::where('email', $request->login_email)->first();

        // Kiểm tra xem email có tồn tại không
        if (!$user) {
            return back()->withErrors(['login_email' => 'Email không tồn tại.'])->withInput();
        }

        // Kiểm tra mật khẩu
        if (!Auth::attempt(['email' => $request->login_email, 'password' => $request->login_password], $request->remember)) {
            return back()->withErrors(['login_password' => 'Mật khẩu không đúng.'])->withInput();
        }

        // Lấy quyền của user
        $role = DB::table('role_user')->where('user_id', $user->id)->pluck('role_id')->first();

        // Điều hướng dựa vào quyền
        switch ($role) {
            case 1:
                return redirect()->route('dashboard')->with('success_login', 'Đăng nhập thành công (Admin)!');
            case 6:
                return redirect()->route('auth')->with('success_login', 'Đăng nhập thành công (Client)!');
            case 4:
                return redirect()->route('waiter')->with('success_login', 'Đăng nhập thành công (Waiter)!');
            default:
                Auth::logout();
                return redirect()->route('auth')->withErrors(['login_error' => 'Tài khoản của bạn chưa có quyền truy cập.']);
        }
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
