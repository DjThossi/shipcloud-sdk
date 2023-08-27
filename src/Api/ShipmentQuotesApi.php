<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk\Api;

class ShipmentQuotesApi extends Api
{
    public function create(array $body): array
    {
        return $this->post('shipment_quotes', [], $body);
    }
}
