# Project Republic Wing

sudo apt install apache2

apache2.conf
<Directory /var/www/republicwing>
        Options FollowSymLinks
        AllowOverride All
        Require all granted
</Directory>

ports.conf
Listen 101

sites-enabled/000-default.conf
DocumentRoot /var/www/republicwing

