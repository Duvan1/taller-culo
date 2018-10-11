<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;


class PostController extends Controller
{
    public function index()
    {
    	# code...
    	$posts = Post::latest('published_at')->paginate(15);
    	return view('welcome', compact('posts'));
    }

    public function show(Post $post)
    {
        //if ($post->isPublished() || auth()->check()) {
        //    return view('posts.show', compact('post'));
        //}
        abort(404);    	
    }

    public function about()
    {
        return view('page.about');
    }

    public function contact()
    {
        return view('page.contact');
    }

    public function archive()
    {
        return view('page.archive');
    }
}
