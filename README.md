
# Install jenkins
docker pull jenkins/jenkins:lts-jdk11
docker run -d -v jenkins_home:/var/jenkins_home -p 8080:8080 -p 50000:50000 jenkins/jenkins:lts-jdk11

# Install nginx webserver
docker pull nginx:1.20.0
docker run -d --name nginx 
    -p 8088:80 
    -v $PWD/src:/usr/share/nginx/html 
    -v $PWD/nginx/nginx.conf:/etc/nginx/nginx.conf 
    -v $PWD/nginx/default.conf:/etc/nginx/conf.d/default.conf  
nginx:1.20.0

# Install workspace
docker pull php:8-fpm-alpine
docker run -d --name fpm 
    -p 9000:9000 
    -v $PWD/src:/var/www/html php:8-fpm-alpine

# Intall mysql
docker pull mysql:8.0.26
docker run --name some-mysql -p 3306:3306 -e MYSQL_ROOT_PASSWORD=root -e MYSQL_DATABASE=resumo_db -e MYSQL_USER=resumo -e MYSQL_PASSWORD=123 -v $PWD/mysql/my.cnf:/etc/mysql/my.cnf -d mysql:8.0.26
docker exec -it some-mysql bash

# Install Laravel ( inside container workspace /var/www/html)
docker exec -it [workspace] sh
git clone https://github.com/laravel/laravel.git . \
cp .env.example .env \ 
composer install
php artisan key:generate \

# Remove
docker rm -f workspace mysql nginx
docker network rm enviroments_backend
docker volume rm enviroments_dbdata
docker image rm enviroments_mysql enviroments_nginx enviroments_workspace

git config user.email "tienpd@leon-system.com"
git config user.name "Tien Pham"

# Restart


