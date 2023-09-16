<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk\Tests\Unit\Domain;

use DjThossi\ShipcloudSdk\Domain\Price;
use PHPUnit\Framework\TestCase;

class PriceTest extends TestCase
{
    public function testGetValue(): void
    {
        $expectedValue = 1.234;
        $object = new Price($expectedValue);
        $this->assertEquals($expectedValue, $object->asFloat());
    }
}
