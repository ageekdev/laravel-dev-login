<?php

namespace GenieFintech\DevLogin\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'GenieFintech\DevLogin\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            GenieFintech\DevLogin\DevLoginServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
    }
}
