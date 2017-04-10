<?php

namespace App\Providers;

use Auth;
use App\{Menu,Category};
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
                return $view->with('user', Auth::user()); 
        });
        view()->composer('layouts._frontendNav',function(View $view){   
            return $view->with('menus', Menu::ordered()->get()); 
        });

        view()->composer('dashboard.post._form',function(View $view){   
            return $view->with('categories', Category::where('status',1)->get()); 
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
