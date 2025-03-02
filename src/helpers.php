<?php

use Illuminate\Support\Arr;

if (! function_exists('dev_user_emails')) {
    /**
     * @return array<string, string>
     */
    function dev_user_emails(): array
    {
        return Arr::pluck(config('dev-login.users'), 'email');
    }
}
