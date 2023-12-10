<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::post('/products', [App\Http\Controllers\ProductController::class, 'store'])->name('products.store');
Route::get('/products/{id}', [App\Http\Controllers\ProductController::class, 'detail'])->name('products.detail');
Route::get('/home', [App\Http\Controllers\ProductController::class, 'index'])->name('products.index');
Route::post('/products/{id}', [App\Http\Controllers\ProductController::class, 'update'])->name('products.update');
Route::get('/delete-products/{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/register', [App\Http\Controllers\AuthController::class, 'viewlogin'])->name('view-register');
Route::post('/register', [App\Http\Controllers\AuthController::class, 'register'])->name('register');
Route::get('/login', [App\Http\Controllers\AuthController::class, 'viewdangnhap'])->name('view-dangnhap');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
