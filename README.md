# Synnods ECommerce

- A monolithic e-commerce web app built with laravel and veujs

## How to setup locally

### Setup

Make sure you have `composer and xampp/wamp` installed in your machine before you continue.

### Install dependencies in laravel

```bash
composer install
```

### Change your database

#### Open .env file and change you database name

```env
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=synoods
DB_USERNAME=root
DB_PASSWORD=
```

### Migrate database

```bash
php artisan migrate
```

To override the previous migration.

```bash
php artisan migrate:fresh
```

### Seed database with dummy data

```bash
php artisan db:seed
```

### Generate Passport private and public key for authentication

```bash
php artisan passport:install
```

To override previous keys

```bash
php artisan passport:install --force
```

### Link Storage folder to public directory

```bash
php artisan storage:link
```

### Running the Applcation

Start the app server by run the following artisan command.  

```bash
php artisan serve
```

### Demo Details

#### Url

[Synoods Ecommerce](http://127.0.0.1:8000/)

#### Testing Account

##### Super Admin

- Email: mujhtech@gmail.com
- Password: 12345678
