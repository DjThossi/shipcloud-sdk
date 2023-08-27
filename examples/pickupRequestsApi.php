<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

// The Sandbox API Key is to be found in your shipcloud account under https://app.shipcloud.io/de/users/api_key
$sandboxApiKey = 'YOUR_SANDBOX_API_KEY';
$shipcloudFactory = new DjThossi\ShipcloudSdk\Factory($sandboxApiKey);

// List all pickup requests
$result = $shipcloudFactory->getPickupRequestsApi()->all();

// Create your first pickup request
/*
$result = $shipcloudFactory->getPickupRequestsApi()->create([
    "carrier" => "ups",
    "pickup_time" => [
        "earliest" => (new DateTime('next Monday 8am'))->format('c'),
        "latest" => (new DateTime('next Monday 6pm'))->format('c'),
    ],
    "pickup_address" => [
        "company" => "Muster-Company",
        "first_name" => "Max",
        "last_name" => "Mustermann",
        "street" => "Musterstraße",
        "street_no" => "42",
        "zip_code" => "54321",
        "city" => "Musterstadt",
        "country" => "DE",
        "phone" => "555-555",
    ],
]);
//*/

// List a single pickup requests
// $result = $shipcloudFactory->getPickupRequestsApi()->find($result['id']);

/* @noinspection ForgottenDebugOutputInspection */
var_dump($result);
