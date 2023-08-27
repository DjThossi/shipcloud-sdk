<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk\Api;

use DjThossi\ShipcloudSdk\Domain\Response;

class CarriersApi extends Api
{
    private const MAIN_URI = 'carriers';

    public function all(): Response
    {
        return $this->get(self::MAIN_URI);
    }
}
