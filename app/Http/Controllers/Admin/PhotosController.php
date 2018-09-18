<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhotosController extends Controller
{
    public function store($id)
    {
    	$post = Post::find($id);
    	return "Esto muestra un producto. Recibiendo $post";
    }
}
