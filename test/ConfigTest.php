<?php

namespace Dambrogia\AlpacaTest;

use PHPUnit\Framework\TestCase;

use Dambrogia\Alpaca\Config;
use Dambrogia\Alpaca\V1\Alpaca;
use Dambrogia\Alpaca\Concern\ConfigException;

final class ConfigTest extends TestCase
{
    use CreateConfigTrait;

    /**
     * Assert the class can be instantiated.
     * @return void
     */
    public function testCreate(): void
    {
        $config = $this->createConfig();
        $this->assertInstanceOf(Config::class, $config);

        $this->expectException(ConfigException::class);
        $this->createConfig('key', 'value', 'invalid env value');
    }

    /**
     * Test getter methods in class.
     * @return void
     */
    public function testGetters(): void
    {
        $config = $this->createConfig('key123', 'secret123');
        $this->assertEquals('key123', $config->getKeyId());
        $this->assertEquals('secret123', $config->getSecretKey());
        $this->assertEquals(Config::ENV_PAPER, $config->getEnv());
    }

    /**
     * Assert the endpoint is correct based on the environment declared when
     * creating the client.
     * @return void
     */
    public function testEndpoint(): void
    {
        $paperConfig = $this->createConfig('key', 'secret', Config::ENV_PAPER);
        $this->assertEquals(Config::DOMAIN_PAPER, $paperConfig->getEndpointPrefix());

        $liveConfig = $this->createConfig('key', 'secret', Config::ENV_LIVE);
        $this->assertEquals(Config::DOMAIN_LIVE, $liveConfig->getEndpointPrefix());
    }
}
