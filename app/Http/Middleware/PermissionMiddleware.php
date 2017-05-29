<?php

/**
 * DocTub - Online Documentation Platform.
 * @author - Yoginth <yoginth@zoho.com>
 * Copyright (c) 2017-present, DocTub, Inc. All rights reserved.
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
