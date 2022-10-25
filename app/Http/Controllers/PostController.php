<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

        public function __construct(){
                $this->middleware(["auth"]);
        }

    public function index(){
        $posts=Post::latest()->simplePaginate(5);
        return view('posts.index',[
                "posts"=>$posts
        ]);
    }
    public function like(Post $post,Request $request){
        if($post->likedBy($request->user())){
                return response(null,409);
        }
        $post->likes()->create([
                "user_id"=>$request->user()->id,
        ]);
        return back(); 
    }
    public function unlike(Post $post,Request $request){
        $request->user()->likes()->where("post_id",$post->id)->delete();
        return back();
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
