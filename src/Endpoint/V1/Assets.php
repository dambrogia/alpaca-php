<?php

namespace Dambrogia\Alpaca\Endpoint\V1;

use Dambrogia\Alpaca\Endpoint\AbstractEndpoint;
use Dambrogia\Alpaca\Client\Response;

class Assets extends AbstractEndpoint
{
    /**
     * https://docs.alpaca.markets/api-documentation/web-api/assets/#get-assets
     * @return Response
     */
    public function get(array $params = []): Response
    {
        $q = $params != [] ? http_build_query($params) : '';
        return $this->getClient()->request('GET', '/v1/assets?'.$q);
    }

    /**
     * https://docs.alpaca.markets/api-documentation/web-api/assets/#get-an-asset
     * @param string $symbol
     * @return Response
     */
    public function getBySymbol(string $symbol): Response
    {
        return $this->getClient()->request('GET', '/v1/assets/'.$symbol);
    }
}
