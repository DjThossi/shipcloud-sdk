<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk\Api;

use DjThossi\ShipcloudSdk\Http\Client;
use Psr\Http\Message\ResponseInterface;

abstract class Api
{
    public function __construct(
        protected readonly Client $client
    ) {
    }

    protected function get($uri = null, $parameters = []): array
    {
        return json_decode(
            $this->execute('get', $uri, $parameters)->getBody()->getContents(),
            true,
            512,
            \JSON_THROW_ON_ERROR
        );
    }

    protected function post($uri = null, $parameters = [], $body = []): array
    {
        return json_decode(
            $this->execute('post', $uri, $parameters, $body)->getBody()->getContents(),
            true,
            512,
            \JSON_THROW_ON_ERROR
        );
    }

    protected function delete($uri = null, $parameters = [], $body = []): bool
    {
        return 204 === $this->execute('delete', $uri, $parameters, $body)->getStatusCode();
    }

    protected function execute($httpMethod, $uri, array $parameters = [], array $body = []): ResponseInterface
    {
        return $this->client->{$httpMethod}(
            $uri,
            [
                'query' => $parameters,
                'json' => $body,
            ]
        );
    }
}
