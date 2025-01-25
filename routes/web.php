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

Route::get('login', function () {
    return view('client.login');
})->name('login');
Route::get('dasboard', function () {
    return view('admin.dasboard');
})->name('dasboard');
//Categories
Route::get('category-list', [CategoryController::class, 'list'])->name('category-list');
Route::get('category-create', [CategoryController::class, 'create'])->name('category-create');
Route::post('category_store', [CategoryController::class, 'store'])->name('category_store');
Route::delete('/destroy/{id}', [CategoryController::class, 'destroy'])->name('destroy');

