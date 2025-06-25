<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    protected $fillable = ['user_id','description','image'];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function categoryPosts(){
        return $this->hasMany(CategoryPost::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function isLiked(){
        return $this->likes()->where('user_id',Auth::user()->id)->exists();
    }
}
