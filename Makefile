# --------------------------------------------------------------------
# PROJECT
# --------------------------------------------------------------------

project: composer-install symfony-clear-cache docker-start console-doctrine-database-create console-doctrine-schema-update fixtures

project-start: composer-install symfony-clear-cache docker-start

project-stop: docker-stop

project-restart: project-stop project-start

project-rebuild: composer-install symfony-clear-cache docker-rebuild

# --------------------------------------------------------------------
# DOCKER
# --------------------------------------------------------------------

docker-start:
	 docker-compose -f docker-compose.yml up -d --build

docker-stop:
	 docker-compose -f docker-compose.yml stop

docker-rebuild: docker-clean-containers docker-start

docker-clean-containers: docker-stop
	 docker-compose -f docker-compose.yml rm  --force

docker-clean-images:
	 docker rmi $$(docker images -q)

# --------------------------------------------------------------------
# SYMFONY
# --------------------------------------------------------------------

symfony-clear-cache:
	 rm -rf ./var/cache/*
	 rm -rf ./var/log/*
	 docker exec -ti php_apache_symfony php bin/console cache:clear --no-warmup

# --------------------------------------------------------------------
# COMPOSER
# --------------------------------------------------------------------

composer-install:
	 rm -rf ./vendor/*
	 composer install --ignore-platform-reqs

composer:
	docker exec -ti php_apache_symfony bash

# --------------------------------------------------------------------
# CONSOLE
# --------------------------------------------------------------------

console-doctrine-database-create:
	 docker exec -ti php_apache_symfony php bin/console doctrine:database:create

console-doctrine-database-drop:
	 docker exec -ti php_apache_symfony php bin/console doctrine:database:drop --force

console-doctrine-schema-update:
	 docker exec -ti php_apache_symfony php bin/console doctrine:schema:update --force

# --------------------------------------------------------------------
# QUALITY
# --------------------------------------------------------------------

phpStan:
	 docker exec -ti php_apache_symfony vendor/bin/phpstan analyse -l 5 src

phpPsalm:
	 docker exec -ti php_apache_symfony vendor/bin/psalm

phpCs:
	 docker exec -ti php_apache_symfony ./vendor/bin/phpcs

phpCbf:
	 docker exec -ti php_apache_symfony vendor/bin/phpcbf


# --------------------------------------------------------------------
# NPM
# --------------------------------------------------------------------
npm:
	npm run watch

# --------------------------------------------------------------------
# Fixtures
# --------------------------------------------------------------------

fixtures:
	 docker exec -ti php_apache_symfony php bin/console doctrine:fixtures:load -q
