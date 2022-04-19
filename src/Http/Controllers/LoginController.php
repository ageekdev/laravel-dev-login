<?php

namespace GenieFintech\DevLogin\Http\Controllers;

use GenieFintech\DevLogin\Auth\AuthenticatesUsers;
use GenieFintech\DevLogin\DevLoginServiceProvider;
use Illuminate\Routing\Controller;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected function redirectTo()
    {
        return config('dev-login.home', '/dev/home');
    }
}
