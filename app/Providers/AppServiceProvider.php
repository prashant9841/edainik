<?php

namespace App\Providers;

use Auth;
use App\{Menu,Category,Post};
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
        view()->composer(['layouts._dashSideNav','layouts._dashTopNav'],function(View $view){
            if(Auth::check())
                return $view->with('user', Auth::user()); 
        });
        view()->composer(['layouts._frontendNav', 'layouts._frontendMenu'],function(View $view){   
            return $view->with('menus', Menu::ordered()->get()); 
        });

        view()->composer('dashboard.post._form',function(View $view){   
            return $view->with('categories', Category::where('status',1)->get()); 
        });

        view()->composer('partials.post._relatedPost',function(View $view){   
            return $view->with('latestNews', Post::where(['status'=>1,'verified' => 1])->latest()->take(5)->get()); 
        });

        view()->composer('post._form',function(View $view){   
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
