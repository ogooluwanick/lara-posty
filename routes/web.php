<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

//Show index page 
Route::get('/register',[RegisterController::class,"index" ]);

//Show index page 
Route::get('/posts', function () {
    return view('posts.index');
});
