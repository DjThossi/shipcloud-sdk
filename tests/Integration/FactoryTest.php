<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk\Tests\Integration;

use DjThossi\ShipcloudSdk\Api\AddressesApi;
use DjThossi\ShipcloudSdk\Factory;
use PHPUnit\Framework\TestCase;

class FactoryTest extends TestCase
{
    public function testCanGetAddressApi(): void
    {
        $object = $this->createFactory()->getAddressesApi();

        /* @noinspection UnnecessaryAssertionInspection */
        $this->assertInstanceOf(AddressesApi::class, $object);
    }

    private function createFactory(): Factory
    {
        return new Factory('AnyString');
    }
}
