<?php

namespace Dambrogia\Alpaca\Endpoint\V2;

use Dambrogia\Alpaca\Endpoint\AbstractEndpoint;
use GuzzleHttp\Psr7\Response;

class Account extends AbstractEndpoint
{
    /**
     * https://docs.alpaca.markets/api-documentation/api-v2/account/#get-the-account
     * @return Response
     */
    public function get(): Response
    {
        return $this->getClient()->request('GET', '/v2/account');
    }
}
