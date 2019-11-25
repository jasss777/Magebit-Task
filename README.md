# Test-Task

Requirements:
  - Nginx Webserver // sudo apt install nginx
  - Mysql Server    // sudo apt install mysql-server
  - Install PHP     //sudo apt install php-fpm php-mysql

Configuration: 
  - Configure Nginx settings to allow use PHP  //sudo nano /etc/nginx/sites-available/default
  - Nginx configuration example file is located in Components/NginxSettingExample.txt
  - Create Database and run sql dump. SQL dump file is located in Components/userstable.sql
  - Edit mysql settings in core/init.php (change host,username,password,db to your settings)
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  ToDoList:
  
    1)Remove all alert messages and add them in message block.
    2)Create ajax on login and registration  (do not reload page if user enter wrong data)
    3)Add in user panel profile page, (add birth data field, nickanem field)
    4)Make Responsive CSS
    5)Document code with phpDoc
    

