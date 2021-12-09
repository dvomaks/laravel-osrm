<?php

namespace Dvomaks\LaravelOsrm;

class Response
{
    protected $data;

    /**
     * @param string $data
     * @throws \JsonException
     */
    public function __construct(string $data)
    {
        $this->data = json_decode($data, true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @return false|string
     * @throws \JsonException
     */
    public function toJson()
    {
        return json_encode($this->data, JSON_THROW_ON_ERROR);
    }

    /**
     * @return array|null
     */
    public function toArray(): ?array
    {
        return $this->data;
    }

    /**
     * @return int|null
     */
    public function getError(): ?int
    {
        return !$this->isOK() ? $this->data['code'] : null;
    }

    /**
     * @return bool
     */
    public function isOK(): bool
    {
        return isset($this->data['code']) && $this->data['code'] === 'Ok';
    }
}
