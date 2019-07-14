<?php

namespace nickurt\HostFact\Authentication;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->Identifier;
    }

    /**
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return 'Identifier';
    }

    /**
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->SecurePassword;
    }

    /**
     * @return string
     */
    public function getRememberToken()
    {
        //
    }

    /**
     * @return string
     */
    public function getRememberTokenName()
    {
        //
    }

    /**
     * @param string $value
     * @return void
     */
    public function setRememberToken($value)
    {
        //
    }
}