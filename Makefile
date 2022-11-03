#!/usr/bin/make

.PHONY: help shell
.PHONY: install
.PHONY: db-fresh env-copy

.PHONY: uup-php build-php up-nginx
.PHONY: up down setup restart upgrade clean

.DEFAULT_GOAL : help
.SHELLFLAGS = -exc
SHELL := /bin/bash

API_DIR := ./

# This will output the help for each task. thanks to https://marmelab.com/blog/2016/02/29/auto-documented-makefile.html
help: ## Show this help
	@printf "\033[33m%s:\033[0m\n" 'Available commands'
	@awk 'BEGIN {FS = ":.*?## "} /^[a-zA-Z0-9_-]+:.*?## / {printf "  \033[32m%-18s\033[0m %s\n", $$1, $$2}' $(MAKEFILE_LIST)

install: install-php

install-php:
	docker-compose run --rm --no-deps -T php-fpm composer install

shell: ## Start shell into chat-php container
	docker-compose exec php-fpm bash

env-copy:
	cp -fa ./.env.example             ./.env
	cp -fa ./api-backend/.env.example ./api-backend/.env
	cp -fa ./frontend/.env.example    ./frontend/.env
	cp -fa ./echo/.env.example        ./echo/.env

up-php: ## Create and start containers
	docker-compose up -d php-fpm

build-php: ## Create and start containers
	docker-compose build php-fpm

up-nginx: ## Create and start containers
	docker-compose up -d nginx

up: ## Create and start containers
	docker-compose up -d

down: ## Stop containers
	docker-compose down

setup: up install ## Create and start containers

restart: down up ## Restart all containers

upgrade: ## Create and start containers
	make build-php
	make install
	make up-php
	make init
	make api-keys

clean: ## Make clean
	docker-compose run --rm --no-deps chat-php sh -c "\
		php ./artisan config:clear; php ./artisan route:clear; php ./artisan view:clear; php ./artisan cache:clear file"
	docker-compose down -v # Stops containers and remove named volumes declared in the `volumes` section


