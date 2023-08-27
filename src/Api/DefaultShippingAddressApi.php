<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk\Api;

use DjThossi\ShipcloudSdk\Domain\Response;

class DefaultShippingAddressApi extends Api
{
    private const MAIN_URI = 'default_shipping_address';

    public function show(): Response
    {
        return $this->get(self::MAIN_URI);
    }
}
