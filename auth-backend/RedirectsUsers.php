<?php

namespace AgeekDev\DevLogin\Auth;

trait RedirectsUsers
{
    /**
     * Get the post register / login redirect path.
     */
    public function redirectPath(): string
    {
        /** @phpstan-ignore-next-line  */
        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : route('dev-login.dashboard');
    }
}
