<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AIController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('client.index');
});
Route::get('menu', function () {
    return view('client.menu');
})->name('menu');

// Route cho đăng nhập
Route::get('auth', [AuthController::class, 'showLoginForm'])->name('auth');
Route::post('login', [AuthController::class, 'login'])->name('auth.login');

// Route cho đăng ký
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('auth.register');
Route::post('register', [AuthController::class, 'register'])->name('auth.register.submit');

//Lấy lại password
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

//Đăng xuất
Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout')->middleware('auth');

// Route trang cá nhân
Route::get('/profile', [UserController::class, 'profile'])->name('profile')->middleware('auth');

// Route đăng xuất
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//cart
Route::get('cart', function () {
    return view('client.cart');
})->name('cart');
//checkout
Route::get('checkout', function () {
    return view('client.checkout');
})->name('checkout');
//404
Route::fallback(function () {
    abort(404);
});
//blog
Route::get('blog', function () {
    return view('client.blog');
})->name('blog');

// Admin routes (chỉ admin mới có thể truy cập)
Route::middleware(['auth', 'role:1'])->group(function () { // Role '1' là admin
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
    // Category management
    Route::get('category-list', [CategoryController::class, 'list'])->name('category-list');
    Route::get('category-create', [CategoryController::class, 'create'])->name('category-create');
    Route::post('category_store', [CategoryController::class, 'store'])->name('category_store');
    Route::delete('/destroy/{id}', [CategoryController::class, 'destroy'])->name('destroy');
});

// Waiter role (chỉ nhân viên mới có thể truy cập)
Route::middleware(['auth', 'role:4'])->get('waiter', function () {
    return view('client.roles.waiter');
})->name('waiter');

//AI
Route::post('/chat-ai', [AIController::class, 'chat']);
