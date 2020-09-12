init:
	cp laradock.env bill-environment/.env
	make start

start:
	(cd bill-environment && docker-compose up -d nginx postgres)

stop:
	(cd bill-environment && docker-compose stop)

destroy:
	(cd bill-environment && docker-compose down)

build:
	(cd bill-environment && docker-compose build nginx postgres)

rebuild:
	(cd bill-environment && docker-compose build --no-cache nginx postgres)