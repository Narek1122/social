<?php

namespace App\Http\Controllers;


use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\SignInInRequest;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Post;

class UserCOntroller extends Controller
{
    public function login(){
      if(Auth::check()){
      return redirect()->route('profile');
  }else{
    return view('login');
  }
    }

    public function logout(){
      Auth::logout();

      return redirect()->route('login');
    }

    public function profile(){

      $posts = Post::where('user_id',Auth::user()->id)
      ->with('user')
      ->get();



      return view('profile',[
        'user' => Auth::user(),
        'posts' => $posts,
      ]);
    }

    public function about(){
      return view('about');
    }

    public function registr(UserRegisterRequest $request){

      $validated = $request->validated();



        $validated['password'] = bcrypt($validated['password']);

      $user = User::create($validated);


      return redirect()->route('login');


    }

    public function signUp(){
      return view('signup');
    }



    public function signIn(SignInInRequest $request){
      $validated = $request->validated();

        if(Auth::attempt($validated)){
          return redirect()->route('profile');
        } else{
          return redirect("/login")->with('error', 'Invalid Email or Password');
        }

    }

    public function index(){
      $arr = [
        [
          'name' => 'john',
          'age' => 21
        ]

    ];

    return view('welcome',[
      'users' => $arr
    ]);




  }
}
