<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\TagController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Login Routes
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

     // Logout Route
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::middleware(['auth'])->group(function () {
        Route::resource('/posts', PostController::class)->except(['show']);
        Route::get('tags/{tag}', [TagController::class, 'show'])->name('tags.show');

    });
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

    Route::post('/file-upload', [FileUploadController::class, 'upload'])->name('file-upload');

    Route::middleware(['auth'])->group(function () {
        Route::resource('tags', TagController::class)->except(['show']);
        Route::get('tags/{tag}/posts', [TagController::class, 'showPosts'])->name('tags.posts.index');
        Route::put('tags/{tag}/posts', [TagController::class, 'updatePosts'])->name('tags.posts.update');

    });

