<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
   public function store($post_id){
    Like::create([
        'user_id' => Auth::user()->id,
        'post_id' => $post_id
    ]);

    return redirect()->back();
   } 

   public function delete($post_id){
    Like::where('user_id',Auth::user()->id)->where('post_id',$post_id)->delete();

    return redirect()->back();
   }
}
