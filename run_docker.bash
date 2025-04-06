docker build -t php-apache-lab .
docker run -p 8080:80 -v $(pwd)/php_labs:/var/www/html php-apache-lab