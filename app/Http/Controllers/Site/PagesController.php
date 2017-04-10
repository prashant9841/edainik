<?php

namespace App\Http\Controllers\Site;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function homepage(Post $post)
    {
    	return view('welcome')
    	->with('posts', $post->approved()->latest()->get())
    	->with('latestNews', $post->approved()->latest('updated_at')->get());
    }
}
