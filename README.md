## Synnods ECommerce
- A monolithic e-commerce web app built with laravel and veujs

## How to setup locally

### Setup
Make sure you have `composer and xampp/wamp` installed in your machine before you continue.

### Install dependencies in laravel. 
```
composer install
```

### Change your database
#### Open .env file and change you database name
```
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=synoods
DB_USERNAME=root
DB_PASSWORD=

```

### Run `php artisan migrate`, to update your database, and to fill your database with dummy data run `php artisan db:seed` then run `php artisan passport:install`. 

### Running the Applcation
Run `php artisan serve` to start the app server.  

### Demo Details

#### Url 
[Synoods Ecommerce](http://127.0.0.1:8000/)

#### Testing Account
##### Super Admin
- Email: mujhtech@gmail.com
- Password: 12345678
