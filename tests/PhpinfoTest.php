<?php

use Illuminate\Support\Facades\Config;
use function Pest\Laravel\get;
use function Pest\Laravel\post;

it('can visit phpinfo', function ($email) {

    post(route('dev-login.login'), [
        'email' => $email,
        'password' => '12345678',
    ]);

    get(route('dev-login.info'))->assertSuccessful();

})->with('logins');

it('can not visit phpinfo with disabled phpinfo', function ($email) {

    Config::set('dev-login.phpinfo.enabled', false);

    post(route('dev-login.login'), [
        'email' => $email,
        'password' => '12345678',
    ]);

    get(route('dev-login.info'))->assertForbidden();

})->with('logins');
