<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;


class PostController extends Controller
{
    public function index()
    {
    	# code...
    	$posts = Post::latest('published_at')->get();
    	return view('welcome', compact('posts'));
    }

    public function show(Post $post)
    {
        //$post = Post::find($id);
    	return view('posts.show', compact('post'));
    }

   
}
