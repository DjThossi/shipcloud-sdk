<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk\Api;

class CarriersApi extends Api
{
    private const MAIN_URI = 'carriers';

    public function all(): array
    {
        return $this->get(self::MAIN_URI);
    }
}
