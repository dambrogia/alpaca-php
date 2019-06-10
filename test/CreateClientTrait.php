<?php

namespace Dambrogia\AlpacaTest;

use Dambrogia\Alpaca\Alpaca;

trait CreateClientTrait
{
    use CreateConfigTrait;

    public function createClient(): Alpaca
    {
        return new Alpaca($this->createConfig());
    }
}
