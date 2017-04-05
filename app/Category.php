<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $fillable = ['title','slug'];

	protected $with = ['approvedPosts'];

	public function menu()
	{
		return $this->has(Menu::class);
	}

	public function posts()
	{
		return $this->hasMany(Post::class);
	}

	public function approvedPosts()
	{
		return $this->hasMany(Post::class)->where('verified', 1)->where('status', 1);
	}
}
