<?php

namespace AgeekDev\DevLogin;

use AgeekDev\DevLogin\Auth\ConfigUserProvider;
use AgeekDev\DevLogin\Commands\CreateDevUserCommand;
use AgeekDev\DevLogin\Commands\InstallCommand;
use AgeekDev\DevLogin\Commands\PublishCommand;
use AgeekDev\DevLogin\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class DevLoginServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'dev-login');

        $this->registerAuth();

        Route::aliasMiddleware('dev-guest', RedirectIfAuthenticated::class);

        $this->registerRoutes();

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/dev-login.php' => config_path('dev-login.php'),
            ], 'dev-login-config');

            $this->publishes([
                __DIR__.'/../public' => public_path('vendor/dev-login'),
            ], ['dev-login-assets']);

            $this->commands([
                CreateDevUserCommand::class,
                InstallCommand::class,
                PublishCommand::class,
            ]);
        }
    }

    /**
     * Register the service provider.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/dev-login.php', 'dev-login');
    }

    /**
     * Register the Dev Login auth.
     */
    public function registerAuth(): void
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

    /**
     * Register the Dev Login routes.
     */
    protected function registerRoutes(): void
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        });
    }

    /**
     * Get the Dev Login route group configuration array
     */
    private function routeConfiguration(): array
    {
        return [
            'domain' => config('dev-login.domain'),
            'prefix' => config('dev-login.path'),
            'middleware' => 'web',
        ];
    }
}
