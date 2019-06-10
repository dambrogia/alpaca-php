<?php

namespace Dambrogia\AlpacaTest\Endpoint\V1;

use PHPUnit\Framework\TestCase;
use Dambrogia\AlpacaTest\CreateClientTrait;

final class PositionsTest extends TestCase
{
    use CreateClientTrait;

    public function testPositions(): void
    {
        $positions = $this->getAll();
        $this->getOne($positions);
    }

    /**
     * Get all the positions available.
     * @return array
     */
    private function getAll()
    {
        $response = $this->createClient()->v1()->positions()->get();
        $this->assertEquals(200, $response->getStatusCode());

        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * Take one of the existing positions (from getAll()) and search for it.
     * ** If no open positions, this does nothing **
     * @param array $positions
     * @return void
     */
    public function getOne(array $positions)
    {
        if (! empty($positions)) {
            $response = $this->createClient()->v1()
                ->positions()
                ->getBySymbol($positions[0]['symbol']);

            $this->assertEquals(200, $response->getStatusCode());
        }
    }
}
