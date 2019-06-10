<?php

namespace Dambrogia\AlpacaTest\Endpoint\V2;

use PHPUnit\Framework\TestCase;
use Dambrogia\AlpacaTest\CreateClientTrait;

final class AccountTest extends TestCase
{
    use CreateClientTrait;

    public function testGetAccount(): void
    {
        $this->assertEquals(
            200,
            $this->createClient()->v2()->account()->get()->getStatusCode()
        );
    }
}
