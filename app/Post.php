<?php

namespace App;

use Spatie\Sluggable\{HasSlug,SlugOptions};
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

class Post extends Model
{
    use HasSlug,HasMediaTrait;

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

    public function registerMediaConversions()
    {
        $this->addMediaConversion('thumb')
             ->setManipulations(['w' => 300, 'h' => 200])
             ->performOnCollections('images');
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
}
