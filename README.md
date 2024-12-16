# Developer Assignment Readme

## Installation
1. `cp .env.example .env`
2. `./vendor/bin/sail up -d`
3. `./vendor/bin/sail bash`
4. `composer install`
5. `php artisan migrate`


Site should be available here: http://localhost:3005/

Swagger should be available here: http://localhost:3005/api/documentation

Notes:
- built css/js assets are included in repo
- user API token is generated once after user registration and is available in user profile after authorization
- Scheduled commands are stored in `routes/console.php`. To run manually scheduler use php artisan schedule:work. NORD Pool price update is set to update every minute for easier testing process.
- multiplier can be set as .env variable `NORDPOOL_PRICE_MULTIPLIER`

Used Framework:
- latest Laravel v11.35.1

Used packages:
1. For Authentication: laravel/breeze
2. For charts: ApexCharts.js
3. Swagger: darkaonline/l5-swagger
