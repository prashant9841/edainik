<?php

namespace App\Http\Controllers;

use App\{Post,Featured};
use Illuminate\Http\Request;

class PostFeaturedController extends Controller
{
	public function __construct(){
		return $this->middleware('auth');
	}

    public function toggleFeatured($postId)
    {
    	$this->checkPost($postId);
    	if($this->checkFeaturedPost($postId))
    	{
    		$this->checkFeaturedPost($postId)->delete();
    		return redirect()->back();
    	}
    	Featured::create(['type'=>1,'post_id' => $postId]);
		return redirect()->back();
    }

    public function checkPost($postId)
    {
    	return Post::findOrFail($postId);
    }

    public function checkFeaturedPost($postId)
    {
    	return Featured::where('post_id',$postId)->first();
    }

    public function index()
    {
        $featured = Featured::latest()->take(20)->get();
        $posts = $featured->map(function($value){
            return $value->post;
        });

        return view('dashboard.featured.index')->with('posts',$posts);

    }
}
