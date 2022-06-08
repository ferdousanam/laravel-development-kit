<?php

namespace Anam\DevelopmentKit;

use Anam\DevelopmentKit\Providers\RouteServiceProvider;
use Illuminate\Support\ServiceProvider;

class DevelopmentKitServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->publishes([
            __DIR__ . '/../publish/routes' => base_path('routes'),
        ], 'development-kit');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->register(RouteServiceProvider::class);

        if ($this->app->environment() == 'local') {
            $this->loadRoutesFrom(__DIR__ . '/../routes/local.php');
        }
    }
}