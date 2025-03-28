<?php

use Illuminate\Support\Facades\Route;

// controllers 
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UtilsController;

// middlewares
use App\Http\Middleware\isLoggedIn;

Route::get('/', function () {
    return view('home')->name('home');
});

// auth
Route::get('/register',[AuthController::class,'registerPage'])->name('auth.register-page');
Route::post('/register',[AuthController::class,'registerUser'])->name('auth.register-user');
Route::get('/login',[AuthController::class,'loginPage'])->name('login');
Route::post('/login',[AuthController::class,'loginUser'])->name('auth.login-user');
Route::get('/logout',[AuthController::class,'logoutUser'])->name('auth.logout-user');

// post 
Route::get('/users/{user}/posts/',[PostController::class,'showAll'])->name('user.posts.all');
Route::get('/users/{user}/posts/create',[PostController::class,'create'])->name('users.posts.create');
Route::post('/users/{user}/posts/store',[PostController::class,'store'])->name('users.posts.store');
Route::get('/users/{post}/edit',[PostController::class,'edit'])->name('users.posts.edit');
Route::put('users/{post}', [PostController::class, 'update'])->name('users.posts.update'); 
Route::delete('users/{post}', [PostController::class, 'destroy'])->name('users.posts.destroy'); 

// dashboard
Route::get('/dashboard',[UtilsController::class,'dashboardPage'])->name('utils.dashboard');
