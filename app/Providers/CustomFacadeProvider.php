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

namespace BookStack\Providers;

use BookStack\Activity;
use BookStack\Services\ImageService;
use BookStack\Services\PermissionService;
use BookStack\Services\ViewService;
use BookStack\Setting;
use BookStack\View;
use Illuminate\Contracts\Cache\Repository;
use Illuminate\Contracts\Filesystem\Factory;
use Illuminate\Support\ServiceProvider;
use BookStack\Services\ActivityService;
use BookStack\Services\SettingService;
use Intervention\Image\ImageManager;

class CustomFacadeProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('activity', function() {
            return new ActivityService(
                $this->app->make(Activity::class),
                $this->app->make(PermissionService::class)
            );
        });

        $this->app->bind('views', function() {
            return new ViewService(
                $this->app->make(View::class),
                $this->app->make(PermissionService::class)
            );
        });

        $this->app->bind('setting', function() {
            return new SettingService(
                $this->app->make(Setting::class),
                $this->app->make(Repository::class)
            );
        });

        $this->app->bind('images', function() {
            return new ImageService(
                $this->app->make(ImageManager::class),
                $this->app->make(Factory::class),
                $this->app->make(Repository::class)
            );
        });
    }
}
