<h1 align="center">Laravel Developer Login</h1>

[![Laravel 8.x](https://img.shields.io/badge/Laravel-8.x-red.svg?style=flat-square)](http://laravel.com)
[![Laravel 9.x](https://img.shields.io/badge/Laravel-9.x-red.svg?style=flat-square)](http://laravel.com)
[![PHP 8.x](https://img.shields.io/badge/php-%5E8.0-blue?style=flat-square)](https://www.php.net/releases/8.0/en.php)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/genie-fintech/laravel-dev-login/run-tests?label=tests&style=flat-square)](https://github.com/genie-fintech/dev-login/actions?query=workflow%3Arun-tests+branch%3Amain)

This package allows you to login the developer associate actions (e.g.log views).

## Installation

You can install this package via composer using this command:

```bash
composer require genie-fintech/dev-login
```

The package will automatically register itself.

Publish configuration and asset files
```bash
php artisan vendor:publish --provider="GenieFintech\DevLogin\DevLoginServiceProvider"
```

## Setup developer account

Setup new dev user account.

```bash
php artisan dev:user
```

## USAGE

`http://example.test/dev/login` type in url bar. should see the login page. type email and password

## Testing

You can run the tests with:

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
