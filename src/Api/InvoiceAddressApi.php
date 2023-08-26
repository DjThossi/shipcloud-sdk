<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk\Api;

class InvoiceAddressApi extends Api
{
    private const MAIN_URI = 'invoice_address';

    public function show(): array
    {
        return $this->get(self::MAIN_URI);
    }
}
