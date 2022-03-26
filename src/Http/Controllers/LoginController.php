<?php

namespace GenieFintech\DevLogin\Http\Controllers;

use GenieFintech\DevLogin\DevLoginServiceProvider;
use GenieFintech\DevLogin\Auth\AuthenticatesUsers;

class LoginController
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected string $redirectTo = DevLoginServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
