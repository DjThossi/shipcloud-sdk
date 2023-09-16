<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk\Tests\Unit\Domain;

use DjThossi\ShipcloudSdk\Domain\CarrierTrackingNo;
use DjThossi\ShipcloudSdk\Domain\InvalidCarrierTrackingNoException;
use PHPUnit\Framework\TestCase;

class CarrierTrackingNoTest extends TestCase
{
    public function testGetValue(): void
    {
        $expectedValue = 'https://www.example.com';
        $object = new CarrierTrackingNo($expectedValue);
        $this->assertEquals($expectedValue, $object->asString());
    }

    public function testEmptyStringWillThrowException(): void
    {
        $this->expectException(InvalidCarrierTrackingNoException::class);

        new CarrierTrackingNo('');
    }
}
