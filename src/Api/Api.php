<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk\Api;

use DjThossi\ShipcloudSdk\Domain\Response;
use DjThossi\ShipcloudSdk\Http\Client;
use GuzzleHttp\Psr7\Response as Psr7Response;

abstract class Api
{
    public function __construct(
        protected readonly Client $client
    ) {
    }

    protected function get(string $uri, array $parameters = []): Psr7Response
    {
        return $this->execute('get', $uri, $parameters);
    }

    protected function post(string $uri, array $parameters = [], array $body = []): Psr7Response
    {
        return $this->execute('post', $uri, $parameters, $body);
    }

    protected function delete(string $uri, array $parameters = [], array $body = []): Psr7Response
    {
        return $this->execute('delete', $uri, $parameters, $body);
    }

    protected function execute(string $httpMethod, string $uri, array $parameters = [], array $body = []): Psr7Response
    {
        return $this->client->{$httpMethod}(
            $uri,
            [
                'query' => $parameters,
                'json' => $body,
            ]
        );
    }

    protected function mapResponse(Psr7Response $response): Response
    {
        return new Response(
            $response->getStatusCode(),
            $response->getHeaders(),
            $response->getBody()->getContents()
        );
    }
}
