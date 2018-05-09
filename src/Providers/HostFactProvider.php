<?php

namespace nickurt\HostFact\Providers;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;

class HostFactProvider implements UserProvider
{
    public function retrieveByCredentials(array $credentials)
    {
        //
    }

    public function retrieveById($identifier)
    {
        //
    }

    public function retrieveByToken($identifier, $token)
    {
        //
    }

    public function updateRememberToken(Authenticatable $user, $token)
    {
        //
    }

    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        //
    }
}