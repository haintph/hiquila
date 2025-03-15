<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Kiểm tra người dùng đã đăng nhập chưa
        if (!Auth::check()) {
            return redirect()->route('auth')->withErrors(['login_error' => 'Vui lòng đăng nhập.']);
        }

        // Lấy thông tin người dùng hiện tại
        $user = Auth::user();

        // Lấy role_id của người dùng
        $role = DB::table('role_user')->where('user_id', $user->id)->pluck('role_id')->first();

        // Kiểm tra xem người dùng có role_id thuộc danh sách roles không
        if (!in_array($role, $roles)) {
            return response()->view('errors.404', [], 404);  // Có thể chuyển hướng hoặc trả về lỗi khác
        }

        // Tiếp tục xử lý yêu cầu
        return $next($request);
    }
}

