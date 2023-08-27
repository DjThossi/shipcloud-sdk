<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk\Domain;

class RateLimit
{
    public function __construct(
        private readonly int $limit,
        private readonly int $interval,
        private readonly int $remaining,
        private readonly int $reset
    ) {
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function getInterval(): int
    {
        return $this->interval;
    }

    public function getRemaining(): int
    {
        return $this->remaining;
    }

    public function getReset(): int
    {
        return $this->reset;
    }
}
