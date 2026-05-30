# ADYSURVE LTD Deployment Guide

## cPanel Shared Hosting

1. Build assets locally with `npm run build`.
2. Upload the project to cPanel, excluding `node_modules`.
3. Point the domain document root to the `public` directory.
4. Create the MySQL database and user in cPanel.
5. Update `.env` with production database credentials, `APP_ENV=production`, and `APP_DEBUG=false`.
6. Run `composer install --no-dev --optimize-autoloader` on the server or upload a production `vendor` directory.
7. Run `php artisan migrate --force` and `php artisan db:seed --force`.
8. Run `php artisan storage:link`.
9. Run `php artisan sitemap:generate`.
10. Cache production config with `php artisan config:cache`, `php artisan route:cache`, and `php artisan view:cache`.

## Admin

Create the first admin user with `php artisan make:filament-user`, then visit `/admin`.
