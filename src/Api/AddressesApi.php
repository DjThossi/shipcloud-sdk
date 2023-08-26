<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk\Api;

class AddressesApi extends Api
{
    private const MAIN_URI = 'addresses';

    public function create(array $body): array
    {
        return $this->post(self::MAIN_URI, [], $body);
    }

    public function find(string $id): array
    {
        return $this->get(self::MAIN_URI . '/' . $id);
    }

    public function all(array $parameters = []): array
    {
        return $this->get(self::MAIN_URI, $parameters);
    }
}
