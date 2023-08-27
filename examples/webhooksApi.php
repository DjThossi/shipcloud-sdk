<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

// The Sandbox API Key is to be found in your shipcloud account under https://app.shipcloud.io/de/users/api_key
$sandboxApiKey = 'YOUR_SANDBOX_API_KEY';
$shipcloudFactory = new DjThossi\ShipcloudSdk\Factory($sandboxApiKey);

// List all webhooks
$result = $shipcloudFactory->getWebhooksApi()->all();

// Create your first webhook
/*
$result = $shipcloudFactory->getWebhooksApi()->create([
    "url" => "https://example.com/webhook",
    "event_types" => [
        "shipment.tracking.delayed",
        "shipment.tracking.delivered",
    ],
]);
//*/

// List a single webhook
// $result = $shipcloudFactory->getWebhooksApi()->find($result['id']);

// remove a single webhook
// $result = $shipcloudFactory->getWebhooksApi()->remove($result['id']);

/* @noinspection ForgottenDebugOutputInspection */
var_dump($result);
