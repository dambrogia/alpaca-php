<?php

namespace Dambrogia\Alpaca;

use Dambrogia\Alpaca\Client\V1;
use Dambrogia\Alpaca\Client\V2;
use Dambrogia\Alpaca\Client\Streaming;
use Dambrogia\Alpaca\Client\MarketData;

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
     * @return Streaming
     */
    public function streaming()
    {
        return new Streaming($this->config);
    }

    /**
     * Get access to market data cleint.
     * @return MarketData
     */
    public function marketData()
    {
        return new MarketData($this->config);
    }
}
