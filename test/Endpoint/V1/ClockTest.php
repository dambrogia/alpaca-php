<?php

namespace Dambrogia\AlpacaTest\Endpoint\V1;

use PHPUnit\Framework\TestCase;
use Dambrogia\AlpacaTest\CreateClientTrait;

final class ClockTest extends TestCase
{
    use CreateClientTrait;

    public function testGetClock(): void
    {
        $this->assertEquals(
            200,
            $this->createClient()->v1()->clock()->get()->getStatusCode()
        );
    }
}
