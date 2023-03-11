<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\AuthController;

Route::middleware("guest:admin")->group(function (){
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('login_process', [AuthController::class, 'login'])->name('login_process');
});

Route::middleware("auth:admin")->group(function (){
    Route::resource('products', ProductController::class);
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});
