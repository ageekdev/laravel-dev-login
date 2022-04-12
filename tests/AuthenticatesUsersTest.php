<?php


use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

it('it_can_authenticate_a_user', function () {
    $data = $this->getLoginData()->first();
    $request = Request::create('dev/login', 'POST', [
        'email' => $data['email'],
        'password' => $data['password'],
    ], [], [], [
        'HTTP_ACCEPT' => 'application/json',
    ]);

    $response = $this->handleRequestUsing($request, function ($request) {
        return $this->login($request);
    })->assertStatus(204);
});
it('it_cant_authenticate_a_user_with_invalid_password', function () {
    $data = $this->getLoginData()->first();
    $request = Request::create('dev/login', 'POST', [
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
it('it_cant_authenticate_unknown_credential', function () {

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



