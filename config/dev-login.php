<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Home Route
    |--------------------------------------------------------------------------
    |
    | This is the path name that to modify DevLogin's home path.
    | By default, the home path is "dashboard".
    |
    */

    'home' => env('DEV_LOGIN_HOME', 'dashboard'),

    /*
    |--------------------------------------------------------------------------
    | Redirect Path
    |--------------------------------------------------------------------------
    |
    | This path that to redirect after user login. Default redirect path is
    | DevLogin's home route.
    |
    */

    'redirect_path' => env('DEV_LOGIN_REDIRECT_PATH'),

    /*
    |--------------------------------------------------------------------------
    | DevLogin Domain
    |--------------------------------------------------------------------------
    |
    | This is you can change DevLogin subdomain. If the value is empty,
    | it will be as the application domain.
    |
    */

    'domain' => env('DEV_LOGIN_DOMAIN'),

    /*
    |--------------------------------------------------------------------------
    | DevLogin Path
    |--------------------------------------------------------------------------
    |
    | This is the prefix of DevLogin route. Default path is "dev".
    |
    */

    'path' => env('DEV_LOGIN_PATH', 'dev'),

    /*
    |--------------------------------------------------------------------------
    | PHP INFO
    |--------------------------------------------------------------------------
    |
    | This is information of PHP Info such as php version, laravel version,
    | post max size, upload max file size, memory limit, and loaded extensions.
    |
    */

    'phpinfo' => [
        'enabled' => true,
    ],

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
    | DevLogin Users
    |--------------------------------------------------------------------------
    |
    | The following array lists is dev users data that will access dev login.
    |
    */

    'users' => [],
];
