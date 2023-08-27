<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

// The Sandbox API Key is to be found in your shipcloud account under https://app.shipcloud.io/de/users/api_key
$sandboxApiKey = 'YOUR_SANDBOX_API_KEY';
$shipcloudFactory = new DjThossi\ShipcloudSdk\Factory($sandboxApiKey);

// List all shipments
$result = $shipcloudFactory->getShipmentsApi()->all();

// List all UPS shipments
// $result = $shipcloudFactory->getShipmentsApi()->all(['carrier' => 'ups']);

// Create your first shipment
/*
$result = $shipcloudFactory->getShipmentsApi()->create([
    "to" => [
        "company" => "Receiver Inc.",
        "first_name" => "Max",
        "last_name" => "Mustermann",
        "street" => "Beispielstrasse",
        "street_no" => "42",
        "city" => "Hamburg",
        "zip_code" => "22100",
        "country" => "DE",
    ],
    "from" => [
        "company" => "Receiver Inc.",
        "first_name" => "Max",
        "last_name" => "Mustermann",
        "street" => "Beispielstrasse",
        "street_no" => "42",
        "city" => "Hamburg",
        "zip_code" => "22100",
        "country" => "DE",
    ],
    "package" => [
        "weight" => 1.5,
        "length" => 20,
        "width" => 20,
        "height" => 20,
        "type" => "parcel",
    ],
    "carrier" => "ups",
    "service" => "standard",
    "reference_number" => "ref123456",
    "notification_email" => "person@example.com",
    "create_shipping_label" => true,
]);
//*/

// List a single shipment
// $result = $shipcloudFactory->getShipmentsApi()->find($result['id']);

// remove a single shipment
// $result = $shipcloudFactory->getShipmentsApi()->remove($result['id']);

/* @noinspection ForgottenDebugOutputInspection */
var_dump($result);
