#!/usr/bin/env bash

sudo chown -R $USER $HOME/.composer

composer install -d app

ln -sf app/.env .env

sudo find . -type d -exec chmod 755 {} \;

sudo find . -type f -exec chmod 644 {} \;

sudo chown -R $USER:www-data app

docker-compose up --force-recreate -d
