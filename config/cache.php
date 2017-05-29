<?php

/**
 * DocTub - Online Documentation Platform.
 * @author - Yoginth <yoginth@zoho.com>
 * Copyright (c) 2017-present, DocTub, Inc. All rights reserved.
 */

// MEMCACHED - Split out configuration into an array
if (env('CACHE_DRIVER') === 'memcached') {
    $memcachedServerKeys = ['host', 'port', 'weight'];
    $memcachedServers = explode(',', trim(env('MEMCACHED_SERVERS', '127.0.0.1:11211:100'), ','));
    foreach ($memcachedServers as $index => $memcachedServer) {
        $memcachedServerDetails = explode(':', $memcachedServer);
        if (count($memcachedServerDetails) < 2) $memcachedServerDetails[] = '11211';
        if (count($memcachedServerDetails) < 3) $memcachedServerDetails[] = '100';
        $memcachedServers[$index] = array_combine($memcachedServerKeys, $memcachedServerDetails);
    }
}

return [

    'default' => env('CACHE_DRIVER', 'database'),

    'stores' => [

        'apc' => [
            'driver' => 'apc',
        ],

        'array' => [
            'driver' => 'array',
        ],

        'database' => [
            'driver' => 'database',
            'table'  => 'cache',
            'connection' => null,
        ],

        'file' => [
            'driver' => 'file',
            'path'   => storage_path('framework/cache'),
        ],

        'memcached' => [
            'driver'  => 'memcached',
            'servers' => env('CACHE_DRIVER') === 'memcached' ? $memcachedServers : [],
        ],

        'redis' => [
            'driver' => 'redis',
            'connection' => 'default',
        ],

    ],

    'prefix' => env('CACHE_PREFIX', 'doctub_'),

];
