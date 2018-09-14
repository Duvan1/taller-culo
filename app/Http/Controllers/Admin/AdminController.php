<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Post;
use App\Category;
use App\Tag;

class AdminController extends Controller
{
    public function index()
    {
    	$posts = Post::all();
    	return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
      $tags = Tag::all(); 
    	$categories = Category::all();
    	return view('admin.posts.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
      $this->validate($request,[
        'title'=>'required',
        'body'=>'required',
        'excerpt'=>'required',
        'category'=>'required'
      ]);
      $post = new Post;
      $post->title = $request->get('title');
      $post->url = str_slug($request->get('title'));
      $post->body = $request->get('body');
      $post->excerpt = $request->get('excerpt');
      $post->published_at = Carbon::parse($request->get('published_at'));
      $post->category_id = $request->get('category');      
      $post->save();
      $post->tags()->attach($request->get('tags'));

    return back()->with('flash', 'publicación creada.');

    }
}
