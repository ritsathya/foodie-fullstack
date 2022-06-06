<?php

use App\Models\Post;
use App\Models\Slider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Facade;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\Dashboard\SliderController;
use App\Http\Controllers\Auth\Dashboard\CategoryController;
use App\Http\Controllers\Auth\Dashboard\DashboardController;
use App\Http\Controllers\RatingAndCommentController;
use App\Http\Controllers\RepliedReviewController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ReportedPostController;
use App\Models\ReportedPost;

// use App\Http\Controllers\CategoryController;

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
    $posts = Post::inRandomOrder()->limit(5)->get();
    
    return view('home', [
        'slides' => $slides,
        'posts' => $posts

    ]);
});

Auth::routes();

Route::get('/listing', [ListingController::class, 'index'])->name('listing');
Route::get('/post', [PostController::class, 'index'])->name('post');

Route::get('/post', [PostController::class, 'index'])->name('post');
Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
Route::post('/post/create', [PostController::class, 'store']);

Route::get('/post/detail/{post}', [PostController::class, 'show'])->name('post.detail');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/post/create', [PostController::class, 'store']);
    Route::delete('/post/delete/{post}', [PostController::class, 'destroy'])->name('post.delete');
    Route::get('/post/edit/{post}', [PostController::class, 'edit'])->name('post.edit');
    Route::put('/post/edit/{post}', [PostController::class, 'update']);

    Route::get('/post/report/{post}', [ReportedPostController::class, 'index'])->name('post.report');
    Route::post('/post/report/{post}', [ReportedPostController::class, 'store'])->name('report.create');

    //Comment Section
    Route::post('/post/detail/{post}/comment', [RatingAndCommentController::class, 'store'])->name('comment.create');
    Route::put('/post/detail/{post}/comment', [RatingAndCommentController::class, 'update'])->name('comment.update');
    Route::delete('/post/detail/{post}/comment', [RatingAndCommentController::class, 'destroy'])->name('comment.destroy');
    Route::post('/post/detail/{post}/{comment}/reply_comment', [RepliedReviewController::class, 'store'])->name('replied.create');
// Route::post('/post/detail/{id}/comment', [RepliedReviewController::class, 'store'])->name('replied.create');

    Route::get('/profile', function() {
        return view('auth.profile.index');
    })->name('profile');

    Route::get('/profile/setting', function() {
        return view('auth.profile.setting');
    })->name('profile.setting');

});


Route::group(['middleware' => 'guest'],function(){
    Route::get('/sign-in/facebook', [LoginController::class, 'facebook']);
    Route::get('/sign-in/facebook/redirect', [LoginController::class, 'facebookRedirect']);
 });

Route::group(['middleware' => 'can:access-dashboard'], function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::get('/dashboard/slider', [SliderController::class, 'index'])->name('dashboard.slider');
    Route::get('/dashboard/slider/add', [SliderController::class, 'create'])->name('dashboard.slider.add');
    Route::post('/dashboard/slider/add', [SliderController::class, 'store']);
    Route::post('/dashboard/slider/update/{slide}', [SliderController::class, 'update'])->name('dashboard.slider.update');
    Route::get('/dashboard/slider/edit/{slide}', [SliderController::class, 'edit'])->name('dashboard.slider.edit');
    Route::delete('/dashboard/slider/{slider}', [SliderController::class, 'destroy']);

    Route::get('/dashboard/category', [CategoryController::class, 'index'])->name('dashboard.category');
    Route::get('/dashboard/category/add', [CategoryController::class, 'create'])->name('dashboard.category.add');

    
    Route::get('/dashboard/category', [CategoryController::class, 'index'])->name('dashboard.category');
    Route::get('/dashboard/category/add', [CategoryController::class, 'create'])->name('dashboard.category.add');
    Route::post('/dashboard/category/add', [CategoryController::class, 'store']);
    Route::get('/dashboard/category/edit/{category}', [CategoryController::class, 'edit'])->name('dashboard.category.edit');
    Route::put('/dashboard/category/update/{category}', [CategoryController::class, 'update'])->name('dashboard.category.update');
    Route::delete('/dashboard/category/remove/{category}', [CategoryController::class, 'destroy'])->name('dashboard.category.remove');
});
