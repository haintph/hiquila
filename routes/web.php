<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

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
//login
Route::get('login', function () {
    return view('client.login');
})->name('login');
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
//admin
Route::get('dasboard', function () {
    return view('admin.dasboard');
})->name('dasboard');
//Categories admin
Route::get('category-list', [CategoryController::class, 'list'])->name('category-list');
Route::get('category-create', [CategoryController::class, 'create'])->name('category-create');
Route::post('category_store', [CategoryController::class, 'store'])->name('category_store');
Route::delete('/destroy/{id}', [CategoryController::class, 'destroy'])->name('destroy');
