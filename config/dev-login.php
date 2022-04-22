<?php

return [
    /*
    |--------------------------------------------------------------------------
    | DevLogin Redirect Path
    |--------------------------------------------------------------------------
    |
    | This is used by DevLogin authentication to redirect users after login.
    | Feel free to change this path to anything you like. Note that the URI
    | will not affect the laravel home route.
    |
    */

    'home' => '/dev/home',

    /*
    |--------------------------------------------------------------------------
    | DevLogin Path
    |--------------------------------------------------------------------------
    |
    | This is the URI path where DevLogin will be accessible from. Feel free
    | to change this path to anything you like. Note that the URI will not
    | affect the paths of its internal API that aren't exposed to users.
    |
    */

    'path' => env('DEV_LOGIN_PATH', 'dev'),

    /*
    |--------------------------------------------------------------------------
    | Authentication Guard & Prover Driver Name
    |--------------------------------------------------------------------------
    |
    | This configuration options determines the dev authentication "guard" and
    | "provider driver" that will be used to define custom guard name and
    | provider driver name. In addition, you may set any name as you needed.
    |
    */

    'auth' => [
        'guard_name' => 'developer',
        'provider_driver' => 'config_user',
    ],

    /*
    |--------------------------------------------------------------------------
    | Dev Users
    |--------------------------------------------------------------------------
    |
    | The following array lists is dev users data that will access dev login.
    | In additional, You are free to modify these users as needed to restrict
    | access to your logs route.
    |
    */

    'users' => [

    ],
];
