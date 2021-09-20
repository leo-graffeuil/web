DOCKER_COMPOSE = docker-compose
DOCKER_COMPOSE_EXEC = $(DOCKER_COMPOSE) exec -T
EXEC_WP = $(DOCKER_COMPOSE_EXEC) wordpress
YARN = $(DOCKER_COMPOSE_EXEC) wordpress yarn
S3CMD = s3cmd -c wordpress/s3cfg --host="cellar-c2.services.clever-cloud.com" --access_key UPV4S93WIRO808BHAGAS --secret_key 5YPY8ZYg1gAGNsvnae6ThzCY6vlxB2usqKemqeoE

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
	$(YARN) install --force

DIR = uploads/
sync_s3_uploads:
	$(S3CMD) sync $(DIR) s3://wp_uploads

s3_public_acl:
	$(S3CMD) setacl s3://wp_uploads/$(DIR) --acl-public --recursive


healthcheck:
	docker-compose run --rm healthcheck

down:
	docker-compose down

install: build start vendor build_sass healthcheck


