#!/bin/bash

set -e

echo "======================================"
echo " Northenbridge CTF VM Provisioning"
echo "======================================"

echo "[1/6] Updating packages..."
apt-get update


echo "[2/6] Installing Apache, PHP and SQLite..."
apt-get install -y \
    apache2 \
    php \
    libapache2-mod-php \
    php-sqlite3 \
    sqlite3


echo "[3/6] Configuring Apache..."

cat > /etc/apache2/sites-available/northenbridge.conf <<'EOF'
<VirtualHost *:80>

    ServerName northenbridge.local

    DocumentRoot /var/www/northenbridge

    <Directory /var/www/northenbridge>
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/northenbridge_error.log
    CustomLog ${APACHE_LOG_DIR}/northenbridge_access.log combined

</VirtualHost>
EOF


a2dissite 000-default.conf
a2ensite northenbridge.conf

systemctl enable apache2
systemctl restart apache2


echo "[4/6] Creating database directory..."

mkdir -p /var/www/northenbridge/database


echo "[5/6] Creating SQLite database..."

if [ -f /vagrant/seed.sql ]; then

    echo "Using seed.sql..."

    sqlite3 /var/www/northenbridge/database/college.db \
        < /vagrant/seed.sql

else

    echo "seed.sql not found."

fi


echo "[6/6] Setting permissions..."

chown -R www-data:www-data /var/www/northenbridge/database

chmod 775 /var/www/northenbridge/database
chmod 664 /var/www/northenbridge/database/college.db


echo "======================================"
echo " Provisioning complete!"
echo "======================================"