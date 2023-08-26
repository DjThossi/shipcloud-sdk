<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk\Api;

class DefaultReturnsAddressApi extends Api
{
    private const MAIN_URI = 'default_returns_address';

    public function show(): array
    {
        return $this->get(self::MAIN_URI);
    }
}
