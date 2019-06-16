<?php

namespace Dambrogia\AlpacaTest\Endpoint\V1;

use PHPUnit\Framework\TestCase;
use Dambrogia\AlpacaTest\CreateClientTrait;
use Ratchet\Client\WebSocket;
use Ratchet\RFC6455\Messaging\MessageInterface;

final class StreamTest extends TestCase
{
    use CreateClientTrait;

    public function testStreaming(): void
    {
        $succeed = $this->getSucceedCallable();
        $fail = $this->getFailCallable();

        $this->createClient()->streaming()->connect([
            'account_updates', 'trade_updates'
        ], $succeed, $fail);

        $this->assertTrue(true);
    }

    /**
     * Helper function to get succeed callback for stream connecton.
     * @return Callable
     */
    private function getSucceedCallable(): callable
    {
        return function (WebSocket $conn, \stdClass $data) {
            // As long as this hits and the connection closes, we're good.
            $this->assertTrue(true);
            $conn->close();
        };
    }

    /**
     * Helper function to get fail callable.
     * @return Callable
     */
    private function getFailCallable(): callable
    {
        return function (\Exception $e) {
            echo "Could not connect: {$e->getMessage()}\n";
            // If this hits we're not good.
            $this->assertTrue(false);
        };
    }
}
