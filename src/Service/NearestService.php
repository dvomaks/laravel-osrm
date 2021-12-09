<?php

namespace Dvomaks\LaravelOsrm\Service;

use Dvomaks\LaravelOsrm\AbstractService;
use Dvomaks\LaravelOsrm\Exception;

class NearestService extends AbstractService
{
    protected ?string $service = 'nearest';

    /**
     * @param numeric $value
     * @return NearestService
     * @throws Exception
     */
    public function setNumber($value): NearestService
    {
        if (!(is_numeric($value) && (int) $value >= 1))
        {
            throw new Exception('Invalid value for $number');
        }

        return $this->setOption('number', $value);
    }
}
