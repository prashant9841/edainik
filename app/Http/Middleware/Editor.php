<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class Editor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth()->user()->isEditor() || auth()->user()->isEditor()){
            return $next($request);
        }
        return abort(403);
    }
}
