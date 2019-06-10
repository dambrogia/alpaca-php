<?php

namespace Dambrogia\AlpacaTest;

use Dotenv\Dotenv;
use Dambrogia\Alpaca\Config;
use Dambrogia\Alpaca\Concern\ConfigException;

trait CreateConfigTrait
{
    public function createConfig($key = '', $secret = '', $env = Config::ENV_PAPER): Config
    {
        Dotenv::create(__DIR__.'/..')->load();

        $key = empty($key) ? getenv('KEY_ID') : $key;
        $secret = empty($secret) ? getenv('SECRET_KEY'): $secret;

        if (! $key || ! $secret) {
            throw new ConfigException('Invalid key/secret or no .env set for testing.');
        }

        return new Config($key, $secret, $env);
    }
}
