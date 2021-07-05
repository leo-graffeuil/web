DOCKER_COMPOSE = docker-compose
DOCKER_COMPOSE_EXEC = $(DOCKER_COMPOSE) exec -T
EXEC_WP = $(DOCKER_COMPOSE_EXEC) wordpress
YARN = $(DOCKER_COMPOSE_EXEC) wordpress yarn

start:
	docker-compose up -d

stop:
	docker-compose stop

build:
	docker-compose build

watch_sass:
	$(YARN) watch_sass

build_sass:
	$(YARN) build_sass

vendor:
	$(DOCKER_COMPOSE_EXEC) -w /var/www/html/wp-content/plugins/wp2static wordpress composer install
	$(DOCKER_COMPOSE_EXEC) -w /var/www/html/wp-content/plugins/wp2static-addon-netlify wordpress composer install
	$(YARN) install --force

healthcheck:
	docker-compose run --rm healthcheck

down:
	docker-compose down

install: build start vendor build_sass healthcheck


