<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk\Api;

use DjThossi\ShipcloudSdk\Domain\Response;

class TrackersApi extends Api
{
    private const MAIN_URI = 'trackers';

    public function create(array $body): Response
    {
        return $this->mapResponse($this->post(self::MAIN_URI, [], $body));
    }

    public function find(string $id): Response
    {
        return $this->mapResponse($this->get(self::MAIN_URI . '/' . $id));
    }

    public function all(): Response
    {
        return $this->mapResponse($this->get(self::MAIN_URI));
    }
}
