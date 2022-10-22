<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;

//Show Home page 
Route::get('/',function(){
        return view("home");
})->name("home");

//Show Dashboard page 
Route::get('/dashboard',[DashboardController::class,"index" ])->name("dashboard")->middleware("auth");

//Show Login page 
Route::get('/login',[LoginController::class,"index" ])->name("login");
//Login Logic  store()
Route::post('/login',[LoginController::class,"store" ]);

//Logout Logic  store()
Route::post('/logout',[LogoutController::class,"store" ])->name("logout");

//Show Register page 
Route::get('/register',[RegisterController::class,"index" ])->name("register");
//Register Logic  store()
Route::post('/register',[RegisterController::class,"store" ]);

//Show posts page 
Route::get('/posts',[PostController::class,"index" ])->name("posts");
//Store post page 
Route::post('/posts',[PostController::class,"store" ]);
