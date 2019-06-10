<?php

namespace Dambrogia\AlpacaTest;

use Dambrogia\Alpaca\Client\V1;
use Dambrogia\Alpaca\Client\V2;

trait CreateClientTrait
{
    use CreateConfigTrait;

    public function createV1Client(): V1
    {
        return new V1($this->createConfig());
    }

    public function createV2Client(): V2
    {
        return new V2($this->createConfig());
    }
}
