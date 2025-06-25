<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
    protected $table = 'category_posts';
    protected $fillable = ['category_id', 'post_id'];
    public $timestamps = false;
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
