<?php

use App\Http\Controllers\Auth\Dashboard\DashboardController;
use App\Http\Controllers\Auth\Dashboard\SliderController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
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
    return view('home');
});

Route::get('/dashboard', function () {
    return view('layouts.dashboard');
})->name('dashboard');

Route::get('/dashboard/index', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/dashboard/slider', [SliderController::class, 'index'])->name('dashboard.slider');
Route::get('/dashboard/slider/add', [SliderController::class, 'create'])->name('dashboard.slider.add');

Route::get('/register', [RegisterController::class, 'index'])->name('register');

Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::get('/post', [PostController::class, 'index'])->name('post');