<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk;

use DjThossi\ShipcloudSdk\Api\AddressesApi;
use DjThossi\ShipcloudSdk\Http\Client;

class Factory
{
    public function __construct(
        private readonly ?string $apiKey = null
    ) {
    }

    public function getAddressesApi(): AddressesApi
    {
        return new AddressesApi($this->createClient());
    }

    protected function createClient(): Client
    {
        return new Client($this->apiKey);
    }
}
