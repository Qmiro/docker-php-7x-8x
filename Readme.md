# Docker with PHP 7.x. or PHP 8.x

This repository is intended to make it easier to create a development environment with php version 7 or 8

## What's in the environment:

- [Nginx](https://www.nginx.com/)
- [PhpFpm](https://php.net/)
- [Apache2](https://httpd.apache.org/)
- [MySQL](https://www.mysql.com/)
- [MariaDB](https://mariadb.com/)
- [PhpMyAdmin](https://www.phpmyadmin.net/)
- [PgAdmin](https://www.pgadmin.org/)
- [PostgreSQL](https://www.postgresql.org/)
- [Redis](https://redis.io/)

## Prerequisites:

- [Install Docker](https://docs.docker.com/install/)
- [Install Docker Compose](https://docs.docker.com/compose/install/)

## How to use:

- Clone the repository
- Enter the repository folder
- Run the `docker-compose up` command
  - if you want to run in background mode, run the command `docker-compose up -d`
- Access the address `http://localhost:8080` to access phpmyadmin
  - user access
    - user: mysql
    - password: mysql
    - host: mysql
  - root access
    - user: root
    - password: root
    - host: mysql
- Access the address `http://localhost:8081` to access pgadmin
  - user: admin@localhost.com
  - password: admin
- Access the address `http://localhost` to access the project

## Persistent data:

- mysql data: `./docker/mysql/dbdata`
- postgresql data: `./docker/postgresql/dbdata`
- redis data: `./docker/redis`

## PHP support available:

We set the **PHP** version we want to use in the **docker-compose.yml** file by setting the specific directory on the **php** website that we want to use when building Docker containers. **php.ini** configuration files are also added to selected directories, in which we can define local setting values ​​used by **PHP** in our projects.

| PHP version   	       | directory | version support  	                                                       
|-----------------|---------------------------------------------------------------------------|-----|
| `7.0.33` 	     | 	php7033                  | No |
| `7.1.30` 	     | 	php7130                  | No |
| `7.2.34`	 | 	php7234 | Yes |
| `7.3.33`	     | 	php7333                                          | Yes |
| `7.4.33`	     | 	php7433 | Yes |
| `8.0.25`| php8025 | Yes |
| `8.1.29`| php8129 | Yes |
| `8.2.21`| php8221 | Yes |
| `8.3.9`| php839 | Yes |
| `8.4.18`| php8418 | Yes |
| `8.5.3`| php853 | Yes |

## Comments:

The project starts the services of `nginx`, `php`, `mysql`, `postgresql`, `phpmyadmin`, `pgadmin`
and `redis` by default, if you want to use `apache2`, `mariadb` you need to comment the services
that are being used and enable the services you want to use on the
`docker-compose.yml` file.

## License:

[MIT](https://opensource.org/licenses/MIT)
