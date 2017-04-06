<?php

namespace App\Http\Controllers;

use App\{Menu,Category};
use Illuminate\Http\Request;

class MenuController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Menu $menu, Category $category)
    {
        return view('dashboard.menu.index')
                ->with([
                    'menus' => $menu->orderBy('order','DESC')->get(), 
                    'categories' => $category->all()
                    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Menu $menu, Category $category,Request $request)
    {
        $category = $category->findOrFail($request->category_id);
        $order = ($menu->latest()->first()) ? $menu->latest()->first()->order : 0;
        if($menu->create(['category_id'=>$category->id, 'order' => $order + 1 ])){
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu,$id)
    {
        if($menu->findOrFail($id)->delete())
        {
            return redirect()->back();
        }
    }
}
