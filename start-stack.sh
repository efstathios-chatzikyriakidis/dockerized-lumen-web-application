#!/usr/bin/env bash

chown -R $USER $HOME/.composer

composer install -d app

ln -sf app/.env .env

find . -type d -exec chmod 755 {} \;

find . -type f -exec chmod 644 {} \;

sudo chgrp -R www-data app

find app/storage -type d -exec chmod 775 {} \;

find app/storage -type f -exec chmod 664 {} \;

docker-compose up --force-recreate -d
