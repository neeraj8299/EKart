<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.app', function ($view) {
            $view->with('is_admin', \DB::table('users')->where('email', auth()->user()->email)->value('is_admin'));
        });

        View::composer('layouts.navigation', function ($view) {
            $view->with('category', Category::getAllCategory());
        });
    }
}
