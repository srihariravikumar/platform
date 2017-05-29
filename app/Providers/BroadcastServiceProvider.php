<?php

/**
 * DocTub - Online Documentation Platform.
 * @author - Yoginth <yoginth@zoho.com>
 * Copyright (c) 2017-present, DocTub, Inc. All rights reserved.
 */

namespace BookStack\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Broadcast;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        Broadcast::routes();
//
//        /*
//         * Authenticate the user's personal channel...
//         */
//        Broadcast::channel('BookStack.User.*', function ($user, $userId) {
//            return (int) $user->id === (int) $userId;
//        });
    }
}
