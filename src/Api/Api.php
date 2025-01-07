<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk\Api;

use DjThossi\ShipcloudSdk\Domain\Response;
use DjThossi\ShipcloudSdk\Http\Client;
use Psr\Http\Message\ResponseInterface;

abstract class Api
{
    public function __construct(
        protected readonly Client $client
    ) {
    }

    protected function get(string $uri, array $parameters = []): ResponseInterface
    {
        return $this->client->execute('get', $uri, $parameters);
    }

    protected function post(string $uri, array $parameters = [], array $body = []): ResponseInterface
    {
        return $this->client->execute('post', $uri, $parameters, $body);
    }

    protected function delete(string $uri, array $parameters = [], array $body = []): ResponseInterface
    {
        return $this->client->execute('delete', $uri, $parameters, $body);
    }

    protected function mapResponse(ResponseInterface $response): Response
    {
        return new Response(
            $response->getStatusCode(),
            $response->getHeaders(),
            $response->getBody()->getContents()
        );
    }
}
