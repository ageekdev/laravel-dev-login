<?php

namespace GenieFintech\DevLogin\Auth;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Support\Str;

/**
 * Json File based user storage retrieval
 */
class ConfigUserProvider implements UserProvider
{
    /**
     * The table containing the users.
     *
     * @var array
     */
    protected array $user_data;

    /**
     * Create a new config user provider.
     *
     * @return void
     */
    public function __construct(array $user_data)
    {
        $this->user_data = $user_data;
    }

    /**
     * Retrieve a user by their unique identifier.
     *
     * @param  mixed  $identifier
     * @return \GenieFintech\DevLogin\Auth\ConfigUserAuthenticatable|null
     */
    public function retrieveById($identifier): ?\GenieFintech\DevLogin\Auth\ConfigUserAuthenticatable
    {
        foreach ($this->user_data as $value) {
            if ($value['id'] === $identifier) {
                return $this->getGenericUser($value);
            }
        }

        return null;
    }

    /**
     * Retrieve a user by their unique identifier and "remember me" token.
     *
     * @param  mixed  $identifier
     * @param  string  $token
     * @return \GenieFintech\DevLogin\Auth\ConfigUserAuthenticatable|null
     */
    public function retrieveByToken($identifier, $token): ?\GenieFintech\DevLogin\Auth\ConfigUserAuthenticatable
    {
        foreach ($this->user_data as $value) {
            if ($value['id'] === $identifier && $value['remember_me'] === $token) {
                return $this->getGenericUser($value);
            }
        }

        return null;
    }

    /**
     * Update the "remember me" token for the given user in storage.
     *
     * @param  \GenieFintech\DevLogin\Auth\ConfigUserAuthenticatable  $user
     * @param  string  $token
     * @return void
     */
    public function updateRememberToken(Authenticatable $user, $token)
    {
    }

    /**
     * Retrieve a user by the given credentials.
     *
     * @param  array  $credentials
     * @return \GenieFintech\DevLogin\Auth\ConfigUserAuthenticatable|null
     */
    public function retrieveByCredentials(array $credentials): ?\GenieFintech\DevLogin\Auth\ConfigUserAuthenticatable
    {
        foreach ($this->user_data as $value) {
            foreach ($credentials as $c_key => $c_value) {
                if (! Str::contains($c_key, 'password')) {
                    if ($value[$c_key] == $c_value) {
                        return $this->getGenericUser($value);
                    }
                }
            }
        }

        return null;
    }

    /**
     * Get the generic user.
     *
     * @param mixed $user
     * @return \GenieFintech\DevLogin\Auth\ConfigUserAuthenticatable|null
     */
    protected function getGenericUser(mixed $user): ?\GenieFintech\DevLogin\Auth\ConfigUserAuthenticatable
    {
        if (! is_null($user)) {
            return new ConfigUserAuthenticatable((array) $user);
        }

        return null;
    }

    /**
     * Validate a user against the given credentials.
     *
     * @param  \GenieFintech\DevLogin\Auth\ConfigUserAuthenticatable  $user
     * @param  array  $credentials
     * @return bool
     */
    public function validateCredentials(Authenticatable $user, array $credentials): bool
    {
        return $credentials['password'] === $user->getAuthPassword();
    }
}
