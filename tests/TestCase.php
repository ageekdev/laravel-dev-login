<?php

namespace AgeekDev\DevLogin\Tests;

use AgeekDev\DevLogin\Auth\AuthenticatesUsers;
use AgeekDev\DevLogin\DevLoginServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Routing\Pipeline;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Testing\TestResponse;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    use AuthenticatesUsers;

    protected function getPackageProviders($app)
    {
        return [
            DevLoginServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        $this->setLoginData();
    }

    protected function tearDown(): void
    {
        Auth::logout();

        parent::tearDown();
    }

    protected function handleRequestUsing(Request $request, callable $callback)
    {
        return new TestResponse(
            (new Pipeline($this->app))
                ->send($request)
                ->through([
                    \Illuminate\Session\Middleware\StartSession::class,
                ])
                ->then($callback)
        );
    }

    public function getLoginData()
    {
        $users = Config::get('dev-login.users');

        return collect($users);
    }

    public function setLoginData()
    {
        Config::set('dev-login.users', [
            [
                'email' => "genie-dev@geniefintech.com",
                'password' => "$2y$10$9czveKLJpc9ip.wyZoBdROuiaHPV5o/ldvFGSLlb3XrTibRQGfs.S",
            ],
        ]);
    }
}
