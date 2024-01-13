#!/bin/sh
set -e
echo "Deploying application ..."
# Enter maintenance mode
 # Update codebase

    # Start SSH agent
     eval $(ssh-agent)

# Add SSH key with passphrase to the agent
    git pull origin main
    # Install dependencies based on lock file
    composer install --no-interaction --prefer-dist --optimize-autoloader --ignore-platform-reqs


    (php artisan down --message 'The app is being (quickly!) updated. Please try again in a minute.') || true


    # Migrate database
   php artisan migrate --force
    # Note: If you're using queue workers, this is the place to restart them.
    # ...
    # Clear cache
   php artisan cache:clear
   php artisan optimize:clear
# Exit maintenance mode
php artisan up
echo "Application deployed to production!"
