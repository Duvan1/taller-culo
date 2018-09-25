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
    	$photoUrl = Storage::url($photo);
    	Photo::create([
    		'url' => $photoUrl,
    		'post_id' => $id
    	]);

    }
    public function destroy(Photo $photo)
    {
        $photo->delete();
        $photoPath = str_replace('storage', 'public', $photo->url);
        Storage::delete($photoPath);
        return back()->with('flash','Foto Eliminada');
    }
}
