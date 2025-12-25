<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/products', [ProductController::class, 'index']);

Route::get('/users', [UserController::class, 'index']);

Route::get('/orders', [OrderController::class, 'index']);
