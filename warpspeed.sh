# warpspeed.sh
# Commands here will be run each time a pull or push deploy is successfully run.

# Install dependencies.
composer install

# Run the db migrations.
php artisan migrate --force
