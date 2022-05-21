<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Facade;

// use App\Http\Controllers\PostController;
// use App\Http\Controllers\Auth\LoginController;
// use App\Http\Controllers\Auth\RegisterController;
// use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Models\Slider;
use App\Http\Controllers\Auth\Dashboard\SliderController;
use App\Http\Controllers\Auth\Dashboard\DashboardController;

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
    $slides = Slider::get();
    return view('home', ['slides' => $slides]);
});

Auth::routes();
Route::get('/dashboard', function () {
    return view('layouts.dashboard');
})->name('dashboard');

Route::get('/dashboard/index', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/dashboard/slider', [SliderController::class, 'index'])->name('dashboard.slider');
Route::get('/dashboard/slider/add', [SliderController::class, 'create'])->name('dashboard.slider.add');
Route::post('/dashboard/slider/add', [SliderController::class, 'store']);
Route::delete('/dashboard/slider/{slider}', [SliderController::class, 'destroy']);


// Route::get('/auth/register', [RegisterController::class, 'index'])->name('auth.register');

// Route::get('/auth/login', [LoginController::class, 'index'])->name('auth.login');

// Route::get('/auth/forgot_password', [ForgotPasswordController::class, 'index'])->name('auth.forgot_password');

Route::get('/post', [PostController::class, 'index'])->name('post');

Route::group(['middleware' => 'guest'],function(){
    Route::get('/sign-in/facebook', [LoginController::class, 'facebook']);
    Route::get('/sign-in/facebook/redirect', [LoginController::class, 'facebookRedirect']);
 });