<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\StoreRequest;

use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    private $category;
    private $post;

    public function __construct(Post $post_model, Category $category_model) {
        $this->post = $post_model;
        $this->category = $category_model;
    }

    public function create(){
        $all_categories = $this->category->all();
        return view('users.posts.create')->with('all_categories', $all_categories);
    }

    // public function store(Request $request){
    //     $request->validate([
    //         'category' => 'required|array|between:1,3',
    //         'description' => 'required|min:1|max:1000',
    //         'image' => 'required|mimes:jpeg,jpg,png,gif|max:1048'
    //     ]);

    //     $this->post->user_id = 1;
    //     $this->post->image   = 'data:image/'. $request->image->extension().';base64,'.base64_encode(file_get_contents($request->image));
    //     $this->post->description = $request->description;
    //     $this->post->save();

    //     $category_post = [];
    //     foreach($request->category as $category_id){
    //         $category_post [] = ['category_id'=>$category_id];
    //     }
    //     $this->post->categoryPosts()->createMany($category_post);
    //     return redirect()->route('home');

    // }

    public function store(StoreRequest $request){
        $post = Post::create([
            'user_id' => Auth::user()->id,
            'description' => $request->description,
            'image' => 'data:image/'. $request->image->extension().';base64,'.base64_encode(file_get_contents($request->image))
        ]);

        $category_post = [];
           foreach($request->category as $category_id){
               $category_post [] = ['category_id'=>$category_id];
            }
            $post->categoryPosts()->createMany($category_post);

            return redirect()->route('home');
    }
}
