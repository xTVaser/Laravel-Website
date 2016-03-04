#!/bin/bash
# For Fedora. If you don't run Fedora, get out you casual

sudo dnf install composer php-mysqlnd
docker run -d -p 3306:3306 -e MYSQL_DATABASE=ears -e MYSQL_ROOT_PASSWORD=password mysql
