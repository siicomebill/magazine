start:
	(cd bill-environment && docker-compose up -d nginx postgres)

stop:
	(cd bill-environment && docker-compose stop)

build:
	(cd bill-environment && docker-compose build nginx postgres)