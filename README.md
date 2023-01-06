# MileApp Backend Developer Test

## Techstack

-   PHP (8.2.0)
-   Laravel (9.46.0)
-   MongoDB (MongoDB 6.0.3 Community)

## Input Validation

Pastikan validasi data inputan seperti:

-   type data: numeric, array, email
-   max - min value: min:1|max:7
-   panjang - pendek karakter: digits_between:5,6
-   wajib diisi atau tidak: required, nullable

## Installation

Clone the repo

```bash
git clone https://github.com/rarinugraha/mileapp-test-be.git
```

Install all the dependencies using composer

```bash
composer install
```

Copy the example env file and make the required configuration changes in the .env file

```bash
cp .env.example .env
```

Generate a new application key

```bash
php artisan key:generate
```

Start the local development server

```bash
php artisan serve
```

You can now access the server at http://localhost:8000

## Running Tests

To run tests, run the following command

```bash
  php artisan test
```

It will create "mileapp_db_test" in MongoDB

## Postman Collection

inside /docs folder
