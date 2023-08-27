<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

// The Sandbox API Key is to be found in your shipcloud account under https://app.shipcloud.io/de/users/api_key
$sandboxApiKey = 'YOUR_SANDBOX_API_KEY';
$shipcloudFactory = new DjThossi\ShipcloudSdk\Factory($sandboxApiKey);

// Create your first Shipment Quote
$result = $shipcloudFactory->getShipmentQuotesApi()->create([
    'carrier' => 'ups',
    'service' => 'standard',
    'to' => [
        'street' => 'Beispielstrasse',
        'street_no' => '42',
        'zip_code' => '22100',
        'city' => 'Hamburg',
        'country' => 'DE',
    ],
    'from' => [
        'street' => 'Musterstrasse',
        'street_no' => '23',
        'zip_code' => '20148',
        'city' => 'Hamburg',
        'country' => 'DE',
    ],
    'package' => [
        'weight' => 1.5,
        'length' => 20,
        'width' => 20,
        'height' => 20,
    ],
]);

/* @noinspection ForgottenDebugOutputInspection */
var_dump($result);
