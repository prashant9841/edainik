<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Post;
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
    public function show($slug,Post $p)
    {
        if ($post = $p->approved()->where('slug',$slug)->first()) {
            return view('posts.show')->with('post', $post);
        }
        abort(404);
    }
}
