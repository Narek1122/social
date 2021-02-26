<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;

class PostController extends Controller
{

  public function apiUpdate(Post $post){

    $post->likes()->syncWithoutDetaching(Auth::user()->id);
    return response()->json([
      'status' => 1,
    ]);

  }

  public function apiGetLikes(Post $post){

    $post->load('likes');

    $emails = $post->likes->pluck('email');


    return response()->json([
      'ststus' => 1,
      'data' => [
        'count' => $post->likes->count(),
        'users' => $emails
      ]

    ]);

  }

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
