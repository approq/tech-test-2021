# Tech Test for PolicyLead

## Deployment Instructions:

- PHP v8 is necessary
- run `cp .env.example .env`
- run `composer install`
- run `php artisan migrate --seed`
- run `php artisan key:generate`
- run `npm install`
- run `npm run production`

### Open the page and enjoy the view :)

## Adding More Laws

- run `php artisan upload-law-from-xml storage/app/BJNR179510020.xml`
- run `php artisan upload-law-from-xml storage/app/BJNR179510020.xml`
- run `php artisan upload-law-from-xml storage/app/BJNR179510020.xml`
- run `php artisan upload-law-from-xml storage/app/BJNR179510020.xml`

This way we have imported multiple laws (the same law actually, but we are in test mode) and see them on the page.
Use the navigation at the bottom of the page to switch between the laws.
