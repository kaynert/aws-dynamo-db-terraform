FROM --platform=linux/amd64 php:8.2-apache
#WORKDIR /var/www/html
COPY . /var/www/html

EXPOSE 80
CMD [ "apachectl","-D" ,"FOREGROUND" ]
