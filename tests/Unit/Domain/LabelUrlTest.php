<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk\Tests\Unit\Domain;

use DjThossi\ShipcloudSdk\Domain\InvalidLabelUrlException;
use DjThossi\ShipcloudSdk\Domain\LabelUrl;
use PHPUnit\Framework\TestCase;

class LabelUrlTest extends TestCase
{
    public function testGetValue(): void
    {
        $expectedValue = 'https://www.example.com';
        $object = new LabelUrl($expectedValue);
        $this->assertEquals($expectedValue, $object->asString());
    }

    public function testEmptyStringWillThrowException(): void
    {
        $this->expectException(InvalidLabelUrlException::class);

        new LabelUrl('');
    }
}
