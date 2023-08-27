<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk\Api;

use DjThossi\ShipcloudSdk\Domain\Response;

class ShipmentsApi extends Api
{
    private const MAIN_URI = 'shipments';

    public function create(array $body): Response
    {
        return $this->post(self::MAIN_URI, [], $body);
    }

    public function find(string $id): Response
    {
        return $this->get(self::MAIN_URI . '/' . $id);
    }

    public function remove(string $id): Response
    {
        return $this->delete(self::MAIN_URI . '/' . $id);
    }

    public function all(array $parameters = []): Response
    {
        return $this->get(self::MAIN_URI, $parameters);
    }
}
