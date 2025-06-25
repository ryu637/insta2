<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    #post
    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
    Route::get('/post/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
    Route::patch('/post/update/{id}',[PostController::class, 'update'])->name('post.update');
    Route::delete('/post/{id}/delete', [PostController::class, 'destroy'])->name('post.destroy');

    #liked 
    Route::post('/like/{post_id}/store', [LikeController::class, 'store'])->name('like.store');
    Route::delete('/like/{post_id}/delete', [LikeController::class, 'delete'])->name('like.delete');

});