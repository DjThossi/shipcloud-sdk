<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk\Domain;

class CarrierTrackingNo
{
    public function __construct(
        private readonly string $value,
    ) {
        $this->ensure();
    }

    public function asString(): string
    {
        return $this->value;
    }

    private function ensure(): void
    {
        if ($this->value === '') {
            throw new InvalidCarrierTrackingNoException('The value should not be empty');
        }
    }
}
