<?php

namespace Dambrogia\AlpacaTest\Endpoint\V1;

use PHPUnit\Framework\TestCase;
use Dambrogia\AlpacaTest\CreateClientTrait;

final class CalendarTest extends TestCase
{
    use CreateClientTrait;

    public function testGetCalendar(): void
    {
        $this->assertEquals(
            200,
            $this->createV1Client()->calendar()->get()->getStatusCode()
        );
    }
}
