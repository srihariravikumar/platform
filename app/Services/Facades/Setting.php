<?php namespace BookStack\Services\Facades;

/**
 * DocTub - Online Documentation Platform.
 * @author - Yoginth <yoginth@zoho.com>
 */

use Illuminate\Support\Facades\Facade;

class Setting extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'setting'; }
}