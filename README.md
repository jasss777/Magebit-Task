# Magebit-Test

Requirements:
  - Nginx Webserver // sudo apt install nginx
  - Mysql Server    // sudo apt install mysql-server
  - Install PHP     //sudo apt install php-fpm php-mysql

Configuration: 
  - Configure Nginx settings to allow use PHP  //sudo nano /etc/nginx/sites-available/default
  - Nginx configuration example file is located in Components/NginxSettingExample.txt
  - Create Database and run sql dump. SQL dump file is located in Components/userstable.sql
