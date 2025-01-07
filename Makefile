.DEFAULT_GOAL:=help
DOCKER_COMPOSE_SERVICE_NAME=php8.1

.PHONY: help
help:
	@grep -E '^[\.0-9a-zA-Z_-]+:.*?## .*$$' Makefile | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'

.PHONY: setup
setup: remove-composer-lock php8.1-composer-update ## Setup project and dependencies

.PHONY: remove-composer-lock
remove-composer-lock: ## Setup project and dependencies
	rm -f composer.lock | true

.PHONY: all-test-fast
all-test-fast: remove-composer-lock php8.1-composer-update php8.1-test-fast php8.2-composer-update php8.2-test-fast php8.3-composer-update php8.3-test-fast phpLatest-composer-update phpLatest-test-fast ## Runs composer-update and test-fast for each configured php version

.PHONY: php-cs-fix
php-cs-fix: ## Run Composer install with PHP version 8.1
	docker compose run --rm php8.1 -f vendor/bin/php-cs-fixer fix


#PHP 8.1 Section
.PHONY: php8.1-composer-install
php8.1-composer-install: ## Run Composer install with PHP version 8.1
	docker compose run --rm php8.1 sh -c "composer install"

.PHONY: php8.1-composer-update
php8.1-composer-update: ## Run Composer update with PHP version 8.1
	docker compose run --rm php8.1 sh -c "composer update"

.PHONY: php8.1-test-fast
php8.1-test-fast: ## Run phpunit without coverage with PHP version 8.1
	docker compose run --rm php8.1 sh -c "vendor/bin/phpunit --no-coverage"

.PHONY: php8.1-test
php8.1-test: ## Run phpunit with coverage with PHP version 8.1
	docker compose run --rm php8.1 sh -c "vendor/bin/phpunit"


#PHP 8.2 Section
.PHONY: php8.2-composer-install
php8.2-composer-install: ## Run Composer install with PHP version 8.2
	docker compose run --rm php8.2 sh -c "composer install"

.PHONY: php8.2-composer-update
php8.2-composer-update: ## Run Composer update with PHP version 8.2
	docker compose run --rm php8.2 sh -c "composer update"

.PHONY: php8.2-test-fast
php8.2-test-fast: ## Run phpunit without coverage with PHP version 8.2
	docker compose run --rm php8.2 sh -c "vendor/bin/phpunit --no-coverage"

.PHONY: php8.2-test
php8.2-test: ## Run phpunit with coverage with PHP version 8.2
	docker compose run --rm php8.2 sh -c "vendor/bin/phpunit"


#PHP 8.3 Section
.PHONY: php8.3-composer-install
php8.3-composer-install: ## Run Composer install with PHP version 8.3
	docker compose run --rm php8.3 sh -c "composer install"

.PHONY: php8.3-composer-update
php8.3-composer-update: ## Run Composer update with PHP version 8.3
	docker compose run --rm php8.3 sh -c "composer update"

.PHONY: php8.3-test-fast
php8.3-test-fast: ## Run phpunit without coverage with PHP version 8.3
	docker compose run --rm php8.3 sh -c "vendor/bin/phpunit --no-coverage"

.PHONY: php8.3-test
php8.3-test: ## Run phpunit with coverage with PHP version 8.3
	docker compose run --rm php8.3 sh -c "vendor/bin/phpunit"


#PHP Latest Section. Latest means latest available on https://github.com/sineverba/php8xc
.PHONY: phpLatest-composer-install
phpLatest-composer-install: ## Run Composer install with PHP version Latest
	docker compose run --rm php sh -c "composer install"

.PHONY: phpLatest-composer-update
phpLatest-composer-update: ## Run Composer update with PHP version Latest
	docker compose run --rm php sh -c "composer update"

.PHONY: phpLatest-test-fast
phpLatest-test-fast: ## Run phpunit without coverage with PHP version Latest
	docker compose run --rm php sh -c "vendor/bin/phpunit --no-coverage"

.PHONY: phpLatest-test
phpLatest-test: ## Run phpunit with coverage with PHP version Latest
	docker compose run --rm php sh -c "vendor/bin/phpunit"


#Examples
DOCKER_COMPOSE_SERVICE_NAME=php8.1

