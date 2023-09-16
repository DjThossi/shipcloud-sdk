<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk\Api;

use DjThossi\ShipcloudSdk\Domain\Response;
use DjThossi\ShipcloudSdk\Domain\ShipmentsCreateResponse;

class ShipmentsApi extends Api
{
    private const MAIN_URI = 'shipments';

    public function create(array $body): ShipmentsCreateResponse
    {
        $response = $this->post(self::MAIN_URI, [], $body);

        return new ShipmentsCreateResponse(
            $response->getStatusCode(),
            $response->getHeaders(),
            $response->getBody()->getContents()
        );
    }

    public function find(string $id): Response
    {
        return $this->mapResponse($this->get(self::MAIN_URI . '/' . $id));
    }

    public function remove(string $id): Response
    {
        return $this->mapResponse($this->delete(self::MAIN_URI . '/' . $id));
    }

    public function all(array $parameters = []): Response
    {
        return $this->mapResponse($this->get(self::MAIN_URI, $parameters));
    }
}
