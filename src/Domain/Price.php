<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk\Domain;

class Price
{
    public function __construct(
        private readonly float $value,
    ) {
    }

    public function asFloat(): float
    {
        return $this->value;
    }
}
