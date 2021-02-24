<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
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
use App\Http\Controllers\PostController;


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


Route::post('/logout',[UserCOntroller::class, 'logout'])->name('logout')->middleware('checkUserAuth');


Route::get('/posts',[PostController::class, 'create'])->name('post-create')->middleware('checkUserAuth');

Route::post('/posts',[PostController::class, 'store'])->name('store-posts')->middleware('checkUserAuth');

Route::get('me/edit',[UserController::class, 'edit'])->name('user.edit');

Route::post('me/edit',[UserController::class, 'update'])->name('user.update');

Route::get('/me/profile/image',[UserCOntroller::class, 'getProfileImage'])->name('userProfileImage');




  Route::group(['middleware' => ['checkUserAuth']],function(){
  Route::post('/logout',[UserCOntroller::class, 'logout'])->name('logout');


  Route::get('/posts',[PostController::class, 'create'])->name('post-create');

  Route::post('/posts',[PostController::class, 'store'])->name('store-posts');


});
