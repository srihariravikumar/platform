<?php namespace BookStack\Http\Controllers;

/**
 * DocTub - Online Documentation/Wiki Platform.
 * Copyright (c) 2017-present, DocTub, Inc. All rights reserved.
 *
 * This source code is licensed under the BSD 3-Clause "New" or "Revised" License
 * found in the LICENSE file in the root directory of this source tree. An additional
 * grant of patent rights can be found in the PATENTS file in the same directory.
 *
 */

use Activity;
use BookStack\Repos\EntityRepo;
use Illuminate\Http\Response;
use Views;

class HomeController extends Controller
{
    protected $entityRepo;

    /**
     * HomeController constructor.
     * @param EntityRepo $entityRepo
     */
    public function __construct(EntityRepo $entityRepo)
    {
        $this->entityRepo = $entityRepo;
        parent::__construct();
    }


    /**
     * Display the homepage.
     * @return Response
     */
    public function index()
    {
        $activity = Activity::latest(10);
        $draftPages = $this->signedIn ? $this->entityRepo->getUserDraftPages(6) : [];
        $recentFactor = count($draftPages) > 0 ? 0.5 : 1;
        $recents = $this->signedIn ? Views::getUserRecentlyViewed(10*$recentFactor, 0) : $this->entityRepo->getRecentlyCreated('book', 10*$recentFactor);
        $recentlyCreatedPages = $this->entityRepo->getRecentlyCreated('page', 4);
        $recentlyUpdatedPages = $this->entityRepo->getRecentlyUpdated('page', 5);
        return view('home', [
            'activity' => $activity,
            'recents' => $recents,
            'recentlyCreatedPages' => $recentlyCreatedPages,
            'recentlyUpdatedPages' => $recentlyUpdatedPages,
            'draftPages' => $draftPages
        ]);
    }

    /**
     * Get a js representation of the current translations
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function getTranslations() {
        $locale = app()->getLocale();
        $cacheKey = 'GLOBAL_TRANSLATIONS_' . $locale;
        if (cache()->has($cacheKey) && config('app.env') !== 'development') {
            $resp = cache($cacheKey);
        } else {
            $translations = [
                // Get only translations which might be used in JS
                'common' => trans('common'),
                'components' => trans('components'),
                'entities' => trans('entities'),
                'errors' => trans('errors')
            ];
            if ($locale !== 'en') {
                $enTrans = [
                    'common' => trans('common', [], 'en'),
                    'components' => trans('components', [], 'en'),
                    'entities' => trans('entities', [], 'en'),
                    'errors' => trans('errors', [], 'en')
                ];
                $translations = array_replace_recursive($enTrans, $translations);
            }
            $resp = 'window.translations = ' . json_encode($translations);
            cache()->put($cacheKey, $resp, 120);
        }

        return response($resp, 200, [
            'Content-Type' => 'application/javascript'
        ]);
    }

}
