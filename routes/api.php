<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('v1/product/list', [ProductController::class, 'index'])->middleware('auth:sanctum');
Route::post('login', [AuthController::class, 'login']);
Route::post('v1/product/update/{id}', [ProductController::class, 'update']);
Route::delete('v1/product/delete/{id}', [ProductController::class, 'destroy']);
