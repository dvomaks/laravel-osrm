<?php
namespace Dvomaks\LaravelOsrm\Service;

use Dvomaks\LaravelOsrm\AbstractService;
use Dvomaks\LaravelOsrm\Exception;

class Table extends AbstractService
{
    protected ?string $service = 'table';

    /**
     * @param string $value
     * @return Table
     * @throws Exception
     */
    public function setSources(string $value): Table
    {
        if (!($value === 'all' || preg_match('/^\d+(?:;\d+)*$/', $value)))
        {
            throw new Exception('Invalid value for $sources.');
        }

        return $this->setOption('sources', $value);
    }

    /**
     * @param string $value
     * @return Table
     * @throws Exception
     */
    public function setDestinations(string $value): Table
    {
        if (!($value === 'all' || preg_match('/^\d+(?:;\d+)*$/', $value)))
        {
            throw new Exception('Invalid value for $destinations.');
        }

        return $this->setOption('destinations', $value);
    }

    /**
     * @param string $value
     * @return Table
     * @throws Exception
     */
    public function setAnnotations(string $value): Table
    {
        if (!in_array($value, array('duration', 'distance', 'duration,distance')))
        {
            throw new Exception('Invalid value for $annotations.');
        }

        return $this->setOption('annotations', $value);
    }

    /**
     * @param float $value
     * @return Table
     */
    public function setFallbackSpeed(float $value): Table
    {
        return $this->setOption('fallback_speed', $value);
    }

    /**
     * @param string $value
     * @return Table
     * @throws Exception
     */
    public function setFallbackCoordinate(string $value): Table
    {
        if (!in_array($value, array('input', 'snapped')))
        {
            throw new Exception('Invalid value for $fallback_coordinate.');
        }

        return $this->setOption('fallback_coordinate', $value);
    }

    /**
     * @param float $value
     * @return Table
     */
    public function setScaleFactor(float $value): Table
    {
        return $this->setOption('scale_factor', $value);
    }
}