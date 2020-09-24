<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->TopMenu();
    }

    // top menu for users
    public function TopMenu() {
        View::composer('header', function ($view) {
           $view->with('categories', \App\Category::where('parent_id', 0)->where('published', 1)->get());
        });
    }
}
