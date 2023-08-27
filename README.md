# shipcloud Sdk
[![Code Climate](https://api.codeclimate.com/v1/badges/cd0fed66f28952e53039/maintainability)](https://codeclimate.com/github/DjThossi/shipcloud-sdk/maintainability)

This is a PHP library for interacting with shipclouds API.

This library is supporting the following entities in shipcloud's version v1

- Addresses
- Carriers
- Default return address
- Default shipping address
- Invoice address
- Me
- Pickup request
- Shipment quote
- Shipments
- Trackers
- Webhooks

The Endpoint `Rates` is not part of this library as it is deprecated and will be removed in later versions. Use `Shipment Quuotes` instead.

This library is made for PHP projects featuring PHP version 8.1+.
If you are looking for a library for PHP version between 5.4 and 7.4 try https://github.com/comyo-media/shipcloud-php

## How to install
This lib can be installed via composer
```bash
composer require djthossi/shipcloud-sdk
```

## Examples
You'll find examples for most Apis in the `~/examples` folder. Have fun with it.

## Usage in Symfony
You want to use this library inside a symfony project including auto-wiring? After installing simply add this code to your `config/services.yaml`

Add this to the parameter section of your `services.yaml`
```yaml
parameters:
  # shipcloud parameters
  app.SHIPCLOUD_API_KEY: "%env(SHIPCLOUD_API_KEY)%"
```

Add this to the services section of your `services.yaml`
```yaml
services:
  # shipcloud services
  DjThossi\ShipcloudSdk\Http\:
        resource: '../vendor/djthossi/shipcloud-sdk/src/Http'
        bind:
            $apiKey: '%app.SHIPCLOUD_API_KEY%'

    DjThossi\ShipcloudSdk\Api\:
        resource: '../vendor/djthossi/shipcloud-sdk/src/Api'
        arguments:
            $client: '@DjThossi\ShipcloudSdk\Http\Client'
```

Afterwards add the `SHIPCLOUD_API_KEY` including your personal API key to your `.env.local` file like this.
```apacheconf
#shipcloud parameters
SHIPCLOUD_API_KEY=PUT_YOUR_KEY_HERE
```

Now you can use each API directly inside your business logic. Symfony will take care of the auto-wiring for you.
```php
<?php
declare(strict_types=1);
namespace App\Controller;

use DjThossi\ShipcloudSdk\Api\MeApi;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'homepage', methods: ['GET'])]
    public function index(MeApi $meApi): Response {
        var_dump($meApi->show()->getBodyAsArray());

        //...
    }
}
```

## Contribute to this repo
For more details click [here](CONTRIBUTING.md)


