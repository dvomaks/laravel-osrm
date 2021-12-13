<?php

use Dvomaks\LaravelOsrm\Transports\CurlTransport;

return [
    'service_url' => 'https://router.project-osrm.org/',
    'transport_class' => CurlTransport::class
];
