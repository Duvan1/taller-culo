<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Post;
use App\Category;
use App\Tag;
use App\Http\Requests\StorePostRequest;


class AdminController extends Controller
{
    public function index()
    {
    	$posts = Post::all();
    	return view('admin.posts.index', compact('posts'));
    }

    /*
    public function create()
    {
      $tags = Tag::all(); 
    	$categories = Category::all();
    	return view('admin.posts.create', compact('categories', 'tags'));
    }*/

    public function store(Request $request)
    {
      $this->validate($request,['title'=>'required']);
      $post = Post::create($request->only('title'));
      return redirect()->route('admin.posts.edit', $post);
    }

    public function edit(Post $post)
    {
      $tags = Tag::all(); 
      $categories = Category::all();
      return view('admin.posts.edit', compact('categories', 'tags', 'post'));
    }

    
    public function update(Post $post, StorePostRequest $request)
    {
      $post->update($request->all());

      $post->save();
      $post->syncTags($request->get('tags'));

    return redirect()->route('admin.posts.edit', $post)->with('flash', 'publicación guardada.');

    }
    
}
