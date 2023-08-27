# shipcloud Sdk
[![Code Climate](https://api.codeclimate.com/v1/badges/cd0fed66f28952e53039/maintainability)](https://codeclimate.com/github/DjThossi/shipcloud-sdk/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/cd0fed66f28952e53039/test_coverage)](https://codeclimate.com/github/DjThossi/shipcloud-sdk/test_coverage)

This is a PHP library for interacting with shipclouds API.

This library is supporting the following entities in shipcloud's version v1

- Addresses
- Carriers
- Default return address
- Default shipping address
- Invoice address
- me
- Pickup request
- Shipment quote
- Shipments

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

## Contribute
You want to contribute? I'm happy to get some help with this repository. Simply get in touch with me via github or open a pull request.
