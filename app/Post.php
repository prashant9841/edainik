<?php

namespace App;

use Spatie\Sluggable\{HasSlug,SlugOptions};
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasSlug;

	protected $fillable = ['title','slug','content','status','verified','publish_on' ];

	protected $casts = ['publish_on' => 'date', 'status' => 'boolean', 'verified' => 'boolean'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function approved()
    {
    	return $this->where('verified',true)->where('status',true);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
}
