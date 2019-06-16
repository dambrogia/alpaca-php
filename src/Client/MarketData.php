<?php

namespace Dambrogia\Alpaca\Client;

use GuzzleHttp\Client;
use Dambrogia\Alpaca\Endpoint\V1\Bars;

class MarketData extends AbstractClient
{
    /**
     * {@inheritDoc}
     */
    protected function buildClient(): Client
    {
        return new Client([
            'base_uri' => $this->getConfig()->getMarketDataPrefix() . '/'
        ]);
    }

    /**
     * Get the Bars endpoint class.
     * @return Assets
     */
    public function bars(): Bars
    {
        return new Bars($this);
    }
}
