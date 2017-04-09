<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        return view('category.index')->with('categories', $category->all());
    }

    public function show(Category $category)
    {
        return view('category.show')->with('category', $category);
    }
}
