<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ViewCount extends Model
{
    protected $fillable = ['post_id','count'];

    protected $casts = ['count' => 'integer'];

    public function post()
    {
    	return $this->belongsTo(Post::class);
    }
}
