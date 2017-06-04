#!/usr/bin/env bash

sudo chown -R $USER $HOME/.composer

composer install -d app

ln -sf app/.env .env

sudo find -not -path "./mysql/data*" -type d -exec chmod 755 {} \;

sudo find -not -path "./mysql/data*" -type f -exec chmod 644 {} \;

sudo chgrp -R www-data app

sudo find app/storage -type d -exec chmod 775 {} \;

sudo find app/storage -type f -exec chmod 664 {} \;

docker-compose build --no-cache --force-rm

docker-compose up -d --force-recreate