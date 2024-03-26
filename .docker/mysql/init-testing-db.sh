. /usr/local/bin/docker-entrypoint.sh

# docker-entrypoint.sh expects the following variables to be set
SOCKET=/var/run/mysqld/mysqld.sock

mysql_note "Creating 'testing' database"
docker_process_sql --database=mysql <<<"CREATE DATABASE IF NOT EXISTS testing;"

mysql_note "Creating 'testing' user"
docker_process_sql --database=mysql <<<"CREATE USER 'testing'@'%' IDENTIFIED BY 'testing';"

mysql_note "Granting privileges to 'testing' and '${MYSQL_USER}' to testing database"
docker_process_sql --database=mysql <<<"GRANT ALL PRIVILEGES ON testing.* TO 'testing'@'%';"
docker_process_sql --database=mysql <<<"GRANT ALL PRIVILEGES ON testing.* TO '${MYSQL_USER}'@'%';"
