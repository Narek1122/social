<?php

namespace App\Http\Controllers;


use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\SignInInRequest;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Post;
use Illuminate\Support\Facades\Storage;

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



  public function update(Request $request){
      $validated = $request->validate([
        'name' => 'nullable|min:3|max:16',
        'password' => 'nullable|min:6',
        'image' => 'nullable|image|max:2048',
      ]);

      $validated = array_filter($validated,function($value){
        return !empty($value);
      });

      Auth::user()->update($validated);

      if($request->hasFile('image')){
        if(Auth::user()->profile_image){
            $oldImagePath = Auth::user()->profile_image;
            if(Storage::exists($oldImagePath)){
              Storage::delete($oldImagePath);
            }
        }
        $imageName = Storage::put('images',$request->file('image'));
        Auth::user()->profile_image = $imageName;
        Auth::user()->save();
}

    return redirect()->route('profile');



  }
}
