<?php

namespace Dambrogia\Alpaca;

abstract class AbstractEndpoint
{
    protected $client;

    public function __construct(AbstractClient $client)
    {
        $this->client = $client;
    }
}
