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

Route::get('about',[UserController::class, 'about']);

Route::get('/profile',[UserController::class, 'profile'])->name('profile')->middleware('checkUserAuth');





Route::get('/login',[UserCOntroller::class, 'login'])->name('login');




Route::post('/login', [UserCOntroller::class, 'signIn'])->name('post-login');


Route::get('user/{id}',function($id){

  print_r($id);
});

Route::get('/signup',[UserCOntroller::class, 'signUp'])->name('signup');

Route::post('/registr',[UserCOntroller::class, 'registr']);

Route::get('/test',function(){

  $user = User::whereAge(10)->first();
  dd($user);
Route::post('/about',[UserCOntroller::class, 'about']);



});

Route::post('/logout',[UserCOntroller::class, 'logout'])->name('logout')->middleware('checkUserAuth');
