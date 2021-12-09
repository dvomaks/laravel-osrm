<?php

namespace Dvomaks\LaravelOsrm\Service;

use Dvomaks\LaravelOsrm\AbstractService;
use Dvomaks\LaravelOsrm\Exception;

class TripService extends AbstractService
{
    protected ?string $service = 'trip';

    /**
     * @param string $value
     * @return TripService
     * @throws Exception
     */
    public function setOverview(string $value): TripService
    {
        return $this->_setOverview($value);
    }

    /**
     * @param string $value
     * @return TripService
     * @throws Exception
     */
    public function setSteps(string $value): TripService
    {
        return $this->_setSteps($value);
    }

    /**
     * @param string $value
     * @return TripService
     * @throws Exception
     */
    public function setGeometries(string $value): TripService
    {
        return $this->_setGeometries($value);
    }

    /**
     * @param string $value
     * @return TripService
     * @throws Exception
     */
    public function setAnnotations(string $value): TripService
    {
        return $this->_setAnnotations($value);
    }

    /**
     * @param string $value
     * @return TripService
     * @throws Exception
     */
    public function setSource(string $value): TripService
    {
        if (!in_array($value, array('any', 'first')))
        {
            throw new Exception('Invalid value for $source.');
        }

        return $this->setOption('source', $value);
    }

    /**
     * @param string $value
     * @return TripService
     * @throws Exception
     */
    public function setDestination(string $value): TripService
    {
        if (!in_array($value, array('any', 'last')))
        {
            throw new Exception('Invalid value for $destination.');
        }

        return $this->setOption('destination', $value);
    }

    /**
     * @param string $value
     * @return TripService
     * @throws Exception
     */
    public function setRoundtrip(string $value): TripService
    {
        if (!in_array($value, array('true', 'false')))
        {
            throw new Exception('Invalid value for $roundtrip.');
        }

        return $this->setOption('roundtrip', $value);
    }
}
