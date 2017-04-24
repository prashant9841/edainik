<?php

namespace App\Providers;

use Carbon\Carbon;
use URL,Auth;
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
                return $view->with('user', auth()->user()); 
        });
        view()->composer(['layouts._frontendNav', 'layouts._frontendMenu','layouts._footerMenu'],function(View $view){   
            return $view->with('menus', Menu::ordered()->get()); 
        });

        view()->composer('dashboard.post._form',function(View $view){   
            return $view->with('categories', Category::where('status',1)->get()); 
        });

        view()->composer('partials.post._latestPost',function(View $view){   
            return $view->with('latestNews', Post::where(['status'=>1,'verified' => 1])->latest()->take(5)->get()); 
        });

        view()->composer('post._form',function(View $view){   
            return $view->with('categories', Category::where('status',1)->get()); 
        });

        Carbon::setLocale(\App::getLocale());
        if(\App::getLocale('ne'))
        {
            setlocale(LC_TIME, 'ne_NP.utf8');
        }

        if(env('APP_ENV') == 'production'){
            URL::forceRootUrl(env('APP_URL'));
        }

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
