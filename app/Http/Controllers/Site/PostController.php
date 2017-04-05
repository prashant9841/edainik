<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Post $post)
    {
    	return view('posts.index')->with('posts',$post->approved()->get());
    }

    public function show(Post $post)
    {
    	if($post->status == 1 && $post->verified == 1){
	    	return view('posts.show')->with('post',$post);
    	}
    	abort(404);
    }
}
