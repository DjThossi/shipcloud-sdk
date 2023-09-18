<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk\Tests\Unit\Domain;

use DjThossi\ShipcloudSdk\Domain\Id;
use DjThossi\ShipcloudSdk\Domain\InvalidIdException;
use PHPUnit\Framework\TestCase;

class IdTest extends TestCase
{
    public function testGetValue(): void
    {
        $expectedValue = 'https://www.example.com';
        $object = new Id($expectedValue);
        $this->assertEquals($expectedValue, $object->asString());
    }

    public function testEmptyStringWillThrowException(): void
    {
        $this->expectException(InvalidIdException::class);

        new Id('');
    }
}
