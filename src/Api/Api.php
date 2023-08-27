<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk\Api;

use DjThossi\ShipcloudSdk\Domain\Response;
use DjThossi\ShipcloudSdk\Http\Client;

abstract class Api
{
    public function __construct(
        protected readonly Client $client
    ) {
    }

    protected function get($uri = null, $parameters = []): Response
    {
        return $this->execute('get', $uri, $parameters);
    }

    protected function post($uri = null, $parameters = [], $body = []): Response
    {
        return $this->execute('post', $uri, $parameters, $body);
    }

    protected function delete($uri = null, $parameters = [], $body = []): Response
    {
        return $this->execute('delete', $uri, $parameters, $body);
    }

    protected function execute($httpMethod, $uri, array $parameters = [], array $body = []): Response
    {
        $response = $this->client->{$httpMethod}(
            $uri,
            [
                'query' => $parameters,
                'json' => $body,
            ]
        );

        return new Response(
            $response->getStatusCode(),
            $response->getHeaders(),
            $response->getBody()->getContents()
        );
    }
}
