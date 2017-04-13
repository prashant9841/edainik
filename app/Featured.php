<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Featured extends Model
{
    protected  $fillable = ['type','date'];

    public function post()
    {
    	return $this->belongsTo(Post::class);
    }
}
