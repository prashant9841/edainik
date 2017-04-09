<?php

namespace App\Http\Controllers;

use Auth;
use Spatie\MediaLibrary\Media;
use Illuminate\Http\Request;

class PostMediaController extends Controller
{
    /**
     * Only Logged In users can view
     * PostMediaController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Detach Image from post without removing
     * @param $postId
     * @param $mediaId
     */
    public function detachImageFromPost($postId, $mediaId)
    {
        //Detach the image without removing
    }

    /**
     * @param $mediaId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteImage($mediaId)
    {
        if (Media::findOrFail($mediaId)->delete()) {
            return redirect()->back();
        }
        return redirect()->back();
    }


    /**
     * @param $postId
     * @param $mediaId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeImage($postId, $mediaId)
    {
        if (in_array($mediaId, Auth::user()->posts()->findOrFail($postId)->getMedia('images')->pluck('id')->toArray())) {
            Media::findOrFail($mediaId)->delete();
            return redirect()->back();
        }
        return redirect()->back();
    }

    /**
     * @param $postId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeByPost($postId)
    {
        if (Auth::user()->posts()->findOrFail($postId)->clearMediaCollection()) {
            return redirect()->back();
        }
        return redirect()->back();
    }
}
