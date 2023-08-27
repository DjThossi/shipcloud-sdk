<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk\Api;

class ShipmentQuotesApi extends Api
{
    private const MAIN_URI = 'shipment_quotes';

    public function create(array $body): array
    {
        return $this->post(self::MAIN_URI, [], $body);
    }
}
