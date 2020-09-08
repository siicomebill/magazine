# Sii Come Bill - The online magazine 📰

Made with ❤️, ☕, and **[Laravel](https://laravel.com)** by [Mattia Sinisi](https://linkedin.com/in/sinisimattia)

## Bring up the development environment

### Before you begin

The development environment is buil to run on [Docker](https://docker.com) so the only prerequisites you'll need are:

- Docker 👉 [Download & Install](https://docs.docker.com/get-docker/)
- Docker Compose 👉 [Download & Install](https://docs.docker.com/compose/install/)

### Start the essentials

This configuration has **A LOT** of processes and hosts, but to get started you'll only need some of them.

Before doing anything though, copy the pre-configured environment file to the folder.

> cp laradock.env bill-environment/.env

In order to start <u>only what you need to start the application</u> simply run the following command:

> docker-compose up -d nginx postgres

This command will only start the webserver (and the PHP engine) with a *PostgreSQL* database already connected to it.

*P.S.*
Don't worry if the building process is slow,  you'll only have to sit through it for the first time.

### But wait... there's more!

These are not the only processes that you can start, for a full list of what you can do with this Docker configuration visit the official [Laradock website](https://laradock.io).

### Have fun coding!

Thank you for contributing to our project, please follow our [code of conduct](#) in order to keep everything clean and organized!

___
#### Visit the website 👉 [here](#)

