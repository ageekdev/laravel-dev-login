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
    ],
    [
        'email' => 'wrong_email',
        'password' => 'wrong_password',
    ],
]);
