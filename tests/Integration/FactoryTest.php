<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk\Tests\Integration;

use DjThossi\ShipcloudSdk\Api\AddressesApi;
use DjThossi\ShipcloudSdk\Api\CarriersApi;
use DjThossi\ShipcloudSdk\Api\DefaultReturnsAddressApi;
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

    public function testCanGetCarriersApi(): void
    {
        $object = $this->createFactory()->getCarriersApi();

        /* @noinspection UnnecessaryAssertionInspection */
        $this->assertInstanceOf(CarriersApi::class, $object);
    }

    public function testCanGetDefaultReturnsAddressApi(): void
    {
        $object = $this->createFactory()->getDefaultReturnsAddressApi();

        /* @noinspection UnnecessaryAssertionInspection */
        $this->assertInstanceOf(DefaultReturnsAddressApi::class, $object);
    }

    private function createFactory(): Factory
    {
        return new Factory('AnyString');
    }
}
