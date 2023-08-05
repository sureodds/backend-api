#!/bin/sh
set -e
echo "Deploying application ..."
# Enter maintenance mode
 # Update codebase
    git pull origin main
    # Install dependencies based on lock file
    composer install --no-interaction --prefer-dist --optimize-autoloader --ignore-platform-reqs

echo "Application deployed to production!"
