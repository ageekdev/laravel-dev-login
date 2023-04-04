<?php

use function Pest\Laravel\post;

it('can authenticate a user', function ($email, $password) {
    post('dev/login', [
        'email' => $email,
        'password' => '12345678',
    ])->assertSessionHasNoErrors();
})->with('logins');

it('can not authenticate a user with invalid password', function ($email, $password) {
    post('dev/login', [
        'email' => 'wrong_email',
        'password' => $password,
    ])->assertSessionHasErrors([
        'email' => 'These credentials do not match our records.',
    ]);
})->with('invalid_logins');

it('cant authenticate unknown credential', function ($email, $password) {
    post('dev/login', [
        'email' => $email,
        'password' => $password,
    ])->assertSessionHasErrors([
        'email' => 'These credentials do not match our records.',
    ]);
})->with('invalid_logins');
