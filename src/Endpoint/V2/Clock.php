<?php

namespace Dambrogia\Alpaca\Endpoint\V2;

use Dambrogia\Alpaca\Endpoint\AbstractEndpoint;
use Dambrogia\Alpaca\Client\Response;

class Clock extends AbstractEndpoint
{
    /**
     * https://docs.alpaca.markets/api-documentation/api-v2/clock/
     * @return Response
     */
    public function get(): Response
    {
        return $this->getClient()->request('GET', '/v2/clock');
    }
}
