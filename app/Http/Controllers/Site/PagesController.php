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
        ->with('sidebarCategory', $approvedCategory->where('on_sidebar',true)->get())
        ->with('posts', $this->getFeatured($post)) //This is featured Post
        ->with('latestNews', $post->approved()->latest()->take(20)->get())
        ->with('trendingNews', $this->getTrending())
        ->with('categoriesList', $approvedCategory->where('on_homepage',true)->get());
    }

    protected function getTrending()
    {
        
        $trendingPost = ViewCount::all()->sortByDesc('count')->take(12)->pluck('post_id');
        $posts = Post::whereIn('id',$trendingPost)->where(['status'=>1,'verified'=>1])->take(10)->get();
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

    public function testkit(Post $post,Category $category)
    {
        $approvedCategory = $category->where('status',1);
        dd($approvedCategory->where('on_sidebar',true)->get());
        return view('welcome')
        ->with('posts', $this->getFeatured($post)) //This is featured Post
        ->with('latestNews', $post->approved()->latest()->take(20)->get())
        ->with('trendingNews', $this->getTrending())
        ->with('categoriesList', $approvedCategory->where('on_homepage',true)->get())
        ->with('sidebarCategory', $approvedCategory->where('on_sidebar',true)->get());
    }
}
