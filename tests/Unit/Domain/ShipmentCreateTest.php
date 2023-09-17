<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk\Tests\Unit\Domain;

use DjThossi\ShipcloudSdk\Domain\CarrierTrackingNo;
use DjThossi\ShipcloudSdk\Domain\CarrierTrackingUrl;
use DjThossi\ShipcloudSdk\Domain\Id;
use DjThossi\ShipcloudSdk\Domain\LabelUrl;
use DjThossi\ShipcloudSdk\Domain\Price;
use DjThossi\ShipcloudSdk\Domain\ShipmentsCreate;
use DjThossi\ShipcloudSdk\Domain\TrackingUrl;
use PHPUnit\Framework\TestCase;

class ShipmentCreateTest extends TestCase
{
    protected const ID = '1';
    protected const CARRIER_TRACKING_NO = '2';
    protected const CARRIER_TRACKING_URL = 'https://www.example.com/#1';
    protected const TRACKING_URL = 'https://www.example.com/#2';
    protected const LABEL_URL = 'https://www.example.com/#3';
    protected const PRICE = 1.234;

    public function testGetId(): void
    {
        $object = $this->createWorkingObject();

        $this->assertEquals(self::ID, $object->getId()->asString());
    }

    public function testGetCarrierTrackingNo(): void
    {
        $object = $this->createWorkingObject();

        $this->assertEquals(self::CARRIER_TRACKING_NO, $object->getCarrierTrackingNo()->asString());
    }

    public function testGetCarrierTrackingUrl(): void
    {
        $object = $this->createWorkingObject();

        $this->assertEquals(self::CARRIER_TRACKING_URL, $object->getCarrierTrackingUrl()->asString());
    }

    public function testGetTrackingUrl(): void
    {
        $object = $this->createWorkingObject();

        $this->assertEquals(self::TRACKING_URL, $object->getTrackingUrl()->asString());
    }

    public function testGetLabelUrl(): void
    {
        $object = $this->createWorkingObject();

        $this->assertEquals(self::LABEL_URL, $object->getLabelUrl()->asString());
    }

    public function testGetPrice(): void
    {
        $object = $this->createWorkingObject();

        $this->assertEquals(self::PRICE, $object->getPrice()->asFloat());
    }

    private function createWorkingObject(): ShipmentsCreate
    {
        return new ShipmentsCreate(
            new Id(self::ID),
            new CarrierTrackingNo(self::CARRIER_TRACKING_NO),
            new CarrierTrackingUrl(self::CARRIER_TRACKING_URL),
            new TrackingUrl(self::TRACKING_URL),
            new LabelUrl(self::LABEL_URL),
            new Price(self::PRICE)
        );
    }
}
