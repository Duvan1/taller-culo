<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
    public function store($id)
    {
    	$this->validate(request(),[
    		'photo' => 'required|image|max:2048'
    	]);    	
    	$post = Post::find($id);
    	$photo = request()->file('photo')->store('public');  
    	$photoUrl = Storage::url('app/'.$photo);
    	Photo::create([
    		'url' => $photoUrl,
    		'post_id' => $id
    	]);

    }
}
