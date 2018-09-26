<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $guarded = [];
    protected $dates = ['published_at'];

    public function getRouteKeyName()
    {
        return 'url';
    }

    public function category()
    {
    	return $this->belongsTo(Category::class);//relacion con categorias 1:n
    }
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
    public function tags()
    {
    	return $this->belongsToMany(Tag::class);//relacion con tags n:n
    }
    public function scopePublished($query)
    {
        $query->whereNotNull('published_at')
        ->where('published_at', '<=',Carbon::now())
        ->latest('published_at');
    }

    public function setTitleAttribute($title)
    {
        $this->attributes['title'] = $title;
        $this->attributes['url'] = str_slug($title);
    }
}
