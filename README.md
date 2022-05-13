<h1 align="center">Laravel Developer Login</h1>

[![Laravel 8.x](https://img.shields.io/badge/Laravel-8.x-red.svg?style=flat-square)](https://laravel.com/docs/8.x)
[![Laravel 9.x](https://img.shields.io/badge/Laravel-9.x-red.svg?style=flat-square)](https://laravel.com/docs/9.x)
[![PHP 8.x](https://img.shields.io/badge/php-%5E8.0-blue?style=flat-square)](https://www.php.net/releases/8.0/en.php)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/ageekdev/laravel-dev-login/run-tests?label=tests&style=flat-square)](https://github.com/ageekdev/laravel-dev-login/actions?query=workflow%3Arun-tests+branch%3Amain)

This package allows you to login the developer associate actions (e.g.log views).

## Installation

You can install this package via composer using this command:

```bash
composer require ageekdev/dev-login
```

The package will automatically register itself.

## Edit configuration

Publish dev-login.php configuration file into /config/ for configuration customization:

```bash
php artisan vendor:publish --tag=dev-login-config
```

## Customize view

Publish into /resources/views/vendor/dev-login for view customization:

```bash
php artisan vendor:publish --tag=dev-login-views 
```

## Setup developer account

Setup new dev user account.

```bash
php artisan dev:user
```

## USAGE

Dev Login default login URI is the `/dev/login`.

### UseDevLoginGuard Middleware

Laravel official packages uses `$request->user()` to get the user in gate. The default guard is `user` guard. So You can use UseDevLoginGuard middleware to override this behaviour.

### Telescope

You must replace `Authorize` with `UseDevLoginGuard` middleware applied to Telescope routes in telescope.middleware config value.

`config/telescope.php`
```diff
<?php

- use Laravel\Telescope\Http\Middleware\Authorize;
+ use AgeekDev\DevLogin\Http\Middleware\UseDevLoginGuard;
use Laravel\Telescope\Watchers;

...

'middleware' => [
   'web',
-   Authorize::class,
+   UseDevLoginGuard::class,
],

...
```

### Vapor UI

You must replace `EnsureUserIsAuthorized` with `UseDevLoginGuard` middleware applied to Vapor routes in vapor-ui.middleware config value.

`config/vapor-ui.php`
```diff
<?php

- use Laravel\VaporUi\Http\Middleware\EnsureUserIsAuthorized;
+ use AgeekDev\DevLogin\Http\Middleware\UseDevLoginGuard;
use Laravel\Telescope\Watchers;

...

'middleware' => [
   'web',
-   EnsureUserIsAuthorized::class,
+   UseDevLoginGuard::class,
],

...
```

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
