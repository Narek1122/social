<?php

use Illuminate\Support\Facades\Route;
use App\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use \Illuminate\Http\Request;
use App\Http\Controllers\UserCOntroller;


Route::get('/',[UserController::class, 'index']);






Route::get('/login',[UserCOntroller::class, 'login']);




Route::post('/login', [UserCOntroller::class, 'signIn']);


Route::get('user/{id}',function($id){

  print_r($id);
});

Route::get('/signup',[UserCOntroller::class, 'signUp']);

Route::post('/registr',[UserCOntroller::class, 'registr']);

Route::get('/test',function(){

  $user = User::whereAge(10)->first();
  dd($user);



  //hhhhh
  //cerating new

  45545454
  hhhhh

  7kruryuk

  //new random text

  //rjjjrjrfj


});
