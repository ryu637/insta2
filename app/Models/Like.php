<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{

    public $fillable = ['user_id','post_id'];
    public $timestamps = false;


}
