<h1 align="center">Laravel Developer Login</h1>

[![Laravel 8.x](https://img.shields.io/badge/Laravel-8.x-red.svg?style=flat-square)](https://laravel.com/docs/8.x)
[![Laravel 9.x](https://img.shields.io/badge/Laravel-9.x-red.svg?style=flat-square)](https://laravel.com/docs/9.x)
[![PHP 8.x](https://img.shields.io/badge/php-%5E8.0-blue?style=flat-square)](https://www.php.net/releases/8.0/en.php)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/genie-fintech/laravel-dev-login/run-tests?label=tests&style=flat-square)](https://github.com/genie-fintech/dev-login/actions?query=workflow%3Arun-tests+branch%3Amain)

This package allows you to login the developer associate actions (e.g.log views).

## Installation

You can install this package via composer using this command:

```bash
composer require genie-fintech/dev-login
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

#### Add UseDevLoginGuard Middleware
You must define `UseDevLoginGuard` middleware applied to Telescope routes in telescope.middleware config value. `UseDevLoginGuard` middleware will override the default guard in telescope routes.

`config/telescope.php`
```php
<?php

use Laravel\Telescope\Http\Middleware\Authorize;
use GenieFintech\DevLogin\Http\Middleware\UseDevLoginGuard;
use Laravel\Telescope\Watchers;

...

'middleware' => [
   'web',
    UseDevLoginGuard::class,
    Authorize::class,
],

...
```

#### Add Dev Users

After you added `UseDevLoginGuard` middleware, you can add all of the dev users. Within your `app/Providers/TelescopeServiceProvider.php` file, there is an authorization gate definition.
You need to add `dev_user_emails()` helper function in `TelescopeServiceProvider`.

`app/Providers/TelescopeServiceProvider.php`
```php
protected function gate()
{
    Gate::define('viewTelescope', function ($user) {
        return in_array($user->email, dev_user_emails());
    });
}
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
