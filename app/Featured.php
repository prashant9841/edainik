<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Featured extends Model
{
    protected  $fillable = ['type','post_id'];

    public function post()
    {
    	return $this->belongsTo(Post::class,'post_id');
    }
}
