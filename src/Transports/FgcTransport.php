<?php

namespace Dvomaks\LaravelOsrm\Transports;

class FgcTransport implements TransportInterface
{
    protected ?string $response;

    protected string $serviceUrl;

    public function __construct(string $serviceUrl)
    {
        $this->serviceUrl = $serviceUrl;
    }

    /**
     * @param string $path
     * @return $this
     */
    public function request(string $path): TransportInterface
    {
        $this->response = file_get_contents($this->serviceUrl . $path);

        return $this;
    }

    /**
     * @return string|null
     */
    public function getResponse(): ?string
    {
        return $this->response;
    }
}
