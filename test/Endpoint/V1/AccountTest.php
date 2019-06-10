<?php

namespace Dambrogia\AlpacaTest\Endpoint\V1;

use PHPUnit\Framework\TestCase;
use Dambrogia\AlpacaTest\CreateClientTrait;

final class AccountTest extends TestCase
{
    use CreateClientTrait;

    public function testGetAccount(): void
    {
        $this->assertEquals(
            200,
            $this->createV1Client()->account()->get()->getStatusCode()
        );
    }
}
