<?php

namespace Anam\DevelopmentKit\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    protected $middlewares = ['web'];

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';
    protected $namespace;

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        if (!empty($middlewares = config('development-kit.route.attributes.middleware'))) {
            $this->middlewares = array_merge($this->middlewares, explode(',', $middlewares));
        }

        if (file_exists($file = (base_path('routes/local.php')))) {
            Route::middleware($this->middlewares)
                ->prefix(config('development-kit.route.attributes.prefix'))
                ->namespace($this->namespace)->group($file);
        }

        if ($this->app->environment() == 'local') {
            Route::middleware($this->middlewares)
                ->prefix(config('development-kit.route.attributes.prefix'))
                ->namespace($this->namespace)->group(__DIR__ . '/../../routes/local.php');
        }
    }
}
