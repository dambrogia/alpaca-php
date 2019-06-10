<?php

namespace Dambrogia\AlpacaTest\Endpoint\V1;

use PHPUnit\Framework\TestCase;
use Dambrogia\AlpacaTest\CreateClientTrait;

final class AssetsTest extends TestCase
{
    use CreateClientTrait;

    public function testGetAssets(): void
    {
        $assets = $this->getAll();
        $this->getOne($assets);
    }

    /**
     * Get all assets.
     * @return array
     */
    private function getAll(): array
    {
        $response = $this->createV1Client()->assets()->get(['status' => 'active']);

        $this->assertEquals(200, $response->getStatusCode());

        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * Find an asset to get by it's symbol from the array of assets.
     * @param array $assets
     * @return void
     */
    public function getOne(array $assets): void
    {
        $symbol = null;

        foreach ($assets as $asset) {
            if ($asset['tradable'] && $asset['exchange'] == 'NYSE') {
                $symbol = $asset['symbol'];
                break;
            }
        }

        $response = $this->createV1Client()->assets()->getBySymbol($symbol);

        $this->assertEquals(200, $response->getStatusCode());
    }
}
