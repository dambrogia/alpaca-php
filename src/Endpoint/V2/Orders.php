<?php

namespace Dambrogia\Alpaca\Endpoint\V2;

use Dambrogia\Alpaca\Endpoint\AbstractEndpoint;
use GuzzleHttp\Psr7\Response;

class Orders extends AbstractEndpoint
{
    /**
     * https://docs.alpaca.markets/api-documentation/api-v2/orders/#get-a-list-of-orders
     * @param array $params
     * @return Response
     */
    public function get(array $params = []): Response
    {
        $q = $params != [] ? \http_build_query($params) : '';
        return $this->client->request('GET', '/v2/orders?'.$q);
    }

    /**
     * https://docs.alpaca.markets/api-documentation/api-v2/orders/#request-a-new-order
     * @param array $params
     * @return Response
     */
    public function create(array $params = []): Response
    {
        return $this->client->request('POST', '/v2/orders', $params);
    }

    /**
     * https://docs.alpaca.markets/api-documentation/api-v2/orders/#get-an-order
     * @param $id
     * @return Response
     */
    public function getById($id): Response
    {
        return $this->client->request('GET', '/v2/orders/'.$id);
    }

    /**
     * https://docs.alpaca.markets/api-documentation/api-v2/orders/#get-an-order-by-client-order-id
     * @param $clientOrderId
     * @return Response
     */
    public function getByClientOrderId($clientOrderId): Response
    {
        return $this->client->request('GET', '/v2/orders/'.$clientOrderId);
    }

    /**
     * https://docs.alpaca.markets/api-documentation/api-v2/orders/#cancel-an-order
     * @param $id
     * @return Response
     */
    public function delete($id): Response
    {
        return $this->client->request('DELETE', '/v2/orders/'.$id);
    }
}
