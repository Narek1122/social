<?php

namespace App\Services;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use \Illuminate\Http\Request;

class UserServices
{

  protected $user;

  public function __construct(User $user){
    $this->user = $user;
  }


    public function update($validated){

      $validated = array_filter($validated,function($value){
        return !empty($value);
      });

      $this->user->update($validated);


      if(isset($validated['image'])){
        $image = $validated['image'];
        if($this->user->profile_image){
            $oldImagePath = $this->user->profile_image;
            if(Storage::exists($oldImagePath)){
              Storage::delete($oldImagePath);
            }
        }
        $imageName = Storage::put('images',$image);
        Auth::user()->profile_image = $imageName;
        Auth::user()->save();
      }
    }


}


 ?>
