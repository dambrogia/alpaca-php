<?php

namespace Dambrogia\Alpaca\Endpoint\V1;

use Dambrogia\Alpaca\Endpoint\AbstractEndpoint;
use Dambrogia\Alpaca\Concern\EndpointException;
use GuzzleHttp\Psr7\Response;

class Bars extends AbstractEndpoint
{
    /**
     * https://docs.alpaca.markets/api-documentation/web-api/market-data/bars/#get-a-list-of-bars
     * @param string $timeframe
     * @param array $params
     * @return Response
     */
    public function get(string $timeframe, array $params): Response
    {
        $allowedTimeframes = ['minute', '1Min', '5Min', '15Min', 'day', '1D'];

        if (! in_array($timeframe, $allowedTimeframes)) {
            throw new EndpointException('Invalid timeframe.');
        }

        if (! isset($params['symbols']) || ! is_string($params['symbols'])) {
            throw new EndpointException('Invalid symbols paramter.');
        }

        $q = http_build_query($params);
        return $this->getClient()->request('GET', "/v1/bars/{$timeframe}?{$q}");
    }
}
