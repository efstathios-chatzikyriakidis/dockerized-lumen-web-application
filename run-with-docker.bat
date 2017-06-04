CALL composer install -d app

CALL mklink /H .env app\.env

CALL docker-compose build --no-cache --force-rm

CALL docker-compose up --force-recreate -d