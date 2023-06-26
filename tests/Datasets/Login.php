<?php

dataset('logins', [
    [
        'email' => 'genie-dev@geniefintech.com',
        'password' => '6R0XMNEU',
    ],
]);
dataset('invalid_logins', [
    [
        'email' => 'genie-dev@geniefintech.com',
        'password' => 'wrong_password',
        'errors' => [
            'email' => 'These credentials do not match our records.',
        ],
    ],
    [
        'email' => 'wrong_email',
        'password' => 'wrong_password',
        'errors' => [
            'email' => 'The email field must be a valid email address.',
        ],
    ],
]);
