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

        $this->app->singleton('laravel_osrm', function ($app) {
            $transportClass = $app['config']['laravel-osrm']['transport_class'];
            $transport = new $transportClass($app['config']['laravel-osrm']['service_url']);

            return new LaravelOsrm($transport);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     * @noinspection PhpUndefinedFunctionInspection
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/config.php' => config_path('laravel-osrm.php')
        ], 'config');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return ['laravel_osrm'];
    }
}
