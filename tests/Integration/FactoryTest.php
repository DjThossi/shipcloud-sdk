<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk\Tests\Integration;

use DjThossi\ShipcloudSdk\Api\AddressesApi;
use DjThossi\ShipcloudSdk\Api\CarriersApi;
use DjThossi\ShipcloudSdk\Api\DefaultReturnsAddressApi;
use DjThossi\ShipcloudSdk\Api\DefaultShippingAddressApi;
use DjThossi\ShipcloudSdk\Api\InvoiceAddressApi;
use DjThossi\ShipcloudSdk\Api\MeApi;
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

    public function testCanGetDefaultShippingAddressApi(): void
    {
        $object = $this->createFactory()->getDefaultShippingAddressApi();

        /* @noinspection UnnecessaryAssertionInspection */
        $this->assertInstanceOf(DefaultShippingAddressApi::class, $object);
    }

    public function testCanGetInvoiceAddressApi(): void
    {
        $object = $this->createFactory()->getInvoiceAddressApi();

        /* @noinspection UnnecessaryAssertionInspection */
        $this->assertInstanceOf(InvoiceAddressApi::class, $object);
    }

    public function testCanGetMeApi(): void
    {
        $object = $this->createFactory()->getMeApi();

        /* @noinspection UnnecessaryAssertionInspection */
        $this->assertInstanceOf(MeApi::class, $object);
    }

    private function createFactory(): Factory
    {
        return new Factory('AnyString');
    }
}
