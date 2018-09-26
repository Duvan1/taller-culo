<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    public function show(Tag $tag)
    {
    	//return $tag->posts();
    	return view('welcome', [
    		'title' => 'Posts por tag: '.$tag->name,
    		'posts' => $tag->posts()->paginate()
    	]);
    }
}
