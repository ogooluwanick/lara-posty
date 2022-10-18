<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

//Show Dashboard page 
Route::get('/dashboard',[DashboardController::class,"index" ])->name("dashboard");

//Show Register page 
Route::get('/register',[RegisterController::class,"index" ])->name("register");

//Register Logic  store()
Route::post('/register',[RegisterController::class,"store" ]);

//Show index page 
Route::get('/posts', function () {
    return view('posts.index');
});
