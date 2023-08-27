<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk\Api;

use DjThossi\ShipcloudSdk\Domain\Response;

class ShipmentQuotesApi extends Api
{
    private const MAIN_URI = 'shipment_quotes';

    public function create(array $body): Response
    {
        return $this->post(self::MAIN_URI, [], $body);
    }
}
