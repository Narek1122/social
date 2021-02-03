<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserCOntroller extends Controller
{
    public function login(){
      return view('login');
    }

    public function registr(Request $request){
      $data = $request->only('name','email','age','password');

        $data['password'] = bcrypt($data['password']);
      dd($data);
      $user = User::create($data);


      return redirect('/login');


    }

    public function signUp(){
      return view('signup');
    }

    public function signIn(Request $request){
      print_r($request->all());
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
