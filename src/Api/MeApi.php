<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk\Api;

class MeApi extends Api
{
    private const MAIN_URI = 'me';

    public function show(): array
    {
        return $this->get(self::MAIN_URI);
    }
}
