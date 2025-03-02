<?php

use function Pest\Laravel\post;

it('can authenticate a user', function ($email, $password) {
    $response = post(route('dev-login.login'), [
        'email' => $email,
        'password' => $password,
    ]);

    $this->assertAuthenticated(config('dev-login.auth.guard_name'));
    $response->assertRedirect(route('dev-login.dashboard'));

})->with('logins');

it('can not authenticate with invalid login', function ($email, $password) {
    post(route('dev-login.login'), [
        'email' => $email,
        'password' => $password,
    ]);

    $this->assertGuest(config('dev-login.auth.guard_name'));

})->with('invalid_logins');
