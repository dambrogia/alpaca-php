<?php

namespace Dambrogia\Alpaca\Endpoint;

use Dambrogia\Alpaca\Client\AbstractClient;

abstract class AbstractEndpoint
{
    protected $client;

    public function __construct(AbstractClient $client)
    {
        $this->client = $client;
    }
}
