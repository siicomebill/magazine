init:
	git submodule init
	git submodule update
	make env
	make start

start:
	(cd bill-environment && docker-compose up -d nginx postgres)

restart:
	(cd bill-environment && docker-compose restart nginx postgres)

stop:
	(cd bill-environment && docker-compose stop)

destroy:
	(cd bill-environment && docker-compose down)

build:
	(cd bill-environment && docker-compose build nginx postgres)
	make install


rebuild:
	(cd bill-environment && docker-compose build --no-cache nginx postgres)

env:
	cp .env.example .env
	cp laradock.env bill-environment/.env

install:
	make start
	(cd bill-environment && docker-compose exec workspace composer install)
	(cd bill-environment && docker-compose exec workspace npm i)
	make stop