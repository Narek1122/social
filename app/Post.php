<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{


    protected $fillable =[
      'user_id', 'data'
    ];

    public function user(){
      return $this->belongsTo(User::class);
    }

    public function likes(){
      return $this->belongsToMany(User::class,'user_post_like','post_id','user_id')->withTimestamps();
    }
}
