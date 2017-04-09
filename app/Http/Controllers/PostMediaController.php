<?php

namespace App\Http\Controllers;

use Auth;
use Spatie\MediaLibrary\Media;
use Illuminate\Http\Request;

class PostMediaController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function detachImageFromPost($postId,$mediaId)
    {
        //Detach the image without removing
    }
    public function deleteImage($mediaId)
    {
        if(Media::findOrFail($mediaId)->delete())
        {
            return redirect()->back();
        }
        return redirect()->back();
    }

    
    public function removeImage($postId,$mediaId)
    {
        if( in_array($mediaId, Auth::user()->posts()->findOrFail($postId)->getMedia('images')->pluck('id')->toArray())  )
        {
        	Media::findOrFail($mediaId)->delete();
        	return redirect()->back();
        }
        return redirect()->back();
    }

    public function removeByPost($postId)
    {
    	if(Auth::user()->posts()->findOrFail($postId)->clearMediaCollection())
        {
            return redirect()->back();
        }
        return redirect()->back();
    }
}
