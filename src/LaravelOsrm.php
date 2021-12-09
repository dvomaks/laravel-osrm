<?php

namespace Dvomaks\LaravelOsrm;

use Dvomaks\LaravelOsrm\Service\MatchService;
use Dvomaks\LaravelOsrm\Service\NearestService;
use Dvomaks\LaravelOsrm\Service\RouteService;
use Dvomaks\LaravelOsrm\Service\TableService;
use Dvomaks\LaravelOsrm\Service\TileService;
use Dvomaks\LaravelOsrm\Service\TripService;

class LaravelOsrm
{
    private string $serviceUrl;

    public function __construct($serviceUrl)
    {
        $this->serviceUrl = $serviceUrl;
    }

    public function match(): MatchService
    {
        return new MatchService($this->serviceUrl);
    }

    public function nearest(): NearestService
    {
        return new NearestService($this->serviceUrl);
    }

    public function route(): RouteService
    {
        return new RouteService($this->serviceUrl);
    }

    public function table(): TableService
    {
        return new TableService($this->serviceUrl);
    }

    public function tile(): TileService
    {
        return new TileService($this->serviceUrl);
    }

    public function trip(): TripService
    {
        return new TripService($this->serviceUrl);
    }
}
