<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return view('posts.index');
    }

    public function store(Request $request){
        // dd("done");

        $this->validate($request,[
                "body"=> "required"
        ]);

        auth()->user()->posts()->create([
                "body"=>$request->body,
        ]);

        return back();
    }
}
