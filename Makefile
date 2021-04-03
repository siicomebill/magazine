init:
	git submodule init
	git submodule update
	
	make build
	make start
	make install
	make setup

start:
	(cd environment && docker-compose up -d nginx postgres)

restart:
	(cd environment && docker-compose restart nginx postgres)

stop:
	(cd environment && docker-compose stop)

destroy:
	(cd environment && docker-compose down)

build:
	(cd environment && docker-compose build nginx postgres)

rebuild:
	(cd environment && docker-compose build --no-cache workspace nginx postgres)

recreate:
	(cd environment && docker-compose up -d --force-recreate workspace nginx postgres)

env:
	cp .env.example .env
	cp laradock.env environment/.env

install:
	(cd environment && docker-compose exec workspace composer install)
	(cd environment && docker-compose exec workspace npm i)

setup:
	(cd environment && docker-compose exec php-fpm php artisan setup:all)
	(cd environment && docker-compose exec workspace npm run dev)