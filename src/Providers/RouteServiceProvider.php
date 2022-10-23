<?php

namespace Anam\DevelopmentKit\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        if (file_exists($file = (base_path('routes/local.php')))) {
            Route::middleware(array_merge(['web'], config('development-kit.route.attributes.middleware')))
                ->prefix(config('development-kit.route.attributes.prefix'))
                ->namespace($this->namespace)
                ->group($file);
        }
    }
}
