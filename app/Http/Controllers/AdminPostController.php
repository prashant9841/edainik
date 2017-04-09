<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
	public function __contruct()
	{
		$this->middleware('superAdmin');
	}
	
	public function verify($postId)
	{
		if(Post::findOrFail($postId)->update(['verified' => 1]))
		{
			return redirect()->back();
		}
		return redirect()->back();
	}

	public function unVerify($postId)
	{
		if(Post::findOrFail($postId)->update(['verified' => 0]))
		{
			return redirect()->back();
		}
		return redirect()->back();
	}

	public function index()
	{
		return view('dashboard.post.index')->with('posts',Post::all());
	}

	public function show($id)
	{
		return view('dashboard.post.show')->with('post',Post::findOrFail($id));
	}

	public function edit($id)
	{
		return view('dashboard.post.edit')->with('post',Post::findOrFail($id));
	}

	public function update(Request $request,$id)
	{
		if(Post::findOrFail($id)->update($this->getStub($request)))
		{
			//Redirect to admin dash
		}
		return redirect()->back();
	}

	public function delete($id)
	{
		if(Post::findOrFail($id)->delete())
		{
			return redirect()->back();
			//Redirect to admin dash
		}
		return redirect()->back();
	}

	protected function getStub(Request $request)
	{
		return [
            'title' => $request->title,
            'content' => $request->content,
            'status' => ($request->status == 'on') ? 1 : 0,

        ];
	} 

}
