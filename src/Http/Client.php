<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk\Http;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;

class Client
{
    private readonly ClientInterface $httpClient;

    public function __construct(string $apiKey)
    {
        $this->httpClient = new GuzzleClient([
            'base_uri' => 'https://api.shipcloud.io/v1/',
            'auth' => [$apiKey, null],
            'headers' => [
                'Content-Type' => 'application/json',
            ],
        ]);
    }

    public function execute(string $httpMethod, string $uri, array $parameters = [], array $body = []): ResponseInterface
    {
        return $this->httpClient->{$httpMethod}(
            $uri,
            [
                'query' => $parameters,
                'json' => $body,
            ]
        );
    }
}
