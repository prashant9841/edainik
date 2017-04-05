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
    	$view = $post->approved()->find($post->id)->first() ?? abort(404);
    	return view('posts.show')->with('post',$view);
    }
}
