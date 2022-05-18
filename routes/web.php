<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;

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
    return view('layouts.app');
});

Route::get('/auth/register', [RegisterController::class, 'index'])->name('auth.register');

Route::get('/auth/login', [LoginController::class, 'index'])->name('auth.login');

Route::get('/auth/forgot_password', [ForgotPasswordController::class, 'index'])->name('auth.forgot_password');


Route::get('/post', [PostController::class, 'index'])->name('post');