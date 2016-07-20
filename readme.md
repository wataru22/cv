# CV generator

A personal project to create and maintain CVs using Laravel 5.

## Setup and install

After placing files in directory, run composer update from the project directory.

```
composer update
```

Then create a `.env` file (you can rename `.sample_env`) with following settings and edit to match your system:
```
APP_ENV=local
APP_KEY=base64:o11uwqB/3uUy74UheBFc9K6YIhAaylBGyLiOFIekk2s=
APP_DEBUG=true
APP_LOG_LEVEL=debug
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cv
DB_USERNAME=homestead
DB_PASSWORD=secret

CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_DRIVER=sync

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

# mail settings
MAIL_DRIVER=smtp
MAIL_HOST=mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=mailtrapusername
MAIL_PASSWORD=mailtrappassword
MAIL_ENCRYPTION=null
MAIL_CONTACT=your@email.com

```

Then finally run the database migrations to create the database tables:
```
php artisan migrate
```