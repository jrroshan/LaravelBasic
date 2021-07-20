<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function index()
    {

        return view('posts.index', [
            'posts' =>  Post::latest()->filter(request(['search','category']))->get(),/*$this->getPosts(),/*->with('category','author')->get(),*/
            // 'categories' => Category::all(),
            // 'currentCategory' => Category::firstWhere('slug',request('category'))
        ]);
    }

    public function show(Post $post)
    {
        // Find a post by its slug and pass it to a view called "post"
        return view('posts.show', [
            'post' => $post
        ]);
    }

    protected function getPosts()
    {

        
        // $post = Post::latest();
        // if (request('search')) {
        //     $post->where('title', 'like', '%' . request('search') . '%')
        //         ->orWhere('body', 'like', '%' . request('search') . '%');
        // }

        // return $post->get();
    }
}
