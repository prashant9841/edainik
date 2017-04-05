<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $fillable = ['title','slug','content','status','verified','publish_on' ];

	protected $casts = ['publish_on' => 'date', 'status' => 'boolean', 'verified' => 'boolean'];
	
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
