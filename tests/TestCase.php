<?php

namespace GenieFintech\DevLogin\Tests;

use GenieFintech\DevLogin\DevLoginServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            DevLoginServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
    }
}
