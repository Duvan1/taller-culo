<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $fillable = [
      'title', 'body', 'iframe', 'excerpt', 'published_at', 'category_id', 'user_id'];
    protected $dates = ['published_at'];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($post)
        {
            $post->tags()->detach();
            $post->photos->each->delete();
        });
    }

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
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function scopePublished($query)
    {
        $query->whereNotNull('published_at')
        ->where('published_at', '<=',Carbon::now())
        ->latest('published_at');
    }

    public static function create(array $attributes=[])
    {
    	$post= static::query()->create($attributes);
    	$post->generateUrl();
      return $post;
    }

    public function generateUrl()
    {
    	$url = str_slug($this->title);
    	if ($this->where('url',$url)->exists()) {
    		$url = "{$url}-{$this->id}";
    	}
      $this->url = $url;
      $this->save();
    }

    /*public function setTitleAttribute($title)
    {
        $this->attributes['title'] = $title;
        $url = str_slug($title);
        $duplicateUrlCount = Post::where('url','LIKE', "{$url}%")->count();
        if ($duplicateUrlCount) {
            $url.= "-".++$duplicateUrlCount;
        }
        $this->attributes['url'] = str_slug($title);
    }*/

    public function setPublishedAtAttribute($published_at)
    {
        $this->attributes['published_at'] = $published_at
                            ? Carbon::parse($published_at)
                            : null;
    }

    public function setCategoryIdAttribute($category)
    {
        $this->attributes['category_id'] = Category::find($category)
                                            ? $category
                                            : Category::create(['name'=>$category])->id; 
    }

    public function syncTags($tags)
    {
        $tagsID= collect($tags)->map(function($tag){
        return Tag::find($tag) ? $tag : Tag::create(['name' => $tag])->id;
      });

      return $this->tags()->sync($tagsID);
    }

    public function isPublished()
    {
        return ! is_null($this->published_at) && $this->published_at < today();
    }
}
