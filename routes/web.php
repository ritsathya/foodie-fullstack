<?php

use App\Models\Slider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Facade;

use App\Http\Controllers\PostController;
// use App\Http\Controllers\Auth\LoginController;
// use App\Http\Controllers\Auth\RegisterController;
// use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\Dashboard\SliderController;
use App\Http\Controllers\Auth\Dashboard\CategoryController;
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




// Route::get('/auth/register', [RegisterController::class, 'index'])->name('auth.register');
// Route::get('/auth/login', [LoginController::class, 'index'])->name('auth.login');
// Route::get('/auth/forgot_password', [ForgotPasswordController::class, 'index'])->name('auth.forgot_password');

Route::get('/post', [PostController::class, 'index'])->name('post');
Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
Route::post('/post/create', [PostController::class, 'store']);


Route::group(['middleware' => 'guest'],function(){
    Route::get('/sign-in/facebook', [LoginController::class, 'facebook']);
    Route::get('/sign-in/facebook/redirect', [LoginController::class, 'facebookRedirect']);
 });

Route::group(['middleware' => 'can:access-dashboard'], function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/slider', [SliderController::class, 'index'])->name('dashboard.slider');
    Route::get('/dashboard/slider/add', [SliderController::class, 'create'])->name('dashboard.slider.add');
    Route::post('/dashboard/slider/add', [SliderController::class, 'store']);
    Route::delete('/dashboard/slider/{slider}', [SliderController::class, 'destroy']);

    Route::get('/dashboard/category', [CategoryController::class, 'index'])->name('dashboard.category');
    Route::get('/dashboard/category/add', [CategoryController::class, 'create'])->name('dashboard.category.add');

});