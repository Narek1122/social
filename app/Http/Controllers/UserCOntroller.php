<?php

namespace App\Http\Controllers;

use App\Constants\ClientResponse;
use App\Services\UserServices;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\SignInInRequest;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\App;
class UserCOntroller extends Controller
{

  public function getLikedPost(){

    Auth::user()->load('likedPost');

    return response()->json([
      'status' =>1,
      'data' => [
        'count' =>  Auth::user()->likedPost->count(),
        'posts' => Auth::user()->likedPost->pluck('data')
      ]

    ]);

  }

  public function getPass(Request $request){

    $response = Http::asForm()->post('http://narek1.test/oauth/token', [
    'grant_type' => 'password',
    'client_id' => '2',
    'client_secret' => 'I2xBhQH5kfANSeSAzTIS5Lj8vQLZMmIqHiy31jkd',
    'username' => $request->email,
    'password' => $request->password,
    'scope' => '',
  ]);
    return $response->json();

  }

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


      $user = User::create($request->validated());


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

      App::setLocale('ru');
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


  public function edit(){

    return view('user-edit',[
      'user' => Auth::user(),
    ]);
  }

public function getProfileImage(){
  return response()->file(Storage::path(Auth::user()->profile_image));
}

public function apiStore(UserRegisterRequest $request){

  $user = User::create($request->validated());

    return response()->json([
      'status' => ClientResponse::STATUSES['success'],
      'data' => $user,
    ]);


}

public function GetUsers(){

  return response()->json([
    'status' => ClientResponse::STATUSES['success'],
    'data' => User::all(),
  ]);

}

public function GetIdUsers(User $user){

  return response()->json([
    'status' => ClientResponse::STATUSES['success'],
    'data' => $user,
  ]);

}



  public function update(Request $request){
      $validated = $request->validate([
        'name' => 'nullable|min:3|max:16',
        'password' => 'nullable|min:6',
        'image' => 'nullable|image|max:2048',
      ]);

      $userService = new UserServices(Auth::user());
      $userService->update($validated);


    return redirect()->route('profile');



  }
}
