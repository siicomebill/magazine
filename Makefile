init:
	git submodule init
	git submodule update
	cp .env.example .env
	cp laradock.env bill-environment/.env
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
	composer install
	npm i

rebuild:
	(cd bill-environment && docker-compose build --no-cache nginx postgres)