<?php

namespace AgeekDev\DevLogin\Tests;

use AgeekDev\DevLogin\Auth\AuthenticatesUsers;
use AgeekDev\DevLogin\DevLoginServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Routing\Pipeline;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Testing\TestResponse;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    use AuthenticatesUsers;

    protected function setUp(): void
    {
        parent::setUp();

        $this->artisan('dev:publish', ['--force' => true])->run();
    }

    protected function getPackageProviders($app): array
    {
        return [
            DevLoginServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app): void
    {
        $this->setLoginData();
    }

    protected function tearDown(): void
    {
        Auth::logout();

        parent::tearDown();
    }

    protected function handleRequestUsing(Request $request, callable $callback): TestResponse
    {
        return new TestResponse(
            (new Pipeline($this->app))
                ->send($request)
                ->through([
                    StartSession::class,
                ])
                ->then($callback)
        );
    }

    public function getLoginData(): Collection
    {
        $users = Config::get('dev-login.users');

        return collect($users);
    }

    public function setLoginData(): void
    {
        Config::set('dev-login.users', [
            [
                'email' => 'dev@test.com',
                'password' => '$2y$10$9czveKLJpc9ip.wyZoBdROuiaHPV5o/ldvFGSLlb3XrTibRQGfs.S',
            ],
        ]);
    }
}
