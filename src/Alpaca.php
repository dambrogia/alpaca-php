<?php

namespace Dambrogia\Alpaca;

use Dambrogia\Alpaca\Client\V1;
use Dambrogia\Alpaca\Client\V2;

class Alpaca
{
    private $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * Get endpoints within /v1 namespace.
     * @return V1
     */
    public function v1(): V1
    {
        return new V1($this->config);
    }

    /**
     * Get endpoints within the /v2 namespace
     * @return V2
     */
    public function v2(): V2
    {
        return new V2($this->config);
    }

    /**
     * Get access to streaming websocket.
     * @throws \Exception
     */
    public function streaming()
    {
        throw new \Exception('Not yet implemented.');
    }

    /**
     * Get access to market data.
     * @throws \Exception
     */
    public function marketData()
    {
        throw new \Exception('Not yet implemented.');
    }
}
