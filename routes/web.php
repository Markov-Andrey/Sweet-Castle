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

Route::view('/', 'welcome');

Route::name('user.')->group(function (){
    Route::view('/private', 'private')->middleware('auth')->name('private');

    Route::get('/login', function (){
        if(Auth::check()){
            return redirect(route('user.private'));
        }
        return view('login');
    })->name('login');

    //Route::post('/login', [])

    Route::get('/logout', [])->name('logout');

    Route::get('/register', function (){
        if(Auth::check()){
            return redirect(route('user.private'));
        }
        return view('register');
    })->name('register');

    //Route::post('/register',[]);
});
