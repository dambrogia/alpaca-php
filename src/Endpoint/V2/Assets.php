<?php

namespace Dambrogia\Alpaca\Endpoint\V2;

use Dambrogia\Alpaca\Endpoint\AbstractEndpoint;
use GuzzleHttp\Psr7\Response;

class Assets extends AbstractEndpoint
{
    /**
     * https://docs.alpaca.markets/api-documentation/api-v2/assets/#get-assets
     * @return Response
     */
    public function get(array $params = []): Response
    {
        $q = $params != [] ? http_build_query($params) : '';
        return $this->client->request('GET', '/v2/assets?'.$q);
    }

    /**
     * https://docs.alpaca.markets/api-documentation/api-v2/assets/#get-an-asset
     * @param string $id
     * @return Response
     */
    public function getById(string $id): Response
    {
        return $this->client->request('GET', '/v2/assets/'.$id);
    }

    /**
     * https://docs.alpaca.markets/api-documentation/api-v2/assets/#get-an-asset
     * @param string $symbol
     * @return Response
     */
    public function getBySymbol(string $symbol): Response
    {
        return $this->client->request('GET', '/v2/assets/'.$symbol);
    }
}
