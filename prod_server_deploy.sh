#!/bin/sh
set -e
echo "Deploying application ..."
# Enter maintenance mode
 # Update codebase
    git checkout main
    git pull origin main
    # Install dependencies based on lock file
    composer install --no-interaction --prefer-dist --optimize-autoloader --ignore-platform-reqs


    #(php artisan down --message 'The app is being (quickly!) updated. Please try again in a minute.') || true


    # Migrate database
   # php artisan migrate --force
    # Note: If you're using queue workers, this is the place to restart them.
    # ...
    # Clear cache
   # php artisan cache:clear
   # php artisan optimize:clear
    # Reload PHP to update opcache
    echo "" | sudo -S service php8.1-fpm reload
    #Install frontend dependecies
    # npm install
    # #build frontend in production
    # npm run production
# Exit maintenance mode
#php artisan up
echo "Application deployed to production!"
