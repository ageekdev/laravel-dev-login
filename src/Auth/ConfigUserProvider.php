<?php

namespace AgeekDev\DevLogin\Auth;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;

/**
 * Json File based user storage retrieval
 */
class ConfigUserProvider implements UserProvider
{
    /**
     * The table containing the users.
     */
    protected Collection $user_data;

    /**
     * Create a new config user provider.
     */
    public function __construct(array $user_data)
    {
        $this->user_data = collect($user_data);
    }

    /**
     * Retrieve a user by their unique identifier.
     */
    public function retrieveById(mixed $identifier): ?DevUser
    {
        $filteredUser = $this->user_data->where('id', $identifier)->first();
        if ($filteredUser) {
            return $this->getGenericUser($filteredUser);
        }

        return null;
    }

    /**
     * Retrieve a user by their unique identifier and "remember me" token.
     *
     * @param  mixed  $identifier
     * @param  string  $token
     */
    public function retrieveByToken($identifier, $token): ?DevUser
    {
        foreach ($this->user_data as $value) {
            if ($value['id'] === $identifier && $value['remember_token'] === $token) {
                return $this->getGenericUser($value);
            }
        }

        return null;
    }

    /**
     * Update the "remember me" token for the given user in storage.
     *
     * @param  string  $token
     */
    public function updateRememberToken(Authenticatable $user, $token): void
    {
    }

    /**
     * Retrieve a user by the given credentials.
     */
    public function retrieveByCredentials(array $credentials): ?DevUser
    {
        $filteredUser = $this->user_data->where('email', $credentials['email'])->first();

        if ($filteredUser) {
            return $this->getGenericUser($filteredUser);
        }

        return null;
    }

    /**
     * Get the generic user.
     */
    protected function getGenericUser(mixed $user): ?DevUser
    {
        if (! is_null($user)) {
            return new DevUser((array) $user);
        }

        return null;
    }

    /**
     * Validate a user against the given credentials.
     */
    public function validateCredentials(Authenticatable $user, array $credentials): bool
    {
        if (Hash::check($credentials['password'], $user->getAuthPassword())) {
            return true;
        }

        return false;
    }

    public function rehashPasswordIfRequired(Authenticatable $user, array $credentials, bool $force = false)
    {
    }
}
