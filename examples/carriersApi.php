<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

// The Sandbox API Key is to be found in your shipcloud account under https://app.shipcloud.io/de/users/api_key
$sandboxApiKey = 'YOUR_SANDBOX_API_KEY';
$shipcloudFactory = new DjThossi\ShipcloudSdk\Factory($sandboxApiKey);

// List all carriers
$result = $shipcloudFactory->getCarriersApi()->all();

/* @noinspection ForgottenDebugOutputInspection */
var_dump($result);
