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
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/development-kit.php' => config_path('development-kit.php'),
                __DIR__ . '/../publish/routes' => base_path('routes'),
            ], 'development-kit');
        }

        $this->mergeConfigFrom(__DIR__.'/../config/development-kit.php', 'development-kit');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->register(RouteServiceProvider::class);

        $this->loadViewsFrom(__DIR__ . '/../views', 'development-kit');
    }
}
