<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk\Tests\Unit\Domain;

use DjThossi\ShipcloudSdk\Domain\CarrierTrackingUrl;
use DjThossi\ShipcloudSdk\Domain\InvalidCarrierTrackingUrlException;
use PHPUnit\Framework\TestCase;

class CarrierTrackingUrlTest extends TestCase
{
    public function testGetValue(): void
    {
        $expectedValue = 'https://www.example.com';
        $object = new CarrierTrackingUrl($expectedValue);
        $this->assertEquals($expectedValue, $object->asString());
    }

    public function testEmptyStringWillThrowException(): void
    {
        $this->expectException(InvalidCarrierTrackingUrlException::class);

        new CarrierTrackingUrl('');
    }
}
