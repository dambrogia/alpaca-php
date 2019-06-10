<?php

namespace Dambrogia\AlpacaTest\Endpoint\V2;

use PHPUnit\Framework\TestCase;
use Dambrogia\AlpacaTest\CreateClientTrait;

final class CalendarTest extends TestCase
{
    use CreateClientTrait;

    public function testGetCalendar(): void
    {
        $this->assertEquals(
            200,
            $this->createClient()->v2()->calendar()->get()->getStatusCode()
        );
    }
}
