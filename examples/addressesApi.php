<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

// The Sandbox API Key is to be found in your shipcloud account under https://app.shipcloud.io/de/users/api_key
$sandboxApiKey = 'YOUR_SANDBOX_API_KEY';
$shipcloudFactory = new DjThossi\ShipcloudSdk\Factory($sandboxApiKey);

// List all addresses
$result = $shipcloudFactory->getAddressesApi()->all();

// Create your first address
/*
$result = $shipcloudFactory->getAddressesApi()->create([
    'company' => 'Example Company',
    'first_name' => 'Max',
    'last_name' => 'Mustermann',
    'street' => 'Musterstraße',
    'street_no' => '42',
    'zip_code' => '12345',
    'city' => 'Musterstadt',
    'country' => 'DE',
    'phone' => '555-555'
])->getBodyAsArray();
//*/

// List a single address
// $result = $shipcloudFactory->getAddressesApi()->find($result['id']);

/* @noinspection ForgottenDebugOutputInspection */
var_dump($result);
