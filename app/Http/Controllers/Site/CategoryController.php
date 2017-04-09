<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * @param Category $category
     * @return $this
     */
    public function index(Category $category)
    {
        return view('category.index')->with('categories', $category->all());
    }

    /**
     * @param Category $category
     * @return $this
     */
    public function show(Category $category)
    {
        return view('category.show')->with('category', $category);
    }
}
