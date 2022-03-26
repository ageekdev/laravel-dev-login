<?php

namespace GenieFintech\DevLogin;

use GenieFintech\DevLogin\Commands\CreateDevUserCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class DevLoginServiceProvider extends PackageServiceProvider
{
    public const HOME = '/dev/home';

    public function configurePackage(Package $package): void
    {
        $package
            ->name('dev-login')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_developers_table')
            ->hasCommand(CreateDevUserCommand::class);
    }
}
