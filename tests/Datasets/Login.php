<?php

dataset('logins', [
    [
        'email' => 'dev@test.com',
        'password' => '6R0XMNEU',
    ],
]);
dataset('invalid_logins', [
    [
        'email' => 'dev@test.com',
        'password' => 'wrong_password',
    ],
    [
        'email' => 'wrong_email',
        'password' => 'wrong_password',
    ],
]);
