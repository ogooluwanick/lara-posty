<?php

use Illuminate\Support\Facades\Route;
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

//Show index page 
Route::get('/posts', function () {
    return view('posts.index');
})->name("posts");
