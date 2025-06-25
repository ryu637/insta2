<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class HomeController extends Controller
{

    private $post;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Post $post_model)
    {
        $this->post = $post_model;
        $this->middleware('auth');
    }

    public function getHomePosts(){
        $all_posts = $this->post->latest()->get();
        return $all_posts;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $all_posts = $this->getHomePosts();
        return view('users.home')->with('all_posts',$all_posts);
    }
}
