<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'index']);
    }

    /**
     * Display all the categories
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        return view('dashboard.category.index')->with('categories', $category->all());
    }

    /**
     * View for creating a new category
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.category.create');
    }

    /**
     * Store a newly created category in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Category::create($this->getStub($request))) {
            return redirect()->to('/dashboard/categories');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {

        return view('dashboard.category.show')->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('dashboard.category.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Category::findOrFail($id)->update($this->getStub($request))) {
            return redirect()->to('/dashboard/categories/' . $id);
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Category::findOrFail($id)->delete()) {
            return redirect()->to('/dashboard/categories');
        }
        return redirect()->back();
    }

    protected function getStub($request)
    {
        $data = [
            'title' => $request->title,
        ];
        //If the slug exists
        if (strlen($request->slug) > 5) {
            $data = array_merge($data, ['slug' => str_slug($request->slug)]);
        }

        return $data;
    }
}
