<?php namespace BookStack;

/**
 * DocTub - Online Documentation Platform.
 * @author - Yoginth <yoginth@zoho.com>
 * Copyright (c) 2017-present, DocTub, Inc. All rights reserved.
 */

class EntityPermission extends Model
{

    protected $fillable = ['role_id', 'action'];
    public $timestamps = false;

    /**
     * Get all this restriction's attached entity.
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function restrictable()
    {
        return $this->morphTo('restrictable');
    }
}