.PHONY: composer-install
composer-install: ## Run Composer install with the PHP version which is defined in DOCKER_COMPOSE_SERVICE_NAME
	docker compose run --rm php sh -c "composer install"

.PHONY: composer-update
composer-update: ## Run Composer update with the PHP version which is defined in DOCKER_COMPOSE_SERVICE_NAME
	docker compose run --rm php sh -c "composer update"

.PHONY: test-fast
test-fast: ## Run phpunit without coverage with the PHP version which is defined in DOCKER_COMPOSE_SERVICE_NAME
	docker compose run --rm php sh -c "vendor/bin/phpunit --no-coverage"

.PHONY: test
test: ## Run phpunit with coverage with the PHP version which is defined in DOCKER_COMPOSE_SERVICE_NAME
	docker compose run --rm php sh -c "vendor/bin/phpunit"

.PHONY: examples-addressesApi
examples-addressesApi: ## Runs the example code for the addresses API in the PHP version which is defined in DOCKER_COMPOSE_SERVICE_NAME
	docker compose run --rm ${DOCKER_COMPOSE_SERVICE_NAME} -f examples/addressesApi.php

.PHONY: examples-carriersApi
examples-carriersApi: ## Runs the example code for the carriers API in the PHP version which is defined in DOCKER_COMPOSE_SERVICE_NAME
	docker compose run --rm ${DOCKER_COMPOSE_SERVICE_NAME} -f examples/carriersApi.php

.PHONY: examples-defaultReturnsAddressApi
examples-defaultReturnsAddressApi: ## Runs the example code for the defaultReturnsAddress API in the PHP version which is defined in DOCKER_COMPOSE_SERVICE_NAME
	docker compose run --rm ${DOCKER_COMPOSE_SERVICE_NAME} -f examples/defaultReturnsAddressApi.php

.PHONY: examples-defaultShippingAddressApi
examples-defaultShippingAddressApi: ## Runs the example code for the defaultShippingAddress API in the PHP version which is defined in DOCKER_COMPOSE_SERVICE_NAME
	docker compose run --rm ${DOCKER_COMPOSE_SERVICE_NAME} -f examples/defaultShippingAddressApi.php

.PHONY: examples-invoiceAddressApi
examples-invoiceAddressApi: ## Runs the example code for the invoiceAddress API in the PHP version which is defined in DOCKER_COMPOSE_SERVICE_NAME
	docker compose run --rm ${DOCKER_COMPOSE_SERVICE_NAME} -f examples/invoiceAddressApi.php

.PHONY: examples-meApi
examples-meApi: ## Runs the example code for the me API in the PHP version which is defined in DOCKER_COMPOSE_SERVICE_NAME
	docker compose run --rm ${DOCKER_COMPOSE_SERVICE_NAME} -f examples/meApi.php

.PHONY: examples-pickupRequestsApi
examples-pickupRequestsApi: ## Runs the example code for the pickupRequests API in the PHP version which is defined in DOCKER_COMPOSE_SERVICE_NAME
	docker compose run --rm ${DOCKER_COMPOSE_SERVICE_NAME} -f examples/pickupRequestsApi.php

.PHONY: examples-shipmentQuotesApi
examples-shipmentQuotesApi: ## Runs the example code for the shipmentQuotes API in the PHP version which is defined in DOCKER_COMPOSE_SERVICE_NAME
	docker compose run --rm ${DOCKER_COMPOSE_SERVICE_NAME} -f examples/shipmentQuotesApi.php

.PHONY: examples-shipmentsApi
examples-shipmentsApi: ## Runs the example code for the shipments API in the PHP version which is defined in DOCKER_COMPOSE_SERVICE_NAME
	docker compose run --rm ${DOCKER_COMPOSE_SERVICE_NAME} -f examples/shipmentsApi.php

.PHONY: examples-trackersApi
examples-trackersApi: ## Runs the example code for the trackers API in the PHP version which is defined in DOCKER_COMPOSE_SERVICE_NAME
	docker compose run --rm ${DOCKER_COMPOSE_SERVICE_NAME} -f examples/trackersApi.php

.PHONY: examples-webhooksApi
examples-webhooksApi: ## Runs the example code for the webhooks API in the PHP version which is defined in DOCKER_COMPOSE_SERVICE_NAME
	docker compose run --rm ${DOCKER_COMPOSE_SERVICE_NAME} -f examples/webhooksApi.php
