<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
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
        Blade::if('student', function () {
            return auth()->check() && auth()->user()->role === "student";
        });
        Blade::if('employer', function () {
            return auth()->check() && auth()->user()->role === "employer";
        });
        Blade::if('placement', function () {
            return auth()->check() && auth()->user()->role === "placement";
        });
    }
}
