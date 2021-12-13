<?php

namespace Dvomaks\LaravelOsrm;

use Dvomaks\LaravelOsrm\Service\MatchService;
use Dvomaks\LaravelOsrm\Service\NearestService;
use Dvomaks\LaravelOsrm\Service\RouteService;
use Dvomaks\LaravelOsrm\Service\TableService;
use Dvomaks\LaravelOsrm\Service\TileService;
use Dvomaks\LaravelOsrm\Service\TripService;
use Dvomaks\LaravelOsrm\Transports\TransportInterface;

class LaravelOsrm
{
    private TransportInterface $transport;

    public function __construct($transport)
    {
        $this->transport = $transport;
    }

    public function match(): MatchService
    {
        return new MatchService($this->transport);
    }

    public function nearest(): NearestService
    {
        return new NearestService($this->transport);
    }

    public function route(): RouteService
    {
        return new RouteService($this->transport);
    }

    public function table(): TableService
    {
        return new TableService($this->transport);
    }

    public function tile(): TileService
    {
        return new TileService($this->transport);
    }

    public function trip(): TripService
    {
        return new TripService($this->transport);
    }
}
