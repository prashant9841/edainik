<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $fillable = ['title','slug'];

	protected $with = ['approvedPosts'];

	public function menu()
	{
		return $this->hasOne(Menu::class);
	}

	public function published()
	{
		return $this->where('status',1);
	}

	public function unPublished()
	{
		return $this->where('status',0);
	}

	public function posts()
	{
		return $this->hasMany(Post::class);
	}

	public function approvedPosts()
	{
		return $this->hasMany(Post::class)->where('verified', 1)->where('status', 1);
	}

	public function userPosts($id)
	{
		return $this->hasMany(Post::class)->where('user_id', $id)->get();
	}
}
