<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

// The Sandbox API Key is to be found in your shipcloud account under https://app.shipcloud.io/de/users/api_key
$sandboxApiKey = 'YOUR_SANDBOX_API_KEY';
$shipcloudFactory = new DjThossi\ShipcloudSdk\Factory($sandboxApiKey);

// List all trackers
$result = $shipcloudFactory->getTrackersApi()->all();

// Create your first tracker
/*
$result = $shipcloudFactory->getTrackersApi()->create([
    "carrier_tracking_no" => "1XXXXXXXXXX",
    "carrier" => "ups",
])->getBodyAsArray();
//*/

// List a single tracker
// $result = $shipcloudFactory->getTrackersApi()->find($result['id'])->getBodyAsArray();

/* @noinspection ForgottenDebugOutputInspection */
var_dump($result);
