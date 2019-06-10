<?php

namespace Dambrogia\AlpacaTest\Endpoint;

use PHPUnit\Framework\TestCase;
use Dambrogia\AlpacaTest\CreateClientTrait;

final class AssetsTest extends TestCase
{
    use CreateClientTrait;

    public function testGetAssets(): void
    {
        $response = $this->createV1Client()->assets()->get([
            'status' => 'active'
        ]);

        $this->assertEquals(200, $response->getStatusCode());

        // Grab symbol to test getBySymbol method.
        $data = json_decode($response->getBody()->getContents(), true);
        $symbol = null;

        foreach ($data as $asset) {
            if ($asset['tradable'] && $asset['exchange'] == 'NYSE') {
                $symbol = $asset['symbol'];
                break;
            }
        }

        $response = $this->createV1Client()->assets()->getBySymbol($symbol);

        $this->assertEquals(200, $response->getStatusCode());
    }
}
