<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk\Api;

class DefaultShippingAddressApi extends Api
{
    private const MAIN_URI = 'default_shipping_address';

    public function show(): array
    {
        return $this->get(self::MAIN_URI);
    }
}
