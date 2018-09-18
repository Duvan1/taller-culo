<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PhotoController extends Controller
{
    public function store(Post $post)
    {
    	return 'Procesando imagen...';
    }
}
