<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AIController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\DishImageController;
use App\Http\Controllers\DishVariantController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\PromotionDishController;


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


Route::get('/', [DishController::class, 'index'])->name('home');
Route::get('/dish/{id}', [DishController::class, 'showClient'])->name('dish.details');

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
    Route::get('category_edit/{id}', [CategoryController::class, 'edit'])->name('category_edit');
    Route::put('category_update/{id}', [CategoryController::class, 'update'])->name('category_update');
    Route::delete('/destroy/{id}', [CategoryController::class, 'destroy'])->name('destroy');
    Route::get('category_detail/{id}', [CategoryController::class, 'detail'])->name('category_detail');


    //Quản lý danh mục con (sub_categories)
    Route::get('sub_category_list', [SubCategoryController::class, 'list'])->name('sub_category_list');
    Route::get('sub_category_create', [SubCategoryController::class, 'create'])->name('sub_category_create');
    Route::post('sub_category_store', [SubCategoryController::class, 'store'])->name('sub_category_store');
    Route::get('sub_category_edit/{id}', [SubCategoryController::class, 'edit'])->name('sub_category_edit');
    Route::put('sub_category_update/{id}', [SubCategoryController::class, 'update'])->name('sub_category_update');
    Route::delete('sub_category_destroy/{id}', [SubCategoryController::class, 'destroy'])->name('sub_category_destroy');
    Route::get('sub_category_detail/{id}', [SubCategoryController::class, 'detail'])->name('sub_category_detail');

    //Quản lý món ăn (dishes)**
    Route::get('dish_list', [DishController::class, 'list'])->name('dish_list');
    Route::get('dish_create', [DishController::class, 'create'])->name('dish_create');
    Route::post('dish_store', [DishController::class, 'store'])->name('dish_store');
    Route::get('dish_edit/{id}', [DishController::class, 'edit'])->name('dish_edit');
    Route::put('dish_update/{id}', [DishController::class, 'update'])->name('dish_update');
    Route::delete('dish_destroy/{id}', [DishController::class, 'destroy'])->name('dish_destroy');

    //vảiant
    Route::get('/dish_detail/show/{id}', [DishController::class, 'showAdmin'])->name('dish_detail');
    Route::get('/variants/edit/{id}', [DishVariantController::class, 'edit'])->name('variants.edit');
    Route::get('/variants/create/{dish_id}', [DishVariantController::class, 'create'])->name('variants.create');
    Route::post('/variants/store', [DishVariantController::class, 'store'])->name('variants.store');
    // Route::get('dish_detail/{id}', [DishController::class, 'detail'])->name('dish_detail');

    //ablum ảnh
    Route::post('/dish/image/update/{id}', [DishController::class, 'updateImage'])->name('dish_image_update');
    Route::post('/dishes/{dish}/upload-images', [DishImageController::class, 'store'])->name('dishes.upload_images');
    Route::delete('/dish/image/delete/{id}', [DishController::class, 'deleteImage'])->name('dish.image.delete');

    //Quản lý chương trình khuyến mãi (promotions)
    Route::get('promotion_list', [PromotionController::class, 'list'])->name('promotion_list');
    Route::get('promotion_create', [PromotionController::class, 'create'])->name('promotion_create');
    Route::post('promotion_store', [PromotionController::class, 'store'])->name('promotion_store');
    Route::get('promotion_edit/{id}', [PromotionController::class, 'edit'])->name('promotion_edit');
    Route::put('promotion_update/{id}', [PromotionController::class, 'update'])->name('promotion_update');
    Route::delete('promotion_destroy/{id}', [PromotionController::class, 'destroy'])->name('promotion_destroy');
    Route::get('promotion_detail/{id}', [PromotionController::class, 'detail'])->name('promotion_detail');

    // Quản lý món ăn trong chương trình khuyến mãi (promotion_dishes)
    Route::get('promotion_dish_list', [PromotionDishController::class, 'list'])->name('promotion_dish_list');
    Route::get('promotion_dish_create', [PromotionDishController::class, 'create'])->name('promotion_dish_create');
    Route::post('promotion_dish_store', [PromotionDishController::class, 'store'])->name('promotion_dish_store');
    Route::get('promotion_dish_edit/{id}', [PromotionDishController::class, 'edit'])->name('promotion_dish_edit');
    Route::put('promotion_dish_update/{id}', [PromotionDishController::class, 'update'])->name('promotion_dish_update');
    Route::delete('promotion_dish_destroy/{id}', [PromotionDishController::class, 'destroy'])->name('promotion_dish_destroy');
    Route::get('promotion_dish_detail/{id}', [PromotionController::class, 'detail'])->name('promotion_dish_detail');
});

//Waiter role (chỉ nhân viên mới có thể truy cập)
Route::middleware(['auth', 'role:4'])->get('waiter', function () {
    return view('client.roles.waiter');
})->name('waiter');

//AI
Route::post('/chat-ai', [AIController::class, 'chat']);
