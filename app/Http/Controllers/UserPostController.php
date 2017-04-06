<?php

namespace App\Http\Controllers;

use Auth;
use App\Post;
use Illuminate\Http\Request;

class UserPostController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth')->except(['index','show']);
	}

    public function index()
    {
        return view('dashboard.post.index')->with('posts',Auth::user()->posts()->latest()->get());
    }

    public function show($id)
    {
    	return view('dashboard.post.show')->with('post',Auth::user()->posts()->findOrFail($id));
    }

    public function create()
    {
    	return view('dashboard.post.create');
    }
    public function store(Request $request)
    {

    	if(Auth::user()->posts()->create($this->getStub($request))){
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

    protected function getStub(Request $request)
    {
        return [
            'title' => $request->title,
            'content' => $request->content,
            'status' => ($request->status == 'on') ? 1:0,

        ];
    } 
}
