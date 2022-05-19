<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Facade;

// use App\Http\Controllers\PostController;
// use App\Http\Controllers\Auth\LoginController;
// use App\Http\Controllers\Auth\RegisterController;
// use App\Http\Controllers\Auth\ForgotPasswordController;

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

Auth::routes();

Route::get('/post', [PostController::class, 'index'])->name('post');

Route::group(['middleware' => 'guest'],function(){
    Route::get('/sign-in/facebook', [LoginController::class, 'facebook']);
    Route::get('/sign-in/facebook/redirect', [LoginController::class, 'facebookRedirect']);
 });