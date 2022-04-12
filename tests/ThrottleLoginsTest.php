<?php

use GenieFintech\DevLogin\Auth\ThrottlesLogins;
use Illuminate\Http\Request;

it('it_can_generate_throttle_key', function () {
    $data = $this->getLoginData()->first();

    $throttle = $this->getMockForTrait(ThrottlesLogins::class, [], '', true, true, true, ['username']);
    $throttle->method('username')->willReturn('email');
    $reflection = new \ReflectionClass($throttle);
    $method = $reflection->getMethod('throttleKey');
    $method->setAccessible(true);

    $request = $this->mock(Request::class);
    $request->expects('input')->with('email')->andReturn($data['email']);
    $request->expects('ip')->andReturn('127.0.0.1');

    $this->assertSame($data['email'] . '|127.0.0.1', $method->invoke($throttle, $request));
});

