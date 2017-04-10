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
    public function show($slug,Post $p,Category $category)
    {
        if ($post = $p->approved()->where('slug',$slug)->first()) {
            return view('posts.show')
                ->with('post', $post)
                ->with('latestNews',$this->getRelated($post->category_id,$category));
        }
        abort(404);
    }

    public function getRelated($id = null,Category $category)
    {
        if(!$id){
            return $category->latest()->first()->posts()->where(['status' => 1,'verified'=>1])->latest()->get();
        }
        return $category->findOrFail($id)->posts()->where(['status' => 1,'verified'=>1])->latest()->get();
    }
}
