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

// REDIS - Split out configuration into an array
if (env('REDIS_SERVERS', false)) {
    $redisServerKeys = ['host', 'port', 'database'];
    $redisServers = explode(',', trim(env('REDIS_SERVERS', '127.0.0.1:6379:0'), ','));
    $redisConfig = [
        'cluster' => env('REDIS_CLUSTER', false)
    ];
    foreach ($redisServers as $index => $redisServer) {
        $redisServerName = ($index === 0) ? 'default' : 'redis-server-' . $index;
        $redisServerDetails = explode(':', $redisServer);
        if (count($redisServerDetails) < 2) $redisServerDetails[] = '6379';
        if (count($redisServerDetails) < 3) $redisServerDetails[] = '0';
        $redisConfig[$redisServerName] = array_combine($redisServerKeys, $redisServerDetails);
    }
}

return [

    'fetch' => PDO::FETCH_CLASS,

    'default' => env('DB_CONNECTION', 'mysql'),

    'connections' => [

        'sqlite' => [
            'driver'   => 'sqlite',
            'database' => storage_path('database.sqlite'),
            'prefix'   => '',
        ],

        'mysql' => [
            'driver'    => 'mysql',
            'host'      => env('DB_HOST', 'localhost'),
            'database'  => env('DB_DATABASE', 'forge'),
            'username'  => env('DB_USERNAME', 'forge'),
            'password'  => env('DB_PASSWORD', ''),
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
            'strict'    => false,
        ],

        'mysql_testing' => [
            'driver'    => 'mysql',
            'host'      => '127.0.0.1',
            'database'  => 'doctub-test',
            'username'  => env('MYSQL_USER', 'doctub-test'),
            'password'  => env('MYSQL_PASSWORD', 'doctub-test'),
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
            'strict'    => false,
        ],

        'pgsql' => [
            'driver'   => 'pgsql',
            'host'     => env('DB_HOST', 'localhost'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset'  => 'utf8',
            'prefix'   => '',
            'schema'   => 'public',
        ],

        'sqlsrv' => [
            'driver'   => 'sqlsrv',
            'host'     => env('DB_HOST', 'localhost'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset'  => 'utf8',
            'prefix'   => '',
        ],

    ],

    'migrations' => 'migrations',

    'redis' => env('REDIS_SERVERS', false) ? $redisConfig : [],

];
