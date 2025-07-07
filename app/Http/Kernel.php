<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;
use App\Http\Middleware\RolMiddleware;
use App\Http\Middleware\AdminOnlyMiddleware;

class Kernel extends HttpKernel
{
    /**
     * The application's route middleware.
     *
     * @var array<string, class-string|string>
     */
    protected $routeMiddleware = [
        'rol' => \App\Http\Middleware\RolMiddleware::class,
        'adminonly' => \App\Http\Middleware\AdminOnlyMiddleware::class,
        // otros middlewares personalizados aquí
    ];
}
