<?php

namespace Dambrogia\Alpaca\Endpoint\V1;

use Dambrogia\Alpaca\Endpoint\AbstractEndpoint;
use GuzzleHttp\Psr7\Response;

class Calendar extends AbstractEndpoint
{
    /**
     * https://docs.alpaca.markets/api-documentation/web-api/calendar/#get-the-calendar
     * @return Response
     */
    public function get(): Response
    {
        return $this->client->request('GET', '/v1/calendar');
    }
}
