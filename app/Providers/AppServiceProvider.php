<?php namespace BookStack\Providers;

/**
 * DocTub - Online Documentation/Wiki Platform.
 * Copyright (c) 2017-present, DocTub, Inc. All rights reserved.
 *
 * This source code is licensed under the BSD 3-Clause "New" or "Revised" License
 * found in the LICENSE file in the root directory of this source tree. An additional
 * grant of patent rights can be found in the PATENTS file in the same directory.
 *
 */

use BookStack\Services\SettingService;
use BookStack\Setting;
use Illuminate\Support\ServiceProvider;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Custom validation methods
        Validator::extend('is_image', function($attribute, $value, $parameters, $validator) {
            $imageMimes = ['image/png', 'image/bmp', 'image/gif', 'image/jpeg', 'image/jpg', 'image/tiff', 'image/webp'];
            return in_array($value->getMimeType(), $imageMimes);
        });

        \Blade::directive('icon', function($expression) {
            return "<?php echo icon($expression); ?>";
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(SettingService::class, function($app) {
            return new SettingService($app->make(Setting::class), $app->make('Illuminate\Contracts\Cache\Repository'));
        });
    }
}
