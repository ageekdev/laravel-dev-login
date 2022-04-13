<?php

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

it('can authenticate a user', function () {
    $data = $this->getLoginData()->first();

    $request = Request::create('dev/login', 'POST', [
        'email' => $data['email'],
        'password' => $data['password'],
    ], [], [], [
        'HTTP_ACCEPT' => 'application/json',
    ]);

    $this->handleRequestUsing($request, function ($request) {
        return $this->login($request);
    })->assertStatus(204);
});

it('cant authenticate a user with invalid_password', function () {
    $data = $this->getLoginData()->first();
    $request = Request::create('login', 'POST', [
        'email' => $data['email'],
        'password' => "wrong_password",
    ], [], [], [
        'HTTP_ACCEPT' => 'application/json',
    ]);

    $response = $this->handleRequestUsing($request, function ($request) {
        return $this->login($request);
    })->assertUnprocessable();

    $this->assertInstanceOf(ValidationException::class, $response->exception);
    $this->assertSame([
        'email' => [
            'These credentials do not match our records.',
        ],
    ], $response->exception->errors());
});

it('cant authenticate unknown credential', function () {
    $request = Request::create('dev/login', 'POST', [
        'email' => "wrong_email",
        'password' => "wrong_password",
    ], [], [], [
        'HTTP_ACCEPT' => 'application/json',
    ]);

    $response = $this->handleRequestUsing($request, function ($request) {
        return $this->login($request);
    })->assertUnprocessable();

    $this->assertInstanceOf(ValidationException::class, $response->exception);
    $this->assertSame([
        'email' => [
            'These credentials do not match our records.',
        ],
    ], $response->exception->errors());
});
