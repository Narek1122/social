<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserCOntroller;
use App\Http\Controllers\PostController;
use App\User;
use App\Post;
use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('users',[UserCOntroller::class ,'apiStore']);

Route::get('users',[UserCOntroller::class ,'GetUsers']);


Route::post('tests',[UserCOntroller::class ,'getPass']);


Route::get('user',function(){

  dd(Auth::user());

})->middleware('auth:api');

Route::group(["middleware" => ["auth:api"]],function(){

Route::get('users/{user}',[UserCOntroller::class ,'GetIdUsers']);

Route::patch('posts/{post}/likes',[PostController::class, 'apiupdate']);

Route::get('posts/{post}/likes',[PostController::class, 'apiGetLikes']);

Route::get('me/post-likes',[UserCOntroller::class ,'getLikedPost']);



});

Route::get('tests',function(){

  // dd(User::where('age','>',20)->where('age','<',30)->orWhere('age','>',40)->where('age','<',60)->get());

    $user = DB::table('users')->where('age','>',20)->get();

    dd($user);


});
