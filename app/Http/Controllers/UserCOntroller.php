<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

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


      return view('profile',[
        'user' => Auth::user()
      ]);
    }

    public function about(){
      return view('about');
    }

    public function registr(Request $request){

      $validated = $request->validate([
        'name' => 'required|string|max:16',
        'email' => 'required|unique:users,email',
        'age' => 'required|numeric|max:100',
        'password' => 'required|min:6',
      ]);



        $validated['password'] = bcrypt($validated['password']);

      $user = User::create($validated);


      return redirect()->route('login');


    }

    public function signUp(){
      return view('signup');
    }

    public function signIn(Request $request){
      $validated = $request->validate([
        'email' => 'required',
        'password' => 'required',
      ]);

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
