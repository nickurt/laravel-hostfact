<?php

namespace nickurt\HostFact\Providers;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;

class HostFactProvider implements UserProvider
{
    /**
     * @param array $credentials
     * @return Authenticatable|\nickurt\HostFact\Authentication\User|null
     */
    public function retrieveByCredentials(array $credentials)
    {
        $checkLogin = app('HostFact')->debtors()->checkLogin($credentials);

        if ($checkLogin['status'] != 'error') {
            $user = new \nickurt\HostFact\Authentication\User();
            $user->forceFill($checkLogin['debtor']);

            return $user;
        }

        return null;
    }

    /**
     * @param mixed $identifier
     * @return Authenticatable|mixed|null
     * @throws \Exception
     */
    public function retrieveById($identifier)
    {
        return cache()->remember('hostfact_debtor_id_' . $identifier, 60, function () use ($identifier) {
            $response = app('HostFact')->debtors()->show(['Identifier' => $identifier]);

            $user = new \nickurt\HostFact\Authentication\User();
            $user->forceFill($response['debtor']);

            return $user;
        });
    }

    public function retrieveByToken($identifier, $token)
    {
        //
    }

    public function updateRememberToken(Authenticatable $user, $token)
    {
        //
    }

    /**
     * @param Authenticatable $user
     * @param array $credentials
     * @return bool
     */
    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        return true;
    }
}