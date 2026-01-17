EXEC_SERVER = docker compose exec php

build:
	docker-compose build

up:
	docker-compose up -d --force-recreate

install: build up install-assets schema-update

start:
	docker-compose up -d

stop:
	docker container stop $$(docker container ps -qa)

delete:
	docker container rm server database phpmyadmin mailer

enter:
	$(EXEC_SERVER) bash

list:
	docker-compose ps

clear-cache:
	$(EXEC_SERVER) php bin/console c:c

clear-doctrine:
	$(EXEC_SERVER) php bin/console doctrine:cache:clear-metadata
	$(EXEC_SERVER) php bin/console doctrine:cache:clear-query
	$(EXEC_SERVER) php bin/console doctrine:cache:clear-result

schema-update:
	$(EXEC_SERVER) php bin/console doctrine:schema:update --force

install-assets:
	$(EXEC_SERVER) php bin/console assets:install --symlink public

webpack-dev:
	$(EXEC_SERVER) npm run dev

webpack-server:
	$(EXEC_SERVER) npm run watch