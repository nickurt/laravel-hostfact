<?php

namespace nickurt\HostFact;

/**
 * @method static \nickurt\HostFact\Api\Debtors debtors()
 */
class Facade extends \Illuminate\Support\Facades\Facade
{
    /**
     * {@inheritDoc}
     */
    protected static function getFacadeAccessor()
    {
        return 'HostFact';
    }
}
