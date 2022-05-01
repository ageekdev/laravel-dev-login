<?php

namespace GenieFintech\DevLogin\Auth;

use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Foundation\Auth\Access\Authorizable;

class DevUser extends Model implements
    AuthenticatableContract,
    AuthorizableContract
{
    use ConfigUserAuthenticatable, Authorizable;

    public $timestamps = false;

    public $incrementing = false;

    protected $fillable = ['id', 'email', 'name', 'password', 'remember_me'];

    /**
     * The attributes that should be hidden for serialization.
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
