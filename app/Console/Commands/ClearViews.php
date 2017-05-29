<?php

/**
 * DocTub - Online Documentation Platform.
 * @author - Yoginth <yoginth@zoho.com>
 * Copyright (c) 2017-present, DocTub, Inc. All rights reserved.
 */

namespace BookStack\Console\Commands;

use Illuminate\Console\Command;

class ClearViews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'doctub:clear-views';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear all view-counts for all entities.';

    /**
     * Create a new command instance.
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        \Views::resetAll();
        $this->comment('Views cleared');
    }
}
