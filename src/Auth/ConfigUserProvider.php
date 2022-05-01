<?php

namespace GenieFintech\DevLogin\Auth;

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
     *
     * @var Collection
     */
    protected Collection $user_data;

    /**
     * Create a new config user provider.
     *
     * @return void
     */
    public function __construct(array $user_data)
    {
        $this->user_data = collect($user_data);
    }

    /**
     * Retrieve a user by their unique identifier.
     *
     * @param mixed $identifier
     * @return DevUser|null
     */
    public function retrieveById($identifier): ?DevUser
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
     * @param mixed $identifier
     * @param string $token
     * @return DevUser|null
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
     * @param Authenticatable $user
     * @param string $token
     * @return void
     */
    public function updateRememberToken(Authenticatable $user, $token): void
    {
    }

    /**
     * Retrieve a user by the given credentials.
     *
     * @param array $credentials
     * @return DevUser|null
     */
    public function retrieveByCredentials(array $credentials): ?DevUser
    {
        $filteredUser = $this->user_data->where('email', $credentials['email'])
            ->where('password', $credentials['password'])->first();

        if ($filteredUser) {
            return $this->getGenericUser($filteredUser);
        }

        return null;
    }

    /**
     * Get the generic user.
     *
     * @param mixed $user
     * @return DevUser|null
     */
    protected function getGenericUser(mixed $user): ?DevUser
    {
        if (! is_null($user)) {
            return new DevUser((array)$user);
        }

        return null;
    }

    /**
     * Validate a user against the given credentials.
     *
     * @param Authenticatable $user
     * @param array $credentials
     * @return bool
     */
    public function validateCredentials(Authenticatable $user, array $credentials): bool
    {
        if (Hash::check($credentials['password'], $user->getAuthPassword())) {
            return true;
        }

        return false;
    }
}
