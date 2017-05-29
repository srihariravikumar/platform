<?php

/**
 * DocTub - Online Documentation Platform.
 * @author - Yoginth <yoginth@zoho.com>
 * Copyright (c) 2017-present, DocTub, Inc. All rights reserved.
 */

return [

    'default' => env('STORAGE_TYPE', 'local'),

    'url' => env('STORAGE_URL', false),

    'cloud' => 's3',

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root'   => base_path(),
        ],

        'ftp' => [
            'driver'   => 'ftp',
            'host'     => 'ftp.example.com',
            'username' => 'your-username',
            'password' => 'your-password',

            // Optional FTP Settings...
            // 'port'     => 21,
            // 'root'     => '',
            // 'passive'  => true,
            // 'ssl'      => true,
            // 'timeout'  => 30,
        ],

        's3' => [
            'driver' => 's3',
            'key'    => env('STORAGE_S3_KEY', 'your-key'),
            'secret' => env('STORAGE_S3_SECRET', 'your-secret'),
            'region' => env('STORAGE_S3_REGION', 'your-region'),
            'bucket' => env('STORAGE_S3_BUCKET', 'your-bucket'),
        ],

        'rackspace' => [
            'driver'    => 'rackspace',
            'username'  => 'your-username',
            'key'       => 'your-key',
            'container' => 'your-container',
            'endpoint'  => 'https://identity.api.rackspacecloud.com/v2.0/',
            'region'    => 'IAD',
            'url_type'  => 'publicURL',
        ],

    ],

];
