<?php

namespace Dambrogia\AlpacaTest;

use Dambrogia\Alpaca\Client\V1;

trait CreateClientTrait
{
    use CreateConfigTrait;

    public function createV1Client(): V1
    {
        return new V1($this->createConfig());
    }
}
