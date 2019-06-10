<?php

namespace Dambrogia\AlpacaTest\Endpoint\V2;

use PHPUnit\Framework\TestCase;
use Dambrogia\AlpacaTest\CreateClientTrait;

final class OrdersTest extends TestCase
{
    use CreateClientTrait;

    public function testCrudOrder(): void
    {
        // Create.
        $responseData = $this->create();
        // Read.
        $this->readAll();
        $this->readById($responseData['id']);
        // @todo - not working. $this->readByClientOrderId($responseData['client_order_id']);
        // No update functions available.
        // Delete.
        $this->delete($responseData['id']);
    }
    /**
     * Create an order so we can test with it. Return it's data.
     * @return array
     */
    private function create(): array
    {
        $response = $this->createClient()->v2()->orders()->create([
            'symbol' => 'AGCO',
            'qty' => 1,
            'side' => 'buy',
            'type' => 'market',
            'time_in_force' => 'day'
        ]);

        $this->assertEquals(200, $response->getStatusCode());

        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * Fetch all orders. At least one should exist since one is created
     * before this function is run.
     * @return void
     */
    private function readAll()
    {
        $response = $this->createClient()->v2()->orders()->get();
        $data = json_decode($response->getBody()->getContents(), true);
        $this->assertTrue(count($data) > 0);
    }

    /**
     * Assert an order can be fetched by it's id.
     * @param string $id
     * @return void
     */
    private function readById(string $id)
    {
        $response = $this->createClient()->v2()->orders()->getById($id);
        $data = json_decode($response->getBody()->getContents(), true);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals($id, $data['id']);
    }

    /**
     * Assert an order can be fetched by it's client_order_id
     * @param string $clientOrderId
     * @return void
     */
    private function readByClientOrderId(string $clientOrderId)
    {
        $response = $this->createClient()->v2()->orders()->getByClientOrderId($clientOrderId);
        $data = json_decode($response->getBody()->getContents(), true);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals($clientOrderId, $data['client_order_id']);
    }

    /**
     * Assert an order can be deleted.
     * @param string $id
     * @return void
     */
    private function delete(string $id)
    {
        $response = $this->createClient()->v2()->orders()->delete($id);
        // 204 (deleted) and 422 (not deletable) are acceptable. 404 is not.
        $this->assertTrue(in_array($response->getStatusCode(), [422, 204]));
    }
}
