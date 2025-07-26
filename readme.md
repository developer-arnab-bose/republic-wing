# Project Republic Wing

sudo apt install apache2 -y

apache2.conf
<Directory /var/www/republicwing>
        Options FollowSymLinks
        AllowOverride All
        Require all granted
</Directory>

ports.conf
Listen 101

sites-enabled/republicwing.conf
<VirtualHost *:80>
    ServerName republicwing.com
    ServerAlias www.republicwing.com

    DocumentRoot /var/www/republicwing

    <Directory /var/www/republicwing>
        Options FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>

    # Redirect ALL to https://www.republicwing.com
    RewriteEngine On
    RewriteCond %{HTTPS} off [OR]
    RewriteCond %{HTTP_HOST} !^www\.republicwing\.com$ [NC]
    RewriteRule ^ https://www.republicwing.com%{REQUEST_URI} [L,R=301]
</VirtualHost>
sudo a2ensite republicwing.com

sudo systemctl restart apache2
sudo apt install libapache2-mod-php mariadb-server mariadb-client -y
sudo systemctl restart apache2

php -v (give the version here 7.4.33)

sudo apt install php7.4-mysql php7.4-curl phpmyadmin -y
sudo systemctl restart apache2

apache2.conf
end of the line
Include /etc/phpmyadmin/apache.conf (This will run /phpmyadmin folder. No need to write it)

sudo mariadb
ALTER USER 'root'@'localhost' IDENTIFIED BY 'secure123';
FLUSH PRIVILEGES;
EXIT;

sudo systemctl restart mariadb

sites-enabled/phpmyadminin8080.conf (new name)
<VirtualHost *:8080>
    ServerAdmin webmaster@localhost
    DocumentRoot /usr/share/phpmyadmin

    <Directory /usr/share/phpmyadmin>
        Options FollowSymLinks
        DirectoryIndex index.php
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/phpmyadmin_error.log
    CustomLog ${APACHE_LOG_DIR}/phpmyadmin_access.log combined
</VirtualHost>
sudo a2ensite phpmyadminin8080.com

ports.conf
Listen 8080

otherports wont work beacasue 8 series is for webservers

blocking /phpmyadmin
sudo a2disconf phpmyadmin.conf
sudo systemctl restart apache2

systemctl restart apache2

add in 000-default.conf
ServerAlias *.republicwing.com

sudo a2dissite 000-default.conf
sudo systemctl reload apache2 (Disable a apache configaration dont diasble the 000-default.conf) 

sudo a2enmod ssl rewrite headers
sudo systemctl restart apache2

while true; do
  rsync -avz --delete ./ website:~/billing.republicwing.com/
  sleep 1
done
(automatic sync every secind)

write in anyfolder using php or other backend
sudo chown -R www-data:www-data /folder name (or it does not have permission to write there)

ln -s "/home/arnab/billingwebsite" "/var/www/billingwebsite" symlink to link the folder wit home folder for using scp or rsync