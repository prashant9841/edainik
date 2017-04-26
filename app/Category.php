<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $fillable = ['title','slug','status','header_color','icon'];


	public function menu()
	{
		return $this->hasOne(Menu::class);
	}


	//get the wildcard slug
    public function getRouteKeyName()
    {
        return 'slug';
    }

	public function published()
	{
		return $this->where('status',1);
	}

	public static function active()
	{
		return self::where('status',1);
	}

	public function unPublished()
	{
		return $this->where('status',0);
	}

	public function posts()
	{
		return $this->hasMany(Post::class,'category_id');
	}

	public function approvedPosts()
	{
		return $this->posts()->where('verified', 1)->where('status', 1)->latest();
	}

	public static function approvedPost()
	{
		return $self::posts()->where('verified', 1)->where('status', 1);
	}

	public function unApprovedPosts()
	{
		return $this->post()->where('verified', 0)->where('status', 0);
	}

	public function userPosts($id)
	{
		return $this->hasMany(Post::class)->where('user_id', $id)->get();
	}
}
