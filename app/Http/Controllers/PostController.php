<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;

class PostController extends Controller
{
    public function create(){
      return view('posts');
    }

    public function store(Request $request){

      $validated = $request->validate([
        'data' => 'required|min:6|max:256'
      ]);

      $validated['user_id'] = Auth::user()->id;
      Post::create($validated);

      return redirect()->route('profile');

    }


}
