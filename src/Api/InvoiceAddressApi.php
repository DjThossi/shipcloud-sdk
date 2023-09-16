<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk\Api;

use DjThossi\ShipcloudSdk\Domain\Response;

class InvoiceAddressApi extends Api
{
    private const MAIN_URI = 'invoice_address';

    public function show(): Response
    {
        return $this->mapResponse($this->get(self::MAIN_URI));
    }
}
