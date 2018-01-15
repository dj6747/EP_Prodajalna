sudo apt install git
sudo apt install composer
git clone https://github.com/dj6747/EP_Prodajalna.git
cd EP_Prodajalna
sudo apt-get install php7.0-mbstring
sudo apt-get install php7.0-gd
composer update
sudo chmod -R 777 ./storage ./bootstrap
sudo a2enmod rewrite
sudo service apache2 restart
cd /etc/apache2/sites-available 
//kopiraj konfiguracijo v ta dir
sudo nano ep.local.conf 
sudo nano /etc/hosts
127.0.0.1   ep.local
sudo a2ensite ep.local.conf
sudo a2dissite 000-default.conf
sudo service apache2 reload


sudo nano ep.local-ssl.conf
-kopiraj certifikate v /etc/apache2/ssl
sudo a2enmod ssl
sudo a2ensite ep.local-ssl.conf
sudo  service apache2 restart

mysql workbench connect to local db, add db epshop_db, add user
php artisan migrate/db dump import
import certificates to firefox
install chrome - za remote debugging


uporabniška imena, gesla uporabnikov
admin@epshop.si admin123
seller1@epshop.si , seller2@epshop.si, seller3@epshop.si - preklican cert   seller123
mojca.novak@gmail.com mojca123
peter.novak@gmail.com peter123