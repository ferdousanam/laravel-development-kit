<?php

namespace Anam\DevelopmentKit;

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
        if ($this->app->environment() == 'local') {
            $this->loadRoutesFrom(__DIR__ . '/../routes/local.php');
        }

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
        //
    }
}