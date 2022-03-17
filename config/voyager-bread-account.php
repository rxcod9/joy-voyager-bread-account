<?php

return [

    /*
     * If enabled for voyager-bread-account package.
     */
    'enabled' => env('VOYAGER_BREAD_ACCOUNT_ENABLED', true),

    /*
     * The config_key for voyager-bread-account package.
     */
    'config_key' => env('VOYAGER_BREAD_ACCOUNT_CONFIG_KEY', 'joy-voyager-bread-account'),

    /*
     * The route_prefix for voyager-bread-account package.
     */
    'route_prefix' => env('VOYAGER_BREAD_ACCOUNT_ROUTE_PREFIX', 'joy-voyager-bread-account'),

    /*
    |--------------------------------------------------------------------------
    | Controllers config
    |--------------------------------------------------------------------------
    |
    | Here you can specify voyager controller settings
    |
    */

    'controllers' => [
        'namespace' => 'Joy\\VoyagerBreadAccount\\Http\\Controllers',
    ],
];
