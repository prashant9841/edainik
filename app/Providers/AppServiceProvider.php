<?php

namespace App\Providers;

use Auth;
use Illuminate\View\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts._dashSideNav',function(View $view){
            if(Auth::check())
                $view->with('user', Auth::user()); 
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
