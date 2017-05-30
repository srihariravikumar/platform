<?php

/**
 * DocTub - Online Documentation/Wiki Platform.
 * Copyright (c) 2017-present, DocTub, Inc. All rights reserved.
 *
 * This source code is licensed under the BSD 3-Clause "New" or "Revised" License
 * found in the LICENSE file in the root directory of this source tree. An additional
 * grant of patent rights can be found in the PATENTS file in the same directory.
 *
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
