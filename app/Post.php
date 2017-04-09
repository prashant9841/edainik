<?php

namespace App;

use Spatie\Sluggable\{HasSlug,SlugOptions};
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

class Post extends Model implements HasMedia
{
    use HasSlug,HasMediaTrait;

	protected $fillable = ['title','slug','content','status','verified','publish_on','description' ];

	protected $casts = ['publish_on' => 'date', 'status' => 'boolean', 'verified' => 'boolean'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function getFirstImageUrl()
    {
        if($this->getMedia('images')->first()){
            return $this->getMedia('images')->first()->getUrl();
        }
        return 'https://www.lorempixel.com/200/300';
    }
    public function approved()
    {
    	return $this->where(['verified' => true, 'status' =>true]);
    }

    public function attachImageFromRequest($field = 'image' ,$collection = 'images')
    {
        return $this->addMediaFromRequest($field)->toMediaCollection('images');
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
