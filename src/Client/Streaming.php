<?php

namespace Dambrogia\Alpaca\Client;

use Dambrogia\Alpaca\Config;
use Ratchet\Client\WebSocket;
use Ratchet\RFC6455\Messaging\MessageInterface;
use React\Promise\Promise;
use stdClass;
use function GuzzleHttp\json_decode;
use function Ratchet\Client\connect;

class Streaming
{
    private $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * Connect to the declared streams.
     * @param array $streams
     * @param Callable $success
     * @param Callable $failure
     * @return Promise
     */
    public function connect(array $streams, callable $succeed, callable $fail): Promise
    {
        $prefix = $this->config->getEndpointPrefix();
        $endpoint = str_replace('http', 'ws', $prefix) . 'stream';

        return connect($endpoint)->then($this->init($streams, $succeed), $fail);
    }

    /**
     * Initialize the socket connection, then listen to the stream by running
     * the declared successfull callback method.
     * @param array $streams
     * @param Callable $succeed
     * @return Callable
     */
    protected function init(array $streams, callable $callback): callable
    {
        return function (WebSocket $conn) use ($streams, $callback) {
            $this->auth($conn)
                ->subscribe($conn, $streams)
                ->listen($conn, $callback);
        };
    }

    /**
     * Handle the authentication process for the stream.
     * @param WebSocket $conn
     * @return self
     */
    protected function auth(WebSocket $conn): self
    {
        $authData = [
            'action' => 'authenticate',
            'data' => [
                'key_id' => $this->config->getKeyId(),
                'secret_key' => $this->config->getSecretKey()
            ]
        ];

        $this->listen($conn, function (WebSocket $conn, stdClass $message) {
            if ($message->stream == 'authorization') {
                $isAuth = $message->data->action == 'authenticate';
                $isUnauthed = $message->data->status == 'unauthorized';

                if ($isAuth && $isUnauthed) {
                    $conn->close();
                    throw new StreamingException('Authorization failed.');
                }
            }
        });

        $conn->send(json_encode($authData));

        return $this;
    }

    /**
     * Declare the streams to listen to.
     * @param WebSocket $conn
     * @param array $streams
     * @return self
     */
    protected function subscribe(WebSocket $conn, array $streams): self
    {
        $data = [ 'action' => 'listen', 'data' => [ 'streams' => $streams ] ];

        $conn->send(json_encode($data));

        return $this;
    }

    /**
     * The API only listens on the 'message' event. Restrict communications
     * to that event.
     * @param WebSocket $conn
     * @param Callable $callback
     * @param boolean $once
     * @return self
     */
    protected function listen(WebSocket $conn, callable $callback, $once = false): self
    {
        $fn = function (MessageInterface $message) use ($conn, $callback) {
            if (is_null($data = json_decode($message->__toString()))) {
                throw new StreamingException('Invalid data received.');
            }

            return $callback($conn, $data);
        };

        $conn->{ $once ? 'once' : 'on' }('message', $fn);

        return $this;
    }
}
