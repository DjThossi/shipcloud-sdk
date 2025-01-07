.DEFAULT_GOAL:=help

.PHONY: help
help:
	@grep -E '^[0-9a-zA-Z_-]+:.*?## .*$$' Makefile | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'

.PHONY: setup
setup: remove-composer-lock php8.1-composer-update ## Setup project and dependencies

.PHONY: remove-composer-lock
remove-composer-lock: ## Setup project and dependencies
	rm -f composer.lock | true

.PHONY: all-test-fast
all-test-fast: php8.1-composer-install php8.1-test-fast php8.2-composer-install php8.2-test-fast php8.3-composer-install php8.3-test-fast phpLatest-composer-install phpLatest-test-fast ## Setup project and dependencies


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