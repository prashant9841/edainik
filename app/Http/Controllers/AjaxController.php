<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getAllPosts(Request $request,Post $post)
    {

    	return $post->select('title','description','created_at','updated_at','slug','status','verified','publish_on')->get();

    }
}
