<?php

namespace Dvomaks\LaravelOsrm;

use Illuminate\Support\ServiceProvider;

class LaravelOsrmServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'laravel-osrm');

        $this->app->singleton('laravel-osrm', function ($app) {
            return new LaravelOsrm($app['config']['laravel-osrm']['service_url']);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/config.php' => config_path('laravel-osrm.php')
        ], 'config');
    }
}
