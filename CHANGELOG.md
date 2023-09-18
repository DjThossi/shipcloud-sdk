# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Added
### Fixed
### Changed
### Removed


## [3.0.0] - 2023-09-16


### Fixed
- Prevent Yoda style comparisons 
- CS fixes for Domain object forgotten in 2.0.0
### Changed
- Change return type Response::getBodyAsObject() from \stdClass to object
- Change return type ShipmentCreateResponse::getBodyAsObject() from \stdClass to ShipmentCreate
### Removed
- ShipmentCreateResponse::getShipment()


## [2.0.0] - 2023-09-16

### Added
- ShipmentsCreateResponse: It provides validated Domain object for individual use 
### Fixed
- Spelling mistakes in README.md
- Wrong indention in Symfony block in README.md
### Changed
- Return Type of ShipmentsApi::create() changed from Response to ShipmentsCreateResponse
- In docker-compose.yml the name for latest php changed from phpLatest to php


## [1.0.3] - 2023-08-27

### Added
- This file
- Extend description on how to contribute

### Fixed
- Add forgotten Endpoints to list of supported in README.md


## [1.0.2] - 2023-08-27

### Added
- Added "Usage in Symfony" to README.md


## [1.0.1] - 2023-08-27

### Added
- Added MIT license information to composer.json

### Fixed
- Spelling mistake in README.md


## [1.0.0] - 2023-08-27

### Added
- Add main Logic to support all (except rates) shipcloud API endpoints

[unreleased]: https://github.com/DjThossi/shipcloud-sdk/compare/3.0.0...HEAD
[2.0.0]: https://github.com/DjThossi/shipcloud-sdk/compare/2.0.0...3.0.0
[2.0.0]: https://github.com/DjThossi/shipcloud-sdk/compare/1.0.3...2.0.0
[1.0.3]: https://github.com/DjThossi/shipcloud-sdk/compare/1.0.2...1.0.3
[1.0.2]: https://github.com/DjThossi/shipcloud-sdk/compare/1.0.1...1.0.2
[1.0.1]: https://github.com/DjThossi/shipcloud-sdk/compare/1.0.0...1.0.1
[1.0.0]: https://github.com/DjThossi/shipcloud-sdk/releases/tag/1.0.0
