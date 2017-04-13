<?php

namespace App;

use Spatie\Sluggable\{HasSlug,SlugOptions};
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;

class Post extends Model implements HasMediaConversions
{
    use HasSlug,HasMediaTrait;

	protected $fillable = ['title','slug','content','status','verified','publish_on','description','category_id'];

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
        return 'https://www.lorempixel.com/200/200/news';
    }

    public function published()
    {
        return $this->where(['status' => true]);
    }

    public function unPublished()
    {
        return $this->where(['status' => false]);
    }
    
    public function approved()
    {
        return $this->where(['verified' => true, 'status' => true]);
    }

    public function unApproved()
    {
    	return $this->where(['verified' => false, 'status' => false]);
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
