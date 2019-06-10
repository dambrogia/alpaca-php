<?php

namespace Dambrogia\Alpaca\Endpoint\V2;

use Dambrogia\Alpaca\Endpoint\AbstractEndpoint;
use GuzzleHttp\Psr7\Response;

class Positions extends AbstractEndpoint
{
    /**
     * https://docs.alpaca.markets/api-documentation/api-v2/positions/#get-open-positions
     * @param array $params
     * @return Response
     */
    public function get(): Response
    {
        return $this->client->request('GET', '/v2/positions');
    }

    /**
     * https://docs.alpaca.markets/api-documentation/api-v2/positions/#get-an-open-position
     * @param string $symbol
     * @return Response
     */
    public function getBySymbol(string $symbol): Response
    {
        return $this->client->request('GET', '/v2/positions/'.$symbol);
    }
}