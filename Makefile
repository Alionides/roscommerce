.PHONY: help ps build build-prod start fresh fresh-prod stop restart destroy \
	cache cache-clear migrate migrate migrate-fresh tests tests-html clear

APP_NAME=Rosman
CONTAINER_PHP=api
CONTAINER_REDIS=redis
CONTAINER_DATABASE=database
artisan?=list
help: ## Print help.
	@awk 'BEGIN {FS = ":.*##"; printf "\nUsage:\n  make \033[36m<target>\033[0m\n\nTargets:\n"} /^[a-zA-Z_-]+:.*?##/ { printf "  \033[36m%-10s\033[0m %s\n", $$1, $$2 }' $(MAKEFILE_LIST)

ps: ## Show containers.
	@docker compose ps

clear: ## Clear all data about docker
# 	@docker stop $$(docker ps -aq)
# 	@docker rmi -f $(docker images -aq)
# 	@docker system prune
# 	@docker volume prune

build: ## Build all containers for DEV
	@docker build --no-cache . -f ./Dockerfile

build-prod: ## Build all containers for PROD
	@docker build --no-cache . -f ./Dockerfile

start: ## Start all containers
	@docker compose up --force-recreate -d

fresh:  ## Destroy & recreate all uing dev containers.
	make stop
	make destroy
	make build
	make start
	make migrate-fresh

fresh-prod: ## Destroy & recreate all using prod containers.
	make stop
	make destroy
	make build-prod
	make start
	make migrate-fresh

stop: ## Stop all containers
	@docker compose stop

restart: stop start ## Restart all containers

destroy: stop ## Destroy all containers

ssh: ## SSH into PHP container
	docker exec -it ${APP_NAME}_${CONTAINER_PHP} sh

install: ## Run composer install
	docker exec ${APP_NAME}_${CONTAINER_PHP} composer install

php:
	docker exec ${APP_NAME}_${CONTAINER_PHP} php artisan

migrate: ## Run migration files
	docker exec ${APP_NAME}_${CONTAINER_PHP} php artisan migrate

migrate-fresh: ## Clear database and run all migrations
	docker exec ${APP_NAME}_${CONTAINER_PHP} php artisan route:clear
	docker exec ${APP_NAME}_${CONTAINER_PHP} php artisan config:clear
	docker exec ${APP_NAME}_${CONTAINER_PHP} php artisan cache:clear
	docker exec ${APP_NAME}_${CONTAINER_PHP} php artisan storage:link
	docker exec ${APP_NAME}_${CONTAINER_PHP} php artisan migrate:fresh --seed --force

tests: ## Run all tests
	docker exec ${APP_NAME}_${CONTAINER_PHP} ./vendor/bin/phpunit

tests-html: ## Run tests and generate coverage. Report found in reports/index.html
	docker exec ${APP_NAME}_${CONTAINER_PHP} php -d zend_extension=xdebug.so -d xdebug.mode=coverage ./vendor/bin/phpunit --coverage-html reports
