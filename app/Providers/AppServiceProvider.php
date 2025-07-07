<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::component('flux.button.index', 'flux-button');
        Blade::component('flux.input.index', 'flux-input');
        Blade::component('flux.select.index', 'flux-select');
        Blade::component('flux.container', 'flux-container');
        // Puedes registrar más componentes aquí según los necesites
    }
}
