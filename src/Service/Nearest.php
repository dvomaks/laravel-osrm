<?php
namespace Dvomaks\LaravelOsrm\Service;

use Dvomaks\LaravelOsrm\AbstractService;
use Dvomaks\LaravelOsrm\Exception;

class Nearest extends AbstractService
{
    protected ?string $service = 'nearest';

    /**
     * @param numeric $value
     * @return Nearest
     * @throws Exception
     */
    public function setNumber($value): Nearest
    {
        if (!(is_numeric($value) && (int) $value >= 1))
        {
            throw new Exception('Invalid value for $number');
        }

        return $this->setOption('number', $value);
    }
}