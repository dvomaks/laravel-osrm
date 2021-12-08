<?php

namespace Dvomaks\LaravelOsrm;

use Dvomaks\LaravelOsrm\Service\Match;
use Dvomaks\LaravelOsrm\Service\Nearest;
use Dvomaks\LaravelOsrm\Service\Route;
use Dvomaks\LaravelOsrm\Service\Table;
use Dvomaks\LaravelOsrm\Service\Tile;
use Dvomaks\LaravelOsrm\Service\Trip;

class LaravelOsrm
{
    private string $serviceUrl;
    
    public function __construct($serviceUrl)
    {
        $this->serviceUrl = $serviceUrl;
    }
    
    public function match(): Match
    {
        return new Match($this->serviceUrl);
    }
    
    public function nearest(): Nearest
    {
        return new Nearest($this->serviceUrl);
    }

    public function route(): Route
    {
        return new Route($this->serviceUrl);
    }

    public function table(): Table
    {
        return new Table($this->serviceUrl);
    }

    public function tile(): Tile
    {
        return new Tile($this->serviceUrl);
    }

    public function trip(): Trip
    {
        return new Trip($this->serviceUrl);
    }
}
