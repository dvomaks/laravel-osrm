<?php

namespace Dvomaks\LaravelOsrm;

use Illuminate\Support\Facades\Facade;

class LaravelOsrmFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'laravel_osrm';
    }
}
