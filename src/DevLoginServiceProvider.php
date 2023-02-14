<?php

namespace AgeekDev\DevLogin;

use AgeekDev\DevLogin\Auth\ConfigUserProvider;
use AgeekDev\DevLogin\Commands\CreateDevUserCommand;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class DevLoginServiceProvider extends PackageServiceProvider
{
    public function bootingPackage(): void
    {
        $this->registerRoutes();
    }

    public function packageBooted(): void
    {
        $provider_driver = config('dev-login.auth.provider_driver', 'config_user');
        $guard_name = config('dev-login.auth.guard_name', 'developer');

        Config::set('auth.guards.'.$guard_name, [
            'driver' => 'session',
            'provider' => $provider_driver,
        ]);
        Config::set('auth.providers.'.$provider_driver, [
            'driver' => $provider_driver,
        ]);

        Auth::provider($provider_driver, function ($app, array $config) {
            return new ConfigUserProvider(config('dev-login.users', []));
        });
    }

    public function configurePackage(Package $package): void
    {
        $package
            ->name('dev-login')
            ->hasConfigFile()
            ->hasViews()
            ->hasCommand(CreateDevUserCommand::class);
    }

    /**
     * Register the Developer Login routes.
     */
    protected function registerRoutes(): void
    {
        Route::group([
            'prefix' => config('dev-login.path', 'dev'),
        ], function () {
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        });
    }
}
