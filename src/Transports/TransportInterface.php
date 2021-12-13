<?php

namespace Dvomaks\LaravelOsrm\Transports;

interface TransportInterface
{
    public function request(string $path): TransportInterface;

    public function getResponse(): ?string;
}
