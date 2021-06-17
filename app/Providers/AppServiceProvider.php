<?php

namespace App\Providers;

use App\View\Components\Alert;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        $menu = ['Home', 'About', 'Contact'];
        View::share('menu', $menu);
        Blade::component('alert', Alert::class);
    }
}
