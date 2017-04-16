<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{

    /**
     * AdminPostController constructor.
     */
    public function __construct()
    {
        return $this->middleware('superAdmin');
    }

    /**
     * @param $postId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verify($postId)
    {
        if (Post::findOrFail($postId)->update(['verified' => 1])) {
            return redirect()->back();
        }
        return redirect()->back();
    }

    /**
     * @param $postId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unVerify($postId)
    {
        if (Post::findOrFail($postId)->update(['verified' => 0])) {
            return redirect()->back();
        }
        return redirect()->back();
    }

    /**
     * @return $this
     */
    public function index()
    {
        return view('dashboard.post.index')->with('posts', Post::all());
    }

    /**
     * @param $id
     * @return $this
     */
    public function show($id)
    {
        return view('dashboard.post.show')->with('post', Post::findOrFail($id));
    }

    /**
     * @param $id
     * @return $this
     */
    public function edit($id)
    {
        return view('dashboard.post.edit')->with('post', Post::findOrFail($id));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        if (Post::findOrFail($id)->update($this->getStub($request))) {
            //Redirect to admin dash
        }
        return redirect()->back();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        if (Post::findOrFail($id)->delete()) {
            return redirect()->back();
            //Redirect to admin dash
        }
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return array
     */
    protected function getStub(Request $request)
    {
        return [
            'title' => $request->title,
            'content' => $request->content,
            'description' => $request->description,
            'status' => ($request->status == 'on') ? 1 : 0,

        ];
    }

}
