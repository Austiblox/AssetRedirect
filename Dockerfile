FROM php:apache-buster
ADD /asset/ /var/www/html/
EXPOSE 80
