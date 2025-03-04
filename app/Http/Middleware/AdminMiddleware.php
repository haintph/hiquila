<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        $role = DB::table('role_user')->where('user_id', $user->id)->pluck('role_id')->first();

        // Nếu user không có role_id = 1 (admin), hiển thị trang lỗi 404
        if ($role != 1) {
            return response()->view('errors.404', [], 404);
        }

        return $next($request);
    }
}
