<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function show(category $category)
    {
    	//$posts = $category->posts;
    	return view('welcome', [
    		'title' => 'Posts por categorias: '.$category->name,
    		'posts' => $category->posts()->paginate()
    	]);
    }
}
