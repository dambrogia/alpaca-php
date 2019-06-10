<?php

namespace Dambrogia\AlpacaTest\Endpoint\V2;

use PHPUnit\Framework\TestCase;
use Dambrogia\AlpacaTest\CreateClientTrait;

final class ClockTest extends TestCase
{
    use CreateClientTrait;

    public function testGetClock(): void
    {
        $this->assertEquals(
            200,
            $this->createClient()->v2()->clock()->get()->getStatusCode()
        );
    }
}
