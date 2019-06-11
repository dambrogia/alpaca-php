<?php

namespace Dambrogia\Alpaca;

use Dambrogia\Alpaca\Concern\ConfigException;

class Config
{
    protected $keyId;
    protected $secretKey;
    protected $env;

    const DOMAIN_PAPER = 'https://paper-api.alpaca.markets/';
    const DOMAIN_LIVE = 'https://api.alpaca.markets/';

    const ENV_PAPER = 'paper';
    const ENV_LIVE = 'live';

    public function __construct(string $keyId, string $secretKey, string $env = self::ENV_PAPER)
    {
        if (! in_array($env, [self::ENV_PAPER, self::ENV_LIVE])) {
            throw new ConfigException('Invalid Environment.');
        }

        $this->keyId = $keyId;
        $this->secretKey = $secretKey;
        $this->env = $env;
    }

    /**
     * Get the correct base API url based on the env: paper or live.
     * @return string
     */
    public function getEndpointPrefix(): string
    {
        if ($this->env == self::ENV_LIVE) {
            return self::DOMAIN_LIVE;
        } elseif ($this->env == self::ENV_PAPER) {
            return self::DOMAIN_PAPER;
        } else {
            throw new ConfigException('Invalid Environment.');
        }
    }

    /**
     * Get stream endpoint prefix.
     * Substitute the
     */

    /**
     * Getter method for class property: $this->keyId.
     * @return string
     */
    public function getKeyId(): string
    {
        return $this->keyId;
    }

    /**
     * Getter method for class property: $this->secretKey.
     * @return string
     */
    public function getSecretKey(): string
    {
        return $this->secretKey;
    }

    /**
     * Getter method for class property: $this->env.
     * @return string
     */
    public function getEnv(): string
    {
        return $this->env;
    }
}
