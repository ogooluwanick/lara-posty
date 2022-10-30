<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserPostController extends Controller
{
    public function index(User $user){
        // dd($user->recievedLikes);
        return view("users.posts.index",["user"=>$user,"posts"=>$user->posts()->with(["user","likes"])->simplePaginate(20)]);
    }
}
