<?php

namespace Dambrogia\AlpacaTest;

use Dambrogia\Alpaca\Config;

trait CreateConfigTrait
{
    public function createConfig($key = '', $secret = '', $env = Config::ENV_PAPER): Config
    {
        // @todo - implement dotenv for thest values. throw exception during
        // test if they don't exist.
        $key = empty($key) ? 'PKOGCMHJNFJ6J3PRX9B7' : $key;
        $secret = empty($secret) ? 'qQDCH9xabxm0jCjDaKVFyFajcal3hafgUjCjQ0X9' : $secret;

        return new Config($key, $secret, $env);
    }
}
