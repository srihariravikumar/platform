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

namespace BookStack\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     * @param                           $permission
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {

        if (!$request->user() || !$request->user()->can($permission)) {
            Session::flash('error', trans('errors.permission'));
            return redirect()->back();
        }

        return $next($request);
    }
}
