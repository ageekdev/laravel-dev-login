<?php

use AgeekDev\DevLogin\Auth\ThrottlesLogins;
use Illuminate\Http\Request;

it('can generate throttle key', function () {
    $data = $this->getLoginData()->first();

    $throttle = new class {
        use ThrottlesLogins;
        public function username() {
            return 'email';
        }
    };
    $reflection = new \ReflectionClass($throttle);
    $method = $reflection->getMethod('throttleKey');
    $method->setAccessible(true);

    $request = $this->mock(Request::class);
    $request->expects('input')->with('email')->andReturn($data['email']);
    $request->expects('ip')->andReturn('127.0.0.1');

    expect($method->invoke($throttle, $request))->toBe($data['email'].'|127.0.0.1');
});
