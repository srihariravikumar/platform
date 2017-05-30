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

namespace BookStack\Console\Commands;

use BookStack\Activity;
use Illuminate\Console\Command;

class ClearActivity extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'doctub:clear-activity';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear user activity from the system';

    protected $activity;

    /**
     * Create a new command instance.
     *
     * @param Activity $activity
     */
    public function __construct(Activity $activity)
    {
        $this->activity = $activity;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->activity->newQuery()->truncate();
        $this->comment('System activity cleared');
    }
}
