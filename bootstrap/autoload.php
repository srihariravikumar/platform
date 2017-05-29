<?php

/**
 * DocTub - Online Documentation Platform.
 * @author - Yoginth <yoginth@zoho.com>
 * Copyright (c) 2017-present, DocTub, Inc. All rights reserved.
 */

define('LARAVEL_START', microtime(true));

require __DIR__.'/../app/helpers.php';
require __DIR__.'/../vendor/autoload.php';

$compiledPath = __DIR__.'/cache/compiled.php';

if (file_exists($compiledPath)) {
    require $compiledPath;
}
