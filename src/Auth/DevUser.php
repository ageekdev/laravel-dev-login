<?php

namespace AgeekDev\DevLogin\Auth;

use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Foundation\Auth\Access\Authorizable;

/**
 * @property-read string $email
 * @property-read string $password
 * @property-read string $name
 * @property-read bool $remember_me
 */
class DevUser extends Model implements AuthenticatableContract, AuthorizableContract
{
    use ConfigUserAuthenticatable;
    use Authorizable;

    public $timestamps = false;

    public $incrementing = false;

    protected $fillable = ['id', 'email', 'name', 'password', 'remember_me'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
