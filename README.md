# minify

[![Build Status](https://travis-ci.com/NNR-D05/minify.svg?branch=main)](https://travis-ci.com/github/NNR-DOS/minify)

Straightforward URL Shortener

![grab-landing-page](https://github.com/NNR-DOS/minify/blob/main/minify.gif)

## Features
- Automated unit/functional tests
- Captca Protection
- CI/CD with Travis CI

## Installation

Minify employs PHP 8, Composer, Symfony 5, and PostgreSQL.

1. Install dependencies with Composer:

`composer install`

2. Create a local `.env` file from the existing template by executing (ensure the `DATABASE_URL` environment variable is set correctly):

`cp .env .env.local`

3. Run the migration:

`php bin/console doctrine:migrations:migrate`

5. Run the application using PHP's built-in server with:

`php -S localhost:8000 -t public`

## Tests

Running tests is simple. Execute this command:

`php bin/phpunit`
