<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk\Tests\Unit\Domain;

use DjThossi\ShipcloudSdk\Domain\RateLimit;
use PHPUnit\Framework\TestCase;

class RateLimitTest extends TestCase
{
    private const RATE_LIMIT_LIMIT_VALUE = 120;
    private const RATE_LIMIT_INTERVAL_VALUE = 60;
    private const RATE_LIMIT_REMAINING_VALUE = 111;
    private const RATE_LIMIT_RESET_VALUE = 42;

    public function testGetLimit(): void
    {
        $rateLimit = $this->createRateLimitObject();
        $this->assertEquals(self::RATE_LIMIT_LIMIT_VALUE, $rateLimit->getLimit());
    }

    public function testGetRemaining(): void
    {
        $rateLimit = $this->createRateLimitObject();
        $this->assertEquals(self::RATE_LIMIT_REMAINING_VALUE, $rateLimit->getRemaining());
    }

    public function testGetInterval(): void
    {
        $rateLimit = $this->createRateLimitObject();
        $this->assertEquals(self::RATE_LIMIT_INTERVAL_VALUE, $rateLimit->getInterval());
    }

    public function testGetReset(): void
    {
        $rateLimit = $this->createRateLimitObject();
        $this->assertEquals(self::RATE_LIMIT_RESET_VALUE, $rateLimit->getReset());
    }

    private function createRateLimitObject(): RateLimit
    {
        return new RateLimit(
            self::RATE_LIMIT_LIMIT_VALUE,
            self::RATE_LIMIT_INTERVAL_VALUE,
            self::RATE_LIMIT_REMAINING_VALUE,
            self::RATE_LIMIT_RESET_VALUE
        );
    }
}
