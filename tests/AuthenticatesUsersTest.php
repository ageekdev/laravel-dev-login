<?php

use function Pest\Laravel\post;

it('can authenticate a user', function ($email, $password) {
    post(route('dev-login.login'), [
        'email' => $email,
        'password' => '12345678',
    ])->assertSessionHasNoErrors();
})->with('logins');

it('is invalid login', function ($email, $password, $errors) {
    post(route('dev-login.login'), [
        'email' => $email,
        'password' => $password,
    ])->assertSessionHasErrors($errors);

})->with('invalid_logins');
