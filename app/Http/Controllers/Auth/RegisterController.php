<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
        public function index(){
                return view("auth.register");
        }

        public function store(Request $request){
                // dd($request);
                
                $this->validate($request,[
                        "name"=>"required | max:255",
                        'username' => ['required'],
                        'email' => 'required | email',
                        'password' => 'required | confirmed| min:6',
                ]);

                dd("Store");

        }
}
