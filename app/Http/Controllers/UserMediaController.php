<?php

namespace App\Http\Controllers;

use Auth;
use Spatie\MediaLibrary\Media;
use Illuminate\Http\Request;

class UserMediaController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.media.index')->with('medias', Media::whereIn('model_id', Auth::user()->posts()->pluck('id'))->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.media.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \Spatie\MediaLibrary\Media $media
     * @return \Illuminate\Http\Response
     */
    public function show(Media $media)
    {
        return view('dashboard.media.show')->with('media', $media);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Spatie\MediaLibrary\Media $media
     * @return \Illuminate\Http\Response
     */
    public function edit(Media $media)
    {
        return view('dashboard.media.edit')->with('media', $media);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Spatie\MediaLibrary\Media $media
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserMediaController $media)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Spatie\MediaLibrary\Media $media
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserMediaController $media)
    {
        //
    }
}
