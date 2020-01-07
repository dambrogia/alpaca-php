<?php

namespace Dambrogia\AlpacaTest\Endpoint\V1;

use PHPUnit\Framework\TestCase;
use Dambrogia\AlpacaTest\CreateClientTrait;

final class BarsTest extends TestCase
{
    use CreateClientTrait;

    public function testGetAccount(): void
    {
        $params = ['symbols' => 'AAN'];
        $status = $this->createClient()->marketData()->bars()->get('day', $params)->getStatusCode();


        $this->assertEquals(200, $status);
    }

    public function testResponse(): void
    {
        $params = ['symbols' => 'AAN'];
        $response = $this->createClient()->marketData()->bars()->get('day', $params);
        $data = $response->data();

        $this->assertEquals(true, (bool) is_array($data));
    }
}
