<?php

namespace Dambrogia\Alpaca\Endpoint;

use Dambrogia\Alpaca\Client\AbstractClient;

abstract class AbstractEndpoint
{
    private $client;

    public function __construct(AbstractClient $client)
    {
        $this->client = $client;
    }

    /**
     * Getter method for class property: $this->client.
     * @return AbstractClient
     */
    public function getClient(): AbstractClient
    {
        return $this->client;
    }
}
