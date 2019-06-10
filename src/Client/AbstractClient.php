<?php

namespace Dambrogia\Alpaca\Client;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use Dambrogia\Alpaca\Config;

abstract class AbstractClient
{
    private $config;
    private $client;

    public function __construct(Config $config)
    {
        $this->config = $config;
        $this->client =  $this->buildClient();
    }

    /**
     * Send a request to the Alpaca's REST api. Handles the majority of the
     * boilerplate code per request.
     * @param string $verb
     * @param string $endpoint
     * @param array $body
     * @return Response
     */
    public function request(string $verb, string $endpoint, array $body = []): Response
    {
        $data = [ 'headers' => $this->getHeaders() ];

        if (! empty($body)) {
            $data['body'] = \json_encode($body);
        }

        try {
            return $this->client->request($verb, $endpoint, $data);
        } catch (\Exception $e) {
            // $this->handleException($e);
            throw $e;
        }
    }

    /**
     * Get the necessary headers for the request.
     * @return array
     */
    private function getHeaders(): array
    {
        return [
            'APCA-API-KEY-ID' => $this->config->getKeyId(),
            'APCA-API-SECRET-KEY' => $this->config->getSecretKey(),
            'Content-Type' => 'application/json',
        ];
    }

    /**
     * Build the HTTP Client. With the lack of available PSR-17 clients and
     * client factories, Guzzle's client was chosen. This could possibly
     * be refactored in the future.
     * This is a possible PSR-18 candidate: https://github.com/fain182/diciotto
     * Zend Dictarios can be used for PSR-17 Response/Requests.
     * For the mean time this will do. Using the diciotto package with
     * 16 stars and an unknown vendor who promotes "Prefer a good Developer
     * eXperience over performance" in their read me isn't too attractive.
     * @return Client
     */
    private function buildClient(): Client
    {
        return new Client([
            'base_uri' => $this->config->getEndpointPrefix()
        ]);
    }

    /**
     * Getter method for class property: $this->config.
     */
    public function getConfig(): Config
    {
        return $this->config;
    }

    /**
     * Getter method for class property: $this->client.
     */
    public function getClient(): Client
    {
        return $this->client;
    }
}
