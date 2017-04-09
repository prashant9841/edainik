<?php

namespace App\Http\Controllers;

use Auth;
use App\Post;
use Illuminate\Http\Request;

class UserPostController extends Controller
{
    /**
     * UserPostController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Displays all the posts of the user
     * @return $this
     */
    public function index()
    {
        return view('dashboard.post.index')->with('posts', Auth::user()->posts()->latest()->get());
    }

    /**
     * Displays individual post of the user
     * @param $id
     * @return $this
     */
    public function show($id)
    {
        return view('dashboard.post.show')->with('post', Auth::user()->posts()->findOrFail($id));
    }

    /**
     * Displays the edit form for upadating the resource
     * @param $id
     * @return $this
     */
    public function edit($id)
    {
        return view('dashboard.post.edit')->with('post', Auth::user()->posts()->findOrFail($id));
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('dashboard.post.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if (Auth::user()->posts()->create($this->getStub($request))) {
            return redirect()->to('/dashboard/posts');
        }
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        if (Auth::user()->posts()->findOrFail($id)->update($request->toArray())) {
            return redirect()->to('/dashboard/posts/' . $id);
        }
        return redirect()->back();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        if (Auth::user()->posts()->findOrFail($id)->delete()) {
            return redirect()->to('/dashboard/posts');
        }
        return redirect()->back();
    }

    protected function attachImage($model,$request,$requestClass ='image', $collection = 'images')
    {
        return $model->addMediaFromRequest($requestClass)->toCollection($collection);
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
            'status' => ($request->status == 'on') ? 1 : 0,

        ];
    }
}
