<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk\Api;

class ShipmentsApi extends Api
{
    private const MAIN_URI = 'shipments';

    public function create(array $body): array
    {
        return $this->post(self::MAIN_URI, [], $body);
    }

    public function find(string $id): array
    {
        return $this->get(self::MAIN_URI . '/' . $id);
    }

    public function remove(string $id): bool
    {
        return $this->delete(self::MAIN_URI . '/' . $id);
    }

    public function all(array $parameters = []): array
    {
        return $this->get('shipments', $parameters);
    }
}
