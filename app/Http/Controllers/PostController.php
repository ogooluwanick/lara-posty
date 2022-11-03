<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Mail\PostLiked;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{

        public function __construct(){
                $this->middleware(["auth"]);
        }

    public function index(){
        $posts=Post::latest()->with(["user","likes"])->simplePaginate(5);
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
      
        if(!$post->likes()->onlyTrashed()->where("user_id",$request->user()->id)->count()){
                $user=auth()->user();
                Mail::to($user)->send(new PostLiked($user,$post));
        }

        return back(); 
    }
    public function unlike(Post $post,Request $request){
        $request->user()->likes()->where("post_id",$post->id)->delete();

        return back();
    }
    public function delete(Post $post,Request $request){
        if(!$post->ownedBy(auth()->user())){
                return response("Unauth action",409);
        }
        $post->delete();
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

    public function show(Post $post){
     
        return view("posts.show",[
                "post"=>$post
        ]);
    }
}
