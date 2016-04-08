# Test Backend (PHP)
 A simple API Laravel test, with regular HTTP request and AJAX

## Requirements

- PHP 5.4+
- NPM 2.14 or higher
- Composer 1.0.0 or higher
- MySQL or Sqlite3

## Install

Enter to directory project and install depdndencies

```shell
cd test_backend/
npm install
composer install
```

Copy and modify .env
```shell
cp .env.example .env
```

Copy and modify .env
```shell
cp .env.example .env
```

Create or update database scheme
```shell
php artisan migrate

```

## Usage

Run the development server

```shell
php artisan serve --port=8080
```

Now open your browser and navigate to http://localhost:8080
