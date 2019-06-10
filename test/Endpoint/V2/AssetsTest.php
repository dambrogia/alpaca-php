<?php

namespace Dambrogia\AlpacaTest\Endpoint\V2;

use PHPUnit\Framework\TestCase;
use Dambrogia\AlpacaTest\CreateClientTrait;

final class AssetsTest extends TestCase
{
    use CreateClientTrait;

    public function testGetAssets(): void
    {
        $assets = $this->getAll();
        $asset = $this->pickOne($assets);
        $this->getBySymbol($asset['symbol']);
        $this->getById($asset['id']);
    }

    /**
     * Picks a generic asset to use in the other 2 tests.
     * @param array $assets
     * @return array
     */
    private function pickOne(array $assets): array
    {
        $symbol = null;

        foreach ($assets as $asset) {
            if ($asset['tradable'] && $asset['exchange'] == 'NYSE') {
                return $asset;
            }
        }

        return null;
    }

    /**
     * Get all assets.
     * @return array
     */
    private function getAll(): array
    {
        $response = $this->createV2Client()->assets()->get(['status' => 'active']);

        $this->assertEquals(200, $response->getStatusCode());

        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * Find an asset to get by it's symbol.
     * @param string $symbol
     * @return void
     */
    public function getBySymbol(string $symbol): void
    {
        $status = $this->createV2Client()
            ->assets()
            ->getBySymbol($symbol)
            ->getStatusCode();

        $this->assertEquals(200, $status);
    }

    public function getById(string $id): void
    {
        $status = $this->createV2Client()
            ->assets()
            ->getById($id)
            ->getStatusCode();

        $this->assertEquals(200, $status);
    }
}
