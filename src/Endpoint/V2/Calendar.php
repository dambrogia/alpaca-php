<?php

namespace Dambrogia\Alpaca\Endpoint\V2;

use Dambrogia\Alpaca\Endpoint\AbstractEndpoint;
use GuzzleHttp\Psr7\Response;

class Calendar extends AbstractEndpoint
{
    /**
     * https://docs.alpaca.markets/api-documentation/api-v2/calendar/#get-the-calendar
     * @return Response
     */
    public function get(): Response
    {
        return $this->getClient()->request('GET', '/v2/calendar');
    }
}
