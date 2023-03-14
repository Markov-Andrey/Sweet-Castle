<?php

use App\Http\Controllers\Admin\CommentsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\UserController;

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login_process', [AuthController::class, 'login'])->name('login_process');

Route::middleware("auth:admin")->group(function (){
    Route::resource('products', ProductController::class);
    Route::resource('users', UserController::class);
    Route::resource('comments', CommentsController::class);

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});
