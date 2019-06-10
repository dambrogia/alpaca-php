<?php

namespace Dambrogia\AlpacaTest;

use Dambrogia\Alpaca\Config;

trait CreateConfigTrait
{
    public function createConfig($key = '', $secret = '', $env = Config::ENV_PAPER): Config
    {
        // @todo - implement dotenv for thest values. throw exception during
        // test if they don't exist.
        $key = empty($key) ? 'key' : $key;
        $secret = empty($secret) ? 'secret' : $secret;

        return new Config($key, $secret, $env);
    }
}
