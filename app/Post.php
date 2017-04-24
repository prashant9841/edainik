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

	protected $fillable = ['title','slug','content','status','verified','publish_on','description','category_id','callout','subtitle','address','author'];

	protected $casts = ['publish_on' => 'date', 'status' => 'boolean', 'verified' => 'boolean'];


    public function featured()
    {
        return $this->hasOne(Featured::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function relatedPost()
    {
        return $this->where(['category_id' => $this->category_id]);
    }
    
    //Get Related Posts which are approved and of same category
    public function approvedSiblings()
    {
        return $this->relatedPost()->where(['status' => 1, 'verified' => 1]);
    }

    public function getFirstImageUrl($type = '')
    {
        if($this->checkImage()){
            return $this->getMedia('images')->first()->getUrl($type);
        }
        return '//:0';
    }
    public function checkImage($collection = 'images')
    {
        return ($this->getMedia('images')->count()) ? true : false;
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
             ->setManipulations(['w' => 150, 'h' => 150])
             ->performOnCollections('images');

        $this->addMediaConversion('small')
             ->setManipulations(['w' => 250, 'h' => 150])
             ->performOnCollections('images');

    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function viewCount()
    {
        return $this->hasOne(ViewCount::class);
    }
}