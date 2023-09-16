<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk\Tests\Unit\Domain;

use DjThossi\ShipcloudSdk\Domain\InvalidTrackingUrlException;
use DjThossi\ShipcloudSdk\Domain\TrackingUrl;
use PHPUnit\Framework\TestCase;

class TrackingUrlTest extends TestCase
{
    public function testGetValue(): void
    {
        $expectedValue = 'https://www.example.com';
        $object = new TrackingUrl($expectedValue);
        $this->assertEquals($expectedValue, $object->asString());
    }

    public function testEmptyStringWillThrowException(): void
    {
        $this->expectException(InvalidTrackingUrlException::class);

        new TrackingUrl('');
    }
}
