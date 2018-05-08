<?php

return [

    'default' => env('HOSTFACT_CONNECTION', 'default'),

    'panels' => [

        'default' => [
            'url' => env('HOSTFACT_DEFAULT_URL'),
            'key' => env('HOSTFACT_DEFAULT_KEY'),
        ],

    ],

];