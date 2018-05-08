<?php

use nickurt\HostFact\HostFact;

if (! function_exists('hostfact')) {
    function hostfact()
    {
        return app(HostFact::class);
    }
}
