<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk\Domain;

class ShipmentsCreate
{
    public function __construct(
        private readonly Id $id,
        private readonly CarrierTrackingNo $carrierTrackingNo,
        private readonly CarrierTrackingUrl $carrierTrackingUrl,
        private readonly TrackingUrl $trackingUrl,
        private readonly LabelUrl $labelUrl,
        private readonly Price $price
    ) {
    }

    public function getId(): Id
    {
        return $this->id;
    }

    public function getCarrierTrackingNo(): CarrierTrackingNo
    {
        return $this->carrierTrackingNo;
    }

    public function getCarrierTrackingUrl(): CarrierTrackingUrl
    {
        return $this->carrierTrackingUrl;
    }

    public function getTrackingUrl(): TrackingUrl
    {
        return $this->trackingUrl;
    }

    public function getLabelUrl(): LabelUrl
    {
        return $this->labelUrl;
    }

    public function getPrice(): Price
    {
        return $this->price;
    }
}
