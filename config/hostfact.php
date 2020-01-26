<?php

return [

    'default' => env('HOSTFACT_CONNECTION', 'default'),

    'panels' => [

        'default' => [
            'url' => env('HOSTFACT_DEFAULT_URL'),
            'key' => env('HOSTFACT_DEFAULT_KEY'),
        ],

    ],

    'client_options' => [

        \GuzzleHttp\RequestOptions::COOKIES => true,
        \GuzzleHttp\RequestOptions::CONNECT_TIMEOUT => 10,
        \GuzzleHttp\RequestOptions::TIMEOUT => 10,
        \GuzzleHttp\RequestOptions::ALLOW_REDIRECTS => false,

    ],

];
