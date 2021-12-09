<?php

namespace Dvomaks\LaravelOsrm\Service;

use Dvomaks\LaravelOsrm\AbstractService;
use Dvomaks\LaravelOsrm\Exception;

class MatchService extends AbstractService
{
    protected ?string $service = 'match';

    /**
     * @param string $value
     * @return MatchService
     * @throws Exception
     */
    public function setSteps(string $value): MatchService
    {
        return $this->_setSteps($value);
    }

    /**
     * @param string $value
     * @return MatchService
     * @throws Exception
     */
    public function setGeometries(string $value): MatchService
    {
        return $this->_setGeometries($value);
    }

    /**
     * @param string $value
     * @return MatchService
     * @throws Exception
     */
    public function setAnnotations(string $value): MatchService
    {
        return $this->_setAnnotations($value);
    }

    /**
     * @param string $value
     * @return MatchService
     * @throws Exception
     */
    public function setOverview(string $value): MatchService
    {
        return $this->_setOverview($value);
    }

    /**
     * @param string $value
     * @return MatchService
     * @throws Exception
     */
    public function setTimestamps(string $value): MatchService
    {
        if (!preg_match('/^\d{10}(?:;\d{10})*$/', $value))
        {
            throw new Exception('Invalid value for $timestamps.');
        }

        return $this->setOption('timestamps', $value);
    }

    /**
     * @param string $value
     * @return MatchService
     * @throws Exception
     */
    public function setGaps(string $value): MatchService
    {
        if (!in_array($value, array('split', 'ignore')))
        {
            throw new Exception('Invalid value for $gaps.');
        }

        return $this->setOption('gaps', $value);
    }

    /**
     * @param string $value
     * @return MatchService
     * @throws Exception
     */
    public function setTidy(string $value): MatchService
    {
        if (!in_array($value, array('true', 'false')))
        {
            throw new Exception('Invalid value for $tidy.');
        }

        return $this->setOption('tidy', $value);
    }

    /**
     * @param string $value
     * @return MatchService
     * @throws Exception
     */
    public function setWaypoints(string $value): MatchService
    {
        return $this->_setWaypoints($value);
    }
}
