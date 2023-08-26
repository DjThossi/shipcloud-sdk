<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk\Http;

class Client extends \GuzzleHttp\Client
{
    public function __construct(string $apiKey)
    {
        parent::__construct([
            'base_uri' => 'https://api.shipcloud.io/v1/',
            'auth' => [$apiKey, null],
            'headers' => [
                'Content-Type' => 'application/json',
            ],
        ]);
    }
}
