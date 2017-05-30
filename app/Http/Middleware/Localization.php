<?php namespace BookStack\Http\Middleware;

/**
 * DocTub - Online Documentation/Wiki Platform.
 * Copyright (c) 2017-present, DocTub, Inc. All rights reserved.
 *
 * This source code is licensed under the BSD 3-Clause "New" or "Revised" License
 * found in the LICENSE file in the root directory of this source tree. An additional
 * grant of patent rights can be found in the PATENTS file in the same directory.
 *
 */

use Carbon\Carbon;
use Closure;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $defaultLang = config('app.locale');
        if (user()->isDefault()) {
            $locale = $defaultLang;
            $availableLocales = config('app.locales');
            foreach ($request->getLanguages() as $lang) {
                if (!in_array($lang, $availableLocales)) continue;
                $locale = $lang;
                break;
            }
        } else {
            $locale = setting()->getUser(user(), 'language', $defaultLang);
        }
        app()->setLocale($locale);
        Carbon::setLocale($locale);
        return $next($request);
    }
}
