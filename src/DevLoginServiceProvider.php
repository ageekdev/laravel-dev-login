<?php

namespace GenieFintech\DevLogin;

use GenieFintech\DevLogin\Auth\ConfigUserProvider;
use GenieFintech\DevLogin\Commands\CreateDevUserCommand;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class DevLoginServiceProvider extends PackageServiceProvider
{
    public const HOME = '/dev/home';

    public function bootingPackage()
    {
        $this->registerRoutes();
    }

    public function packageBooted()
    {
        Auth::provider('config_user', function ($app, array $config) {
            return new ConfigUserProvider(config('dev-login.users'));
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
     *
     * @return void
     */
    protected function registerRoutes()
    {
        Route::group([
            'prefix' => config('dev-login.path', 'dev'),
        ], function () {
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        });
    }
}
