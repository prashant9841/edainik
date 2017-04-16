<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\{Post,Category};
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * @param Post $post
     * @return $this
     */
    public function index(Post $post)
    {
        return view('posts.index')->with('posts', $post->approved()->get());
    }

    /**
     * @param Post $post
     * @return $this
     */
    public function show($post)
    {
        $post = (Post::where('slug',$post)->first()) ?? abort(404);
        if ($post->status === true && $post->verified === true) {
            $this->incrementCounter($post);
            return view('posts.show')
                ->with('post', $post)
                ->with('latestNews',$this->getRelated(null))
                ->with('relatedNews',$this->getRelated($post->category_id));
        }
        abort(404);
    }

    public function getRelated($id = null)
    {
        if(is_null($id)){
            return Category::all()->shuffle()->first()->posts()->where(['status' => 1,'verified'=>1])->latest()->take(5)->get();
        }
        return Category::findOrFail($id)->posts()->where(['status' => 1,'verified'=>1])->latest()->take(5)->get();
    }

    public function incrementCounter($post)
    {
        if($post->viewCount && $post->viewCount->count){
            $counter = $post->viewCount->count+1;
            return $post->viewCount()->update(['count' => $counter]);
        }
        return $post->viewCount()->create(['count' => 1]);
    }
}
