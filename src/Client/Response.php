<?php

namespace Dambrogia\Alpaca\Client;

use Dambrogia\Alpaca\Concern\ResponseException;
use GuzzleHttp\Psr7\Response as ParentResponse;

class Response extends ParentResponse
{
    /** @var array */
    private $data = null;

    /**
     * Extends the PSR-compliant response. Just adds a helper to prevent the
     * repetition of grabbing the body content and parsing json.
     *
     * @param ParentResponse $response
     */
    public function __construct(ParentResponse $response)
    {
        parent::__construct(
            $response->getStatusCode(),
            $response->getHeaders(),
            $response->getBody(),
            $response->getProtocolVersion(),
            $response->getReasonPhrase()
        );
    }

    /**
     * Helper function to easily grab the data rather than manually organizing
     * it every time.
     *
     * @return array
     */
    public function data(): array
    {
        try {
            if ($this->data === null) {
                $raw = $this->getBody()->getContents();
                $array = json_decode($raw, true);

                if ($array === null && json_last_error() !== JSON_ERROR_NONE) {
                    throw new \Exception(json_last_error_msg());
                }

                $this->data = $array;
            }

            return $this->data;
        } catch (\Exception $e) {
            throw new ResponseException($e->getMessage(), $e->getCode(), $e);
        }
    }
}
