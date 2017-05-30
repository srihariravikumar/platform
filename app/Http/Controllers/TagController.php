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

use BookStack\Repos\TagRepo;
use Illuminate\Http\Request;

class TagController extends Controller
{

    protected $tagRepo;

    /**
     * TagController constructor.
     * @param $tagRepo
     */
    public function __construct(TagRepo $tagRepo)
    {
        $this->tagRepo = $tagRepo;
        parent::__construct();
    }

    /**
     * Get all the Tags for a particular entity
     * @param $entityType
     * @param $entityId
     * @return \Illuminate\Http\JsonResponse
     */
    public function getForEntity($entityType, $entityId)
    {
        $tags = $this->tagRepo->getForEntity($entityType, $entityId);
        return response()->json($tags);
    }

    /**
     * Get tag name suggestions from a given search term.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getNameSuggestions(Request $request)
    {
        $searchTerm = $request->has('search') ? $request->get('search') : false;
        $suggestions = $this->tagRepo->getNameSuggestions($searchTerm);
        return response()->json($suggestions);
    }

    /**
     * Get tag value suggestions from a given search term.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getValueSuggestions(Request $request)
    {
        $searchTerm = $request->has('search') ? $request->get('search') : false;
        $tagName = $request->has('name') ? $request->get('name') : false;
        $suggestions = $this->tagRepo->getValueSuggestions($searchTerm, $tagName);
        return response()->json($suggestions);
    }

}
