<?php

namespace Dambrogia\Alpaca\Endpoint\V1;

use Dambrogia\Alpaca\Endpoint\AbstractEndpoint;
use Dambrogia\Alpaca\Client\Response;

class Positions extends AbstractEndpoint
{
    /**
     * https://docs.alpaca.markets/api-documentation/web-api/positions/#get-open-positions
     * @param array $params
     * @return Response
     */
    public function get(): Response
    {
        return $this->getClient()->request('GET', '/v1/positions');
    }

    /**
     * https://docs.alpaca.markets/api-documentation/web-api/positions/#get-an-open-position
     * @param string $symbol
     * @return Response
     */
    public function getBySymbol(string $symbol): Response
    {
        return $this->getClient()->request('GET', '/v1/positions/'.$symbol);
    }
}
