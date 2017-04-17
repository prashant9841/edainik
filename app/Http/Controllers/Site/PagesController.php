<?php

namespace App\Http\Controllers\Site;

use App\{Post,Category,ViewCount};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function homepage(Post $post,Category $category)
    {

    	return view('welcome')
    	->with('posts', $post->approved()->latest()->get())
    	->with('latestNews', $post->approved()->latest()->take(5)->get())
    	->with('trendingNews', $this->getTrending())
    	->with('featuredCategory', $category->get()->random()->first())
        ->with('categoriesList', $category->where('status',1)->take(3)->get()->shuffle());
    }

    protected function getTrending()
    {
    	
    	$trendingPost = ViewCount::all()->sortByDesc('count')->take(5)->pluck('post_id');
        $posts = Post::whereIn('id',$trendingPost)->get();
    	return $posts;
    } 
}
