# core-php-test-task

A core PHP application with Smarty templating, a custom router, ORM, and MySQL — no frameworks.

## Running with Docker

### Requirements
- [Docker](https://www.docker.com/) with Docker Compose

### Start the app

```bash
docker compose up --build
```

The app will be available at **http://localhost:8080**.

### Seed the database

On first run, the tables are created automatically. To populate them with sample data:

```bash
docker compose exec app php artisan migrate:fresh --seed
```

### Stop the app

```bash
docker compose down
```

To also delete the database volume:

```bash
docker compose down -v
```

---

## Running locally (without Docker)

### Requirements
- PHP 8.2+
- MySQL 8.0+
- Composer
- Node.js + npm (for compiling CSS)

### Setup

```bash
# Install PHP dependencies
composer install

# Compile CSS
npm install
npm run build
```

Create `config/database.php`:

```php
<?php
return [
    'host'     => 'localhost',
    'database' => 'core_php_test_task',
    'username' => 'root',
    'password' => '',
];
```

Run migrations and seed:

```bash
php artisan migrate:fresh --seed
```

Serve with Apache (mod_rewrite required) pointing the document root at the project folder, or use PHP's built-in server:

```bash
php -S localhost:8000
```

---

## Artisan commands

| Command | Description |
|---|---|
| `php artisan migrate` | Run pending migrations |
| `php artisan migrate:rollback` | Rollback the last batch |
| `php artisan migrate:fresh` | Drop all tables and re-run migrations |
| `php artisan migrate:fresh --seed` | Fresh migration + seed data |
| `php artisan db:seed` | Run seeders only |
