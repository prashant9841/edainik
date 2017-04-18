<?php

namespace App\Http\Controllers\Site;

use App\{Post,Category,ViewCount,Featured};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function homepage(Post $post,Category $category)
    {
    	return view('welcome')
    	->with('posts', $this->getFeatured($post))
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

    protected function getFeatured($post)
    {
        if($featured = Featured::select('post_id')->latest()->take(10)->get())
        {
           return $post->whereIn('id',$featured->pluck('post_id')->toArray())->latest()->take(8)->get();
        }
	   return $post->latest()->take(8)->get();
    } 
}
