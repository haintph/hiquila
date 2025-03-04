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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);
    
        // Tạo user mới
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
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
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
    
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            $user = Auth::user(); // Lấy thông tin user sau khi đăng nhập
    
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
