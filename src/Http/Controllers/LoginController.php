<?php

namespace AgeekDev\DevLogin\Http\Controllers;

use AgeekDev\DevLogin\Auth\AuthenticatesUsers;
use Illuminate\Routing\Controller;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected function redirectTo()
    {
        return config('dev-login.home', '/dev/home');
    }
}
