# Installing DCIMStack

* Import dcimstack.sql from the SQL folder into your mySQL DB
* Update config/db.php with the correct mySQL user, password and DB details
* Setup the include path in config/db.php as well
* Open install.php in your browser and follow the instructions from there



` <VirtualHost *:80>
  DocumentRoot /opt/dcimstack/
  ServerName  domain.com
  AllowEncodedSlashes On
  <Directory "/opt/dcimstack/">
    Require all granted
    AllowOverride All
    Options FollowSymLinks MultiViews
  </Directory>
</VirtualHost> `
