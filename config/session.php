<?php

/**
 * DocTub - Online Documentation Platform.
 * @author - Yoginth <yoginth@zoho.com>
 * Copyright (c) 2017-present, DocTub, Inc. All rights reserved.
 */

return [

    'driver' => env('SESSION_DRIVER', 'database'),

    'lifetime' => 52600,

    'expire_on_close' => false,

    'encrypt' => false,

    'files' => storage_path('framework/sessions'),

    'connection' => null,

    'table' => 'sessions',

    'lottery' => [2, 100],

    'cookie' => 'laravel_session',

    'path' => '/',

    'domain' => null,

    'secure' => true,

];
