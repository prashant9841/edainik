<?php

namespace App\Http\Controllers\Site;

use App\{Post,Category,ViewCount,Featured};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function homepage(Post $post,Category $category)
    {
        $approvedCategory = $category->where('status',1);
    	return view('welcome')
    	->with('posts', $this->getFeatured($post))
    	->with('latestNews', $post->approved()->latest()->take(5)->get())
    	->with('trendingNews', $this->getTrending())
    	->with('featuredCategory', $approvedCategory->get()->random()->first())
        ->with('categoriesList', $approvedCategory->get());
    }

    protected function getTrending()
    {
        
        $trendingPost = ViewCount::all()->sortByDesc('count')->take(5)->pluck('post_id');
        $posts = Post::whereIn('id',$trendingPost)->where(['status'=>1,'verified'=>1])->get();
        return $posts;
    } 

    protected function getFeatured($post)
    {
        if($featured = Featured::select('post_id')->latest()->take(10)->get())
        {
           return $post->whereIn('id',$featured->pluck('post_id')->toArray())->where(['status'=> 1,'verified' => 1])->latest()->take(8)->get();
        }
	   return $post->approved()->latest()->take(8)->get();
    } 
}
