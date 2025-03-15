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
use App\Http\Controllers\PostController;


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
Route::get('/', [PostController::class, 'index'])->name('client.index');

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
    Route::get('/dish_detail/show/{id}', [DishController::class, 'show'])->name('dish_detail');
    //vảiant
    Route::get('variants', [DishVariantController::class, 'list'])->name('variant_list');
    Route::get('/variants/create/{dish_id}', [DishVariantController::class, 'create'])->name('variants.create');
    Route::get('/variants/edit/{id}', [DishVariantController::class, 'edit'])->name('variants.edit');
    Route::put('/variants/update/{id}', [DishVariantController::class, 'update'])->name('variants.update');
    Route::post('/variants/store', [DishVariantController::class, 'store'])->name('variants.store');
    Route::delete('/variants/destroy/{id}', [DishVariantController::class, 'destroy'])->name('variants.destroy');
    // Route::get('dish_detail/{id}', [DishController::class, 'detail'])->name('dish_detail');

    //ablum ảnh
    Route::post('/dish/image/update/{id}', [DishController::class, 'updateImage'])->name('dish_image_update');
    Route::post('/dishes/{dish}/upload-images', [DishImageController::class, 'store'])->name('dishes.upload_images');
    Route::delete('/dish/image/delete/{id}', [DishController::class, 'deleteImage'])->name('dish.image.delete');
    
    //Post
    Route::get('post_list', [PostController::class, 'list'])->name('post_list');
Route::get('post_create', [PostController::class, 'create'])->name('post_create');
Route::post('post_store', [PostController::class, 'store'])->name('post_store');
Route::get('post_edit/{id}', [PostController::class, 'edit'])->name('post_edit');
Route::put('post_update/{id}', [PostController::class, 'update'])->name('post_update');
Route::delete('post_destroy/{id}', [PostController::class, 'destroy'])->name('post_destroy');
Route::get('/post_detail/show/{id}', [PostController::class, 'show'])->name('post_detail');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('post.show');


});

//Waiter role (chỉ nhân viên mới có thể truy cập)
Route::middleware(['auth', 'role:4'])->get('waiter', function () {
    return view('client.roles.waiter');
})->name('waiter');

//AI
Route::post('/chat-ai', [AIController::class, 'chat']);
