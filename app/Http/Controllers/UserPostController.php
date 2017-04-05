<?php

namespace App\Http\Controllers;

use Auth;
use App\Post;
use Illuminate\Http\Request;

class UserPostController extends Controller
{
	public function _constructor()
	{
		$this->middleware('auth')->except(['index','show']);
	}

    public function index()
    {
    	return Auth::user()->posts;
    }

    public function show($id)
    {
    	return Auth::user()->post()->findOrFail($id);
    }

    public function create(Request $request)
    {
    	if(Auth::user()->posts()->create($request->toArray())){
    		return "Created";
    	}
		return "ERROR";
    }

    public function update(Request $request,$id)
    {
    	if(Auth::user()->posts()->findOrFail($id)->update($request->toArray())){
    		return "updated";
    	}
		return "ERROR";
    }

    public function delete($id)
    {
    	if(Auth::user()->posts()->findOrFail($id)->delete())
    	{
    		return 'DELETED';
    	}
		return 'ERROR';
    }
}
