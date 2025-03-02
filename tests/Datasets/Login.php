<?php

dataset('logins', [
    [
        'email' => 'dev@test.com',
        'password' => '12345678',
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
