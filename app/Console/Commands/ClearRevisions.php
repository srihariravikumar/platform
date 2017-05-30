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

use BookStack\PageRevision;
use Illuminate\Console\Command;

class ClearRevisions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'doctub:clear-revisions
                            {--a|all : Include active update drafts in deletion}
                            ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear page revisions';

    protected $pageRevision;

    /**
     * Create a new command instance.
     *
     * @param PageRevision $pageRevision
     */
    public function __construct(PageRevision $pageRevision)
    {
        $this->pageRevision = $pageRevision;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $deleteTypes = $this->option('all') ? ['version', 'update_draft'] : ['version'];
        $this->pageRevision->newQuery()->whereIn('type', $deleteTypes)->delete();
        $this->comment('Revisions deleted');
    }
}
