<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\Dashboard\DashboardController;
use App\Http\Controllers\Auth\Dashboard\SliderController;

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
    return view('home');
});

Route::get('/dashboard', function () {
    return view('layouts.dashboard');
})->name('dashboard');

Route::get('/dashboard/index', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/dashboard/slider', [SliderController::class, 'index'])->name('dashboard.slider');
Route::get('/dashboard/slider/add', [SliderController::class, 'create'])->name('dashboard.slider.add');

Route::get('/auth/register', [RegisterController::class, 'index'])->name('auth.register');

Route::get('/auth/login', [LoginController::class, 'index'])->name('auth.login');

Route::get('/auth/forgot_password', [ForgotPasswordController::class, 'index'])->name('auth.forgot_password');


Route::get('/post', [PostController::class, 'index'])->name('post');