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

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Setting;

class SettingController extends Controller
{
    /**
     * Display a listing of the settings.
     * @return Response
     */
    public function index()
    {
        $this->checkPermission('settings-manage');
        $this->setPageTitle('Settings');

        // Get application version
        $version = trim(file_get_contents(base_path('version')));

        return view('settings/index', ['version' => $version]);
    }

    /**
     * Update the specified settings in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        $this->preventAccessForDemoUsers();
        $this->checkPermission('settings-manage');

        // Cycles through posted settings and update them
        foreach ($request->all() as $name => $value) {
            if (strpos($name, 'setting-') !== 0) continue;
            $key = str_replace('setting-', '', trim($name));
            Setting::put($key, $value);
        }

        session()->flash('success', trans('settings.settings_save_success'));
        return redirect('/settings');
    }

}
