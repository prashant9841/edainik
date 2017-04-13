<?php

namespace App\Http\Controllers;

use Auth;
use App\Post;
use App\Http\Requests\PostRequest;
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
    public function index(Request $request)
    {
        return view('dashboard.post.index')->with('posts',$this->getPostFromQuery($request));
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
    public function store(PostRequest $request)
    {
        if ($post = Auth::user()->posts()->create($this->getStub($request))) 
        {
            if($request->hasFile('image')) 
            {
                foreach($request->image as $image){
                    $post->addMedia($image)->toMediaCollection('images');
                }
            }
            return redirect()->to('/dashboard/posts');
        }
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PostRequest $request, $id)
    {
        $post = Auth::user()->posts()->findOrFail($id);

        if ($request->hasFile('image')) {
            foreach($request->image as $image){
                $post->addMedia($image)->toMediaCollection('images');
            }

        }

        if ($post->update($this->getStub($request))) {
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

    /**w
     * @param Request $request
     * @return array
     */
    protected function getStub(Request $request)
    {
        return [
            'title' => $request->title,
            'content' => $request->content,
            'description' => $request->description,
            'category_id' => ($request->category_id)?? null,
            'status' => ($request->status == 'on') ? 1 : 0,
        ];
    }

    protected function getPostFromQuery(Request $request)
    {
        $userPost = Auth::user()->posts();
        switch ($request->status) {
            case 'verified':
                $post =  $userPost->where(['verified' => true, 'status' => true])->latest()->get();
                break;

            case 'unverified':
                $post =  $userPost->where('verified', false)->latest()->get();
                break;

            case 'published':
                $post =  $userPost->where('status',true)->latest()->get();
                break;

            case 'unpublished':
                $post =  $userPost->where('status',false)->latest()->get();
            
            default:
                $post =  $userPost->latest()->get();
                break;
        }
        return $post;
    } 
}
