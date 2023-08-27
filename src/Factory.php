<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk;

use DjThossi\ShipcloudSdk\Api\AddressesApi;
use DjThossi\ShipcloudSdk\Api\CarriersApi;
use DjThossi\ShipcloudSdk\Api\DefaultReturnsAddressApi;
use DjThossi\ShipcloudSdk\Api\DefaultShippingAddressApi;
use DjThossi\ShipcloudSdk\Api\InvoiceAddressApi;
use DjThossi\ShipcloudSdk\Api\MeApi;
use DjThossi\ShipcloudSdk\Api\PickupRequestsApi;
use DjThossi\ShipcloudSdk\Api\ShipmentQuotesApi;
use DjThossi\ShipcloudSdk\Api\ShipmentsApi;
use DjThossi\ShipcloudSdk\Api\TrackersApi;
use DjThossi\ShipcloudSdk\Api\WebhooksApi;
use DjThossi\ShipcloudSdk\Http\Client;

class Factory
{
    public function __construct(
        private readonly ?string $apiKey = null
    ) {
    }

    public function getAddressesApi(): AddressesApi
    {
        return new AddressesApi($this->createClient());
    }

    public function getCarriersApi(): CarriersApi
    {
        return new CarriersApi($this->createClient());
    }

    public function getDefaultReturnsAddressApi(): DefaultReturnsAddressApi
    {
        return new DefaultReturnsAddressApi($this->createClient());
    }

    public function getDefaultShippingAddressApi(): DefaultShippingAddressApi
    {
        return new DefaultShippingAddressApi($this->createClient());
    }

    public function getInvoiceAddressApi(): InvoiceAddressApi
    {
        return new InvoiceAddressApi($this->createClient());
    }

    public function getMeApi(): MeApi
    {
        return new MeApi($this->createClient());
    }

    public function getPickupRequestsApi(): PickupRequestsApi
    {
        return new PickupRequestsApi($this->createClient());
    }

    public function getShipmentQuotesApi(): ShipmentQuotesApi
    {
        return new ShipmentQuotesApi($this->createClient());
    }

    public function getShipmentsApi(): ShipmentsApi
    {
        return new ShipmentsApi($this->createClient());
    }

    public function getTrackersApi(): TrackersApi
    {
        return new TrackersApi($this->createClient());
    }

    public function getWebhooksApi(): WebhooksApi
    {
        return new WebhooksApi($this->createClient());
    }

    protected function createClient(): Client
    {
        return new Client($this->apiKey);
    }
}
