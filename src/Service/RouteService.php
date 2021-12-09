<?php

namespace Dvomaks\LaravelOsrm\Service;

use Dvomaks\LaravelOsrm\AbstractService;
use Dvomaks\LaravelOsrm\Exception;

class RouteService extends AbstractService
{
    protected ?string $service = 'route';

    /**
     * @param mixed $value
     * @return RouteService
     * @throws Exception
     */
    public function setAlternatives($value): RouteService
    {
        if (!(is_numeric($value) || in_array($value, array('true', 'false'))))
        {
            throw new Exception('Invalid value for $alternatives.');
        }

        return $this->setOption('alternatives', $value);
    }

    /**
     * @param string $value
     * @return RouteService
     * @throws Exception
     */
    public function setSteps(string $value): RouteService
    {
        return $this->_setSteps($value);
    }

    /**
     * @param string $value
     * @return RouteService
     * @throws Exception
     */
    public function setAnnotations(string $value): RouteService
    {
        return $this->_setAnnotations($value);
    }

    /**
     * @param string $value
     * @return RouteService
     * @throws Exception
     */
    public function setGeometries(string $value): RouteService
    {
        return $this->_setGeometries($value);
    }

    /**
     * @param string $value
     * @return RouteService
     * @throws Exception
     */
    public function setOverview(string $value): RouteService
    {
        return $this->_setOverview($value);
    }

    /**
     * @param string $value
     * @return RouteService
     * @throws Exception
     */
    public function setContinueStraight(string $value): RouteService
    {
        if (!in_array($value, array('default', 'true', 'false')))
        {
            throw new Exception('Invalid value for $continue_straight.');
        }

        return $this->setOption('continue_straight', $value);
    }

    /**
     * @param string $value
     * @return RouteService
     * @throws Exception
     */
    public function setWaypoints(string $value): RouteService
    {
        return $this->_setWaypoints($value);
    }

}
